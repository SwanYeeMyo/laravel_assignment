<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        if(!Gate::allows('role_list')){
            abort(401);
        }
        $roles = Role::with('permissions')->get();
        // dd($roles);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(!Gate::allows('role_create')){
            abort(401);
        }
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        if(!Gate::allows('role_store')){
            abort(401);
        }
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
        if(!Gate::allows('role_edit')){
            abort(401);
        }
        $permissions = Permission::all();
        $role = Role::with('permissions')->where('id', $id)->first();
        // dd($permissions);
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if(!Gate::allows('role_update')){
            abort(401);
        }
        $request->validate([
            'role' => ['required'],
            'permissions' => ['required']
        ]);
        $role = Role::where('id', $id)->first();
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
        if(!Gate::allows('role_destory')){
            abort(401);
        }
        Role::where('id', $id)->delete();
        return redirect()->route('roles.index');
    }
}
