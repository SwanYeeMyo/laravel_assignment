<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Role\RoleRepositoryInterface;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $repository;
    public function __construct(RoleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        //
        if(!Gate::allows('role_list')){
            abort(401);
        }
        // dd($roles);
        $roles = $this->repository->index();
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
        $permissions = $this->repository->create();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        //
        // dd($request->all());
        if(!Gate::allows('role_store')){
            abort(401);
        }
        
        $this->repository->store($request->validated());
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
        
        $permissions = $this->repository->permissionIndex();
        $role = Role::with('permissions')->where('id', $id)->first();
        // dd($permissions);
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        //
        if(!Gate::allows('role_update')){
            abort(401);
        }
       
        
        $this->repository->update($request,$id);
        
    
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
        $this->repository->destory($id);
        return redirect()->route('roles.index');
    }
}
