<?php

namespace App\Http\Repositories\Permission;

interface PermissionRepositoryInterface
{
    public function index();
    public function store($params);
    public function edit($id);
    public function update($params,$id);    
}
