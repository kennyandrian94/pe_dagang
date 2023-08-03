<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;

use DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new Admin;
        $route = 'admin.admins.store';

        return view('back.admin.form', compact('admin', 'route'));
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
                'email' => 'required|email',
                'password' => 'required|min:4|confirmed',
            ]
        );

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect()->route('admin.admins.edit', $admin->id)->with('message', 'Admin Saved!');
        // return redirect()->route('admin.admins.index')->with('message', 'Admin Saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $route = 'admin.admins.update';

        return view('back.admin.form', compact('admin', 'route'));
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
                'email' => 'required|email',
                'password' => 'confirmed',
            ]
        );

        $admin = Admin::find($id);
        if(!empty($request->password)) {
            $admin->password = bcrypt($request->password);  
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return redirect()->route('admin.admins.edit', $admin->id)->with('message', 'Admin Updated!');
        // return redirect()->route('admin.admins.index')->with('message', 'Admin Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();

        return redirect()->route('admin.admins.index')->with('message', 'Admin Deleted!');
    }

    /**
     * Datatables for admins.
     *
     * @return DataTables
     */
    public function dataTable()
    {
        $admin = (new Admin)->newQuery();

        return DataTables::of($admin)
                ->addColumn('action', function($data) {
                    return '
                    <td>
                        <a href="' . route('admin.admins.edit', $data->id) .'" class="btn btn-xs btn-icon btn-warning btn-round"><i class="icon wb-edit" aria-hidden="true"></i></a>
                        <button type="button" data-toggle="modal" data-target="#delete-modal" data-id="' . $data->id . '" data-name="' . $data->name . '" class="btn btn-xs btn-icon btn-danger btn-delete btn-round"><i class="icon wb-trash" aria-hidden="true"></i></button>
                    </td>
                    ';
                })
                ->addIndexColumn()
                ->make();
    }
}
