<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Permission\PermissionRepositoryInterface;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $repository;
    public function __construct(PermissionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        //
        if(!Gate::allows('permission_list')){
            abort(401);
        }
        $permissions = $this->repository->index();
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
    public function store(PermissionRequest $request)
    {
        //
        // dd($request->all());
        if(!Gate::allows('permission_store')){
            abort(401);
        }
       
        $this->repository->store($request->validated());
       
        return redirect()->route('permissions.index')->with('success','Created Successfully');
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
    public function update(PermissionRequest $request, string $id)
    {
        //
        if(!Gate::allows('permission_update')){
            abort(401);
        }
        
        $this->repository->update($request->validated(),$id);
        return redirect()->route('permissions.index')->with('success','Updated Successfully');
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
        return redirect()->route('permissions.index')->with('success','Delete Successfully');
    }
}
