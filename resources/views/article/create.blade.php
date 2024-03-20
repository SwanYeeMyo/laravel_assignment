@extends('layouts.master')
@section('content')
<div class="flex flex-wrap mt-6 mx-3">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full  mt-10  bg-white shadow-md p-5">
            @csrf
            <h5 class="mb-3 ">Create New Article </h5>
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Tile</label>
                <input type="text" name="title" id="name"
                    class="bg-gray-50 border @error('title') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Title" />
                @error('title')
                    <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 ">Slug</label>
                <input type="text" name="slug" id="name"
                    class="bg-gray-50 border @error('slug') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="slug" />
                @error('slug')
                    <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">

                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Context</label>
                <textarea id="message" name="context" rows="4"
                    class="block p-2.5 w-full @error('context') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                    placeholder="Write your context here..."></textarea>
                @error('context')
                    @error('context')
                        <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                    @enderror
                @enderror

            </div>
            <div class="mb-5">
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 @error('image') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror  border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                    class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG 
                            </p>
                        </div>
                        <input name="image" id="dropzone-file" type="file" class="hidden" />
                    </label>
                    {{-- <input type="file" name="image" class="form-control"> --}}
                    
                </div>
                @error('image')
                    <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                        
                    @enderror
            </div>


            <div class="mb-5">

                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Excerpt</label>
                <textarea id="message" name="excerpt" rows="4"
                    class="block p-2.5 w-full @error('excerpt') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                    placeholder="Write your excerpt here..."></textarea>
                @error('excerpt')
                    @error('excerpt')
                        <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                    @enderror
                @enderror

            </div>
            <div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit</button>
            </div>
        </form>






</div>
@endsection
    
