<?php
namespace App\Http\Repositories\Role;
use App\Http\Repositories\Role\RoleRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface{
    public function index(){
        return Role::with('permissions')->get();
    }
    public function create(){
        return Permission::all();
    }

    public function store($params){
        // dd($params);
        $role = Role::create([
            'name' => $params['role']
        ]);
        // dd($params);

        $role->syncPermissions($params['permissions']);
    }
    public function edit($id){
        return Role::where('id',$id)->first();
    }
    public function permissionIndex()
    {
        return Permission::all();
    }
    public function update($params,$id){
        // dd($params->all());
        $role = Role::where('id', $id)->firstOrFail();

        $newPermissions = $params->input('permissions', []);
    
        $role->syncPermissions($newPermissions);
    
        if ($params->has('role')) {
            $role->name = $params->input('role');
            $role->save();
        }
    }
    public function destory($id)
    {
        Role::where('id', $id)->delete();
    }
}
