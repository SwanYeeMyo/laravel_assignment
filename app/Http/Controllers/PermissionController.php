<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(!Gate::allows('permission_list')){
            abort(401);
        }
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(!Gate::allows('permission_create')){
            abort(401);
        }
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        if(!Gate::allows('permission_store')){
            abort(401);
        }
        $request->validate([
            'permission' => ['required']
        ]);
        Permission::create([
            'name' => $request->permission
        ]);
        return redirect()->route('permissions.index');
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
        if(!Gate::allows('permission_edit')){
            abort(401);
        }
        $permission = Permission::where('id',$id)->first();
        return view('permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if(!Gate::allows('permission_update')){
            abort(401);
        }
        $request->validate([
            'permission' => ['required']
        ]) ;
        Permission::where('id',$id)->update([
            'name' => $request->permission
        ]);
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if(!Gate::allows('permission_destory')){
            abort(401);
        }
        Permission::where('id',$id)->delete();
        return redirect()->route('permissions.index');
    }
}
