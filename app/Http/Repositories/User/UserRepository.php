<?php

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {

        return User::with('roles')->get();
    }
    public function create()
    {
        return Role::all();
    }
    public function store($params)
    {
        // dd($params);
        $role = Role::where('id', $params['role_id'])->first();
        // dd($role);
        $user = User::create($params);
        $user->assignRole($role);
        return $user;
    }
    public function edit($id)
    {
        return User::where('id',$id)->first();
        
    }
    public function update($params,$id){
        // dd($params);
        return User::where('id',$id)->update(
            [
                'name' => $params['name'],
                'email' => $params['email'],
                // 'password' => Hash::make($params['password'])
            ]
            );
    }
    public function destory($id)
    {
        return User::where('id',$id)->delete();
        
    }
}
