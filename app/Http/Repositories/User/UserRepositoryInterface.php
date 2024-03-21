<?php
namespace App\Http\Repositories\User;
interface UserRepositoryInterface {
    public function index();
    public function create();
    public function store($params);
    public function edit($id);
    public function update($params,$id);
    public function destory($id);
}