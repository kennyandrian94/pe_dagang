<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $route = 'admin.users.store';

        return view('back.user.form', compact('user', 'route'));
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

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.users.edit', $user->id)->with('message', 'User Saved!');
        // return redirect()->route('admin.users.index')->with('message', 'User Saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $route = 'admin.users.update';

        return view('back.user.form', compact('user', 'route'));
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

        $user = User::find($id);
        if(!empty($request->password)) {
            $user->password = bcrypt($request->password);  
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users.edit', $user->id)->with('message', 'User Updated!');
        // return redirect()->route('admin.users.index')->with('message', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.users.index')->with('message', 'User Deleted!');
    }

    /**
     * Datatables for users.
     *
     * @return DataTables
     */
    public function dataTable()
    {
        $user = (new User)->newQuery();

        return DataTables::of($user)
                ->addColumn('action', function($data) {
                    return '
                    <td>
                        <a href="' . route('admin.users.edit', $data->id) .'" class="btn btn-xs btn-icon btn-warning btn-round"><i class="icon wb-edit" aria-hidden="true"></i></a>
                        <button type="button" data-toggle="modal" data-target="#delete-modal" data-id="' . $data->id . '" data-name="' . $data->name . '" class="btn btn-xs btn-icon btn-danger btn-delete btn-round"><i class="icon wb-trash" aria-hidden="true"></i></button>
                    </td>
                    ';
                })
                ->addIndexColumn()
                ->make();
    }
}
