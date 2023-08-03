<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;

use DataTables;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order;
        $route = 'admin.orders.store';

        $product_array = [];
        $product_select = '';

        $customer_array = [];
        $customer_select = '';

        return view('back.order.form', compact('order', 'route', 'product_select', 'product_array', 'customer_select', 'customer_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'product_id' => 'required',
                'customer_id' => 'required',
                'quantity' => 'required',
                'status' => 'required',
            ]
        );

        $check = Stock::where('product_id', $request->product_id)->get();
        $c = 0;
        foreach($check as $data) {
            $c = $c + $data->quantity;
        }

        if($c < $request->quantity) {
            return redirect()->route('admin.orders.create')->with('danger', 'Stock Kurang!'); 
        }

        $order = new Order;
        $order->product_id = $request->product_id;
        $order->customer_id = $request->customer_id;
        $order->quantity = $request->quantity;
        $order->status = $request->status;
        $order->save();

        $stock = new Stock;
        $stock->quantity = -$request->quantity;
        $stock->product_id = $request->product_id;
        $stock->save();

        $order->stock_id = $stock->id;
        $order->save();

        // return redirect()->route('admin.orders.edit', $order->id)->with('message', 'Order Saved!');
        return redirect()->route('admin.orders.index')->with('message', 'Order Saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $route = 'admin.orders.update';

        $product_array = [];
        $product_select = '';
        if($order->product) {
            $product_array = [$order->product_id => $order->product->name];
            $product_select = $order->product_id;
        }

        $customer_array = [];
        $customer_select = '';
        if($order->customer) {
            $customer_array = [$order->customer_id => $order->customer->name];
            $customer_select = $order->customer_id;
        }

        return view('back.order.form', compact('order', 'route', 'product_select', 'product_array', 'customer_select', 'customer_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'product_id' => 'required',
                'customer_id' => 'required',
                // 'quantity' => 'required',
                'status' => 'required',
            ]
        );

        $order = Order::find($id);
        $order->product_id = $request->product_id;
        $order->customer_id = $request->customer_id;
        // $order->quantity = $request->quantity;
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.edit', $order->id)->with('message', 'Order Updated!');
        // return redirect()->route('admin.orders.index')->with('message', 'Order Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();

        return redirect()->route('admin.orders.index')->with('message', 'Order Deleted!');
    }

    /**
     * Datatables for orders.
     *
     * @return DataTables
     */
    public function dataTable()
    {
        $order = Order::with(['customer:id,nickname', 'product:id,name,harga']);

        return DataTables::of($order)
                ->addColumn('action', function($data) {
                    return '
                    <td>
                        <a href="' . route('admin.orders.edit', $data->id) .'" class="btn btn-xs btn-icon btn-warning btn-round"><i class="icon wb-edit" aria-hidden="true"></i></a>
                    </td>
                    ';
                })
                ->editColumn('status', function($data) {
                    if($data->status == 'lunas') {
                        return '<span class="badge badge-success">Lunas</span>';
                    } else {
                        return '<span class="badge badge-danger">Belum Lunas</span>';
                    }
                })
                ->editColumn('created_at', function($data) {
                    return Carbon::parse($data->created_at)->format('d-m-Y h:i:s');
                })
                ->addColumn('total', function($data) {
                    return $data->format_harga();
                })
                ->addIndexColumn()
                ->rawColumns(['status', 'action'])
                ->make();
    }
}
