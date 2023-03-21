<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userList = User::all();
        return view('admin.users.index', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(USer $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if ($request->has('password')) {
            $user->password = bcrypt($validatedData['password']);
        }
      
        $user->save();

        if ($request->roles) {
            // dd($request->roles);
            $user->roles()->detach();
            $role = Role::findByName($request->roles, 'admin');
            $user->assignRole($role);
        }
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}