<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::with('permissions')->get();
        // dd($roles);
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'role' => ['required'],
            'permissions' => ['required']
        ]);
        $role = Role::create([
            'name' => $request->role
        ]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $permissions = Permission::all();
        $role = Role::with('permissions')->where('id',$id)->first();
        // dd($permissions);
        return view('roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'role' => ['required'],
            'permissions' => ['required']
        ]);
      $role = Role::where('id',$id)->first();
      // Update the role's name
    $role->name = $request->input('role');
    $role->save();

    // Sync the role's permissions
    $permissions = $request->input('permissions', []);
    $role->syncPermissions($permissions);
    return redirect()->route('roles.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Role::where('id',$id)->delete();
        return redirect()->route('roles.index');


    }
}
