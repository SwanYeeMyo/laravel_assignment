<?php 
namespace App\Http\Repositories\Employee;
interface EmployeeRepositoryInterface {
    public function index();
    public function store($params);
}