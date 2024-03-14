@extends('layouts.master')
@section('content')
    <div class="flex flex-wrap mt-6 mx-3">
        <form action="{{ route('users.update' , $user->id) }}" method="POST" class="w-full  mt-10  bg-white shadow-md p-5">
            @csrf
            @method('PUT')
            <h5 class="mb-3 ">Update {{ $user->name }}  </h5>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Tile</label>
                <input type="text" value="{{$user->name}}" name="name" id="name"
                    class="bg-gray-50 border @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="name" />
                @error('name')
                    <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">email</label>
                <input type="text" value="{{$user->email}}" name="email" id="name"
                    class="bg-gray-50 border @error('email') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="email" />
                @error('email')
                    <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">password</label>
                <input type="text" value="{{$user->password}}" name="password" id="name"
                    class="bg-gray-50 border @error('password') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="password" />
                @error('password')
                    <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
           
            <div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create</button>
            </div>
        </form>






    </div>
@endsection
