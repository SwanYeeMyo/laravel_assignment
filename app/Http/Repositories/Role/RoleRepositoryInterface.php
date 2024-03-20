<?php
namespace App\Http\Repositories\Role;
interface RoleRepositoryInterface {
    public function index();
    public function create();
    public function store($params);
    public function permissionIndex();
    public function edit($id);
    public function update($params,$id);
    public function destory($id);
}