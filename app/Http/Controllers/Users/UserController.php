<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Rules\Password;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $repository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;   
    }
    public function index()
    {
        if(!Gate::allows('user_list')){
            abort(401);
        }
        $users = $this->repository->index();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(!Gate::allows('user_create')){
            abort(401);
        }
        $roles = $this->repository->create();
        
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(UserRequest $request)
    {
        //
        if(!Gate::allows('user_store')){
            abort(401);
        }
        $this->repository->store($request->all());
        
        return redirect()->route('users.index')->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        if(!Gate::allows('user_edit')){
            abort(401);
        }
        $user = $this->repository->edit($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $this->repository->update($request->all(),$id);
        // dd($data);
        return redirect()->route('users.index')->with('success','updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Gate::allows('user_destory')){
            abort(401);
        }
        $this->repository->destory($id);
        // return view('users.index');
        return redirect()->route('users.index')->with('success','Deleted Successfully');
    }
}
