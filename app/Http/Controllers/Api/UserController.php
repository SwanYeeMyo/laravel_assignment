<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users = $this->repository->index();
        // $users = User::all();
        return response()->json([
            'status' => '200',
            'message' => 'User List',
            'data' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $users = $this->repository->store($request->all());
        return response()->json([
            'status' => '200',
            'message' => 'User Created',
            'data' => $users
        ]);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        // dd($request->all());
        $user = $this->repository->update($request->all(),$id);
        return response()->json([
            'status' => 'success',
            'message' => 'updated',
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = $this->repository->destory($id);
        return response()->json([
            'status' => 'success',
            'message' => 'deleted',
            'data' => $user
        ]);
    }
}
