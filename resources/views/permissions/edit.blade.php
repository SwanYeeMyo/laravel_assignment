@extends('layouts.master')
@section('content')
    <div class="flex flex-wrap mt-6 mx-3">
        <div class="w-5/12 rounded-md  mx-auto bg-white p-5 shadow-md">
            <form action="{{route('permissions.update',$permission->id)}}" method="POST"  >
               @method('PUT')
                @csrf
                <div class="mb-5">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edit
                        Permissions</label>
                    <input type="text" name="permission" id="text"
                        value="{{$permission->name}}" class="@error('permission')
              bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 
              @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Edit .. " />
                    @error('permission')
                        <div>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                               {{$message}}</p>

                        </div>
                    @enderror
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
            </form>
        </div>


    </div>
@endsection
