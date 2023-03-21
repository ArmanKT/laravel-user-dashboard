<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth:admin', 'permission:role.view'])->only('index');
        $this->middleware(['auth:admin', 'permission:role.create'])->only('create');
        $this->middleware(['auth:admin', 'permission:role.edit'])->only('edit');
        $this->middleware(['auth:admin', 'permission:role.delete'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roleList = Role::all();
        return view('admin.roles.index', compact('roleList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('admin.roles.create', compact('all_permissions', 'permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ], [
                'name.requried' => 'Please give a role name'
            ]);

        // Process Data
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

        // $role = DB::table('roles')->where('name', $request->name)->first();
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }


        // return back()->with('success','Role has been created !!');
        return redirect()->route('admin.roles.index')->with('success', 'Role has been created !!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {

        $role = Role::findById($id, 'admin');
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.roles.edit', compact('role', 'all_permissions', 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to edit this role !');
            return back();
        }

        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ], [
                'name.requried' => 'Please give a role name'
            ]);

        $role = Role::findById($id, 'admin');
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            return response()->json(['error' => 'Sorry !! You are not authorized to delete this role !']);

        }

        $role = Role::findById($id, 'admin');
        if (!is_null($role)) {
            $role->delete();
        }
        // if ($role->delete()) {
        //     return response()->json(['success' => 'Job Category deleted.']);
        // } else {
        //     return response()->json(['error' => 'Something Went Wrong!']);
        // }


        return response()->json(['success' => 'Role has been deleted !!']);

    }
}