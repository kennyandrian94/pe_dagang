<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Stock;

use DataTables;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $route = 'admin.products.store';

        return view('back.product.form', compact('product', 'route'));
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
                'name' => 'required',
                'status' => 'required',
                'harga' => 'required',
            ]
        );

        $product = new Product;
        $product->name = $request->name;
        $product->status = $request->status;
        $product->harga = $request->harga;
        $product->save();

        return redirect()->route('admin.products.edit', $product->id)->with('message', 'Product Saved!');
        // return redirect()->route('admin.products.index')->with('message', 'Product Saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $route = 'admin.products.update';

        return view('back.product.form', compact('product', 'route'));
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
                'name' => 'required',
                'status' => 'required',
                'harga' => 'required',
            ]
        );

        $product = Product::find($id);
        $product->name = $request->name;
        $product->status = $request->status;
        $product->harga = $request->harga;
        $product->save();

        return redirect()->route('admin.products.edit', $product->id)->with('message', 'Product Updated!');
        // return redirect()->route('admin.products.index')->with('message', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->route('admin.products.index')->with('message', 'Product Deleted!');
    }

    /**
     * Datatables for products.
     *
     * @return DataTables
     */
    public function dataTable()
    {
        $product = (new Product)->newQuery();;

        return DataTables::of($product)
                ->addColumn('action', function($data) {
                    return '
                    <td>
                        <a href="' . route('admin.products.stock.index', $data->id) .'" class="btn btn-xs btn-icon btn-info btn-round"><i class="icon wb-eye" aria-hidden="true"></i></a>
                        <a href="' . route('admin.products.edit', $data->id) .'" class="btn btn-xs btn-icon btn-warning btn-round"><i class="icon wb-edit" aria-hidden="true"></i></a>
                        <button type="button" data-toggle="modal" data-target="#delete-modal" data-id="' . $data->id . '" data-name="' . $data->name . '" class="btn btn-xs btn-icon btn-danger btn-delete btn-round"><i class="icon wb-trash" aria-hidden="true"></i></button>
                    </td>
                    ';
                })
                ->addColumn('stock_quantity', function($data) {
                    $q = 0;
                    foreach($data->stock as $key => $value) {
                        $q = $q + $value->quantity;
                    }
                    return $q;
                })
                ->editColumn('harga', function($data) {
                    return $data->format_harga();
                })
                ->addIndexColumn()
                ->make();
    }

    public function select2(Request $request)
    {
        return Product::active()->where('name','LIKE','%' . request('q') . '%')->orderBy('name')->paginate(10);
    }

    /**
     *
     * STOCK PRODUCT
     * 
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStock($id)
    {
        $product = Product::find($id);
        
        return view('back.product.stock', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStock(Request $request)
    {
        $request->validate(
            [
                'quantity' => 'required',
                'product_id' => 'required',
            ]
        );

        $stock = new Stock;
        $stock->quantity = $request->quantity;
        $stock->product_id = $request->product_id;
        $stock->save();

        return redirect()->route('admin.products.stock.index', $stock->product_id)->with('message', 'Quantity Saved!');
    }

    /**
     * Datatables for stock.
     *
     * @return DataTables
     */
    public function dataTableStock($id)
    {
        $stock = Stock::where('product_id', $id);

        return DataTables::of($stock)
                ->editColumn('created_at', function($data) {
                    return Carbon::parse($data->created_at)->format('d-M-Y h:i:s');
                })
                ->addIndexColumn()
                ->make();
    }
}
