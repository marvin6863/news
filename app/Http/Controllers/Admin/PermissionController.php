<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Permissions';

        $data = Permission::all();

        return view('admin.permission.list', compact('data', 'page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Name Field is Required*',
            ],
        );

        $permission = new Permission();

        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;

        $permission->save();

        return redirect()
            ->route('admin.permissions')
            ->with('success', 'Permission Created Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = 'Edit Permission';
        $permission = Permission::findOrFail($id);
        return view('admin.permission.edit', compact('permission', 'page_name'));
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
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Name Field is Required*',
            ],
        );

        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;

        $permission->save();

        return redirect()
            ->route('admin.permissions')
            ->with('success', 'Permission Updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()
            ->route('admin.permissions')
            ->with('success', 'Permission Deleted Successfully...');
    }
}
