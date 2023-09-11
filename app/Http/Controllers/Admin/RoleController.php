<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Roles';
        $data = Role::all();
        return view('admin.role.list', compact('page_name', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Create Role';
        $permissions = Permission::pluck('name', 'id');
        return view('admin.role.create', compact('page_name', 'permissions'));
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
                'permissions' => 'required|array',
                'permissions.*' => 'required|string',
            ],
            [
                'name.required' => 'Name field is required*',
                'permission.required' => 'You must select Permissions',
                'permissions.*.required' => 'You must Select a permission',
            ],
        );

        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        foreach ($request->permissions as $value) {
            $role->attachPermission($value);
        }

        return redirect()
            ->action('Admin\RoleController@index')
            ->with('success', 'Role Created Successfully');
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
        $page_name = 'Edit Role';
        $role = Role::findOrFail($id);
        $permission = Permission::pluck('name', 'id');
        $selectedPermission = DB::table('permission_role')
            ->where('permission_role.role_id', $id)
            ->pluck('permission_id')
            ->toArray();
        return view('admin.role.edit', compact('page_name', 'permission', 'selectedPermission', 'role'));
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
                'permissions' => 'required|array',
                'permissions.*' => 'required',
            ],
            [
                'name.required' => 'Name field is required',
                'permissions.required' => 'You must select Permissions',
                'permissions.*.required' => 'You must Select a permission',
            ],
        );

        $role = Role::find($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        DB::table('permission_role')
            ->where('role_id', $id)
            ->delete();
        foreach ($request->permissions as $value) {
            $role->attachPermission($value);
        }

        return redirect()
            ->action('Admin\RoleController@index')
            ->with('success', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return redirect()
            ->action('Admin\RoleController@index')
            ->with('success', 'Role Deleted Successfully');
    }
}
