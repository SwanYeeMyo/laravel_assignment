<?php

namespace App\Http\Repositories\Permission;

use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function index()
    {
        return Permission::all();
    }
    public function store($parmas)
    {
       return  Permission::create([
            'name' => $parmas['permission']
        ]);
    }
   public function edit($id){
        return Permission::where('id',$id)->first();
   }
   public function update($parmas,$id){
    return Permission::where('id',$id)->update([
        'name' => $parmas['permission']
    ]);
   }
}
