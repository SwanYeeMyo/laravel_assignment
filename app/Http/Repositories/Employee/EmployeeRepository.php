<?php

namespace App\Http\Repositories\Employee;

use App\Http\Repositories\Employee\EmployeeRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Http;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function index()
    {
        $apiUrl = Env('APP_URL');

        // $response = Http::get($apiUrl.'products');
        // // $response = Http::get('https://dummy.restapiexample.com/api/v1/employees');
        // $response = json_decode($response->body());
        // // dd($response);
        // return $response;

        // ClicnetGazzel
        $client  = new Client();
        $response = $client->request('GET', $apiUrl . 'products');
        return  json_decode($response->getBody());
    }
    public function store($params)
    {
    }
}
