<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;

use DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new Customer;
        $route = 'admin.customers.store';

        return view('back.customer.form', compact('customer', 'route'));
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
                'nickname' => 'required',
            ]
        );

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->nickname = $request->nickname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        return redirect()->route('admin.customers.edit', $customer->id)->with('message', 'Customer Saved!');
        // return redirect()->route('admin.customers.index')->with('message', 'Customer Saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $route = 'admin.customers.update';

        return view('back.customer.form', compact('customer', 'route'));
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
                'nickname' => 'required',
            ]
        );

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->nickname = $request->nickname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        return redirect()->route('admin.customers.edit', $customer->id)->with('message', 'Customer Updated!');
        // return redirect()->route('admin.customers.index')->with('message', 'Customer Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();

        return redirect()->route('admin.customers.index')->with('message', 'Customer Deleted!');
    }

    /**
     * Datatables for customers.
     *
     * @return DataTables
     */
    public function dataTable()
    {
        $customer = (new Customer)->newQuery();

        return DataTables::of($customer)
                ->addColumn('action', function($data) {
                    return '
                    <td>
                        <a href="' . route('admin.customers.edit', $data->id) .'" class="btn btn-xs btn-icon btn-warning btn-round"><i class="icon wb-edit" aria-hidden="true"></i></a>
                        <button type="button" data-toggle="modal" data-target="#delete-modal" data-id="' . $data->id . '" data-name="' . $data->name . '" class="btn btn-xs btn-icon btn-danger btn-delete btn-round"><i class="icon wb-trash" aria-hidden="true"></i></button>
                    </td>
                    ';
                })
                ->addIndexColumn()
                ->make();
    }

    public function select2(Request $request)
    {
        return Customer::where('name','LIKE','%' . request('q') . '%')->Orwhere('nickname','LIKE','%' . request('q') . '%')->orderBy('name')->paginate(10);
    }
}
