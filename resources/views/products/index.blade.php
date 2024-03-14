@extends('layouts.master')
@section('content')
<div class="flex flex-wrap mt-6 mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="mb-3 flex items-center justify-between p-6 pb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="">Product table</h6>
                    <h5>
                    <a class="p-2 bg-blue-300 text-white rounded-md " href="{{route('products.create')}}">Create table</a>

                    </h5>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        name</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        description</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        status</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        price</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Image</th>
                                    <th colspan="2"
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        action</th>




                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">

                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal ">{{ $product->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight  dark:opacity-80">
                                                {{ $product->name }}</p>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight  dark:opacity-80">
                                                {{ Str::limit($product->description,85) }}</p>
                                        </td>
                                        <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <h5
                                        class="text-center {{ $product->status == 0 ? 'bg-green-400' : 'bg-red-400' }} p-1 rounded-md text-white">
                                        {{ $product->status == 0 ? 'Success' : 'Rejected' }}
                                    </h5>
                                    </td>
                                    <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="text-center mb-0 text-xs font-semibold leading-tight  dark:opacity-80">
                                                {{ $product->price }}</p>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex justify-center items-center">
                                       
                                            @foreach ($product->images as $img )
                                            <img class="w-20   " src={{asset('storage/img/' . $img->img_name)}} alt="{{$img->img_name}}">

                                        @endforeach
                                        
                                    </div>

                                        </td>
                                       
                                       
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent ">
                                            <a href="{{ route('products.read', $product->id) }}"
                                                class=" text-white bg-green-300 p-2 rounded-md">Read</a>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class=" text-white bg-blue-300 p-2 rounded-md">Edit</a>
                                              
                                        </td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <td
                                            class="p-2 text-center  bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <button class="text-white bg-red-500 rounded-md p-2" >Delete</button>
                                        </td>
                                    </form>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

           
@endsection
{{-- <div class="flex flex-wrap p-5 bg-black" >
    <div class="mt-5">
        <a href="{{ route('products.create') }}"
            class="mb-5 block p-2 max-w-20 rounded-md bg-blue-300 text-center text-white">Create</a>
    </div>
        <table class="w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Images
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action

                    </th>
                </tr>
            </thead>
            <tbody >
                @foreach ($products as $product)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->id }} </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <h5 class=" font-semibold">{{ $product->name }} </h5>
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->description }} </td>


                        <td class="px-6 py-4`">
                            <h5
                                class="text-center {{ $product->status == 0 ? 'bg-green-400' : 'bg-red-400' }} p-1 rounded-md text-white">
                                {{ $product->status == 0 ? 'Success' : 'Rejected' }}
                            </h5>
                        </td>

                        <td class="px-6 py-4">
                            ${{ $product->price }}
                        </td>
                        <td class="px-6 py-4 text-white">
                            <div class="  flex items-center justify-center gap-3">

                                @foreach ($product->images as $img)
                                    
                                <img class="w-10" src={{ asset('storage/img/' . $img->img_name) }}
                                        alt="">
                                @endforeach
                            </div>

                        </td>
                        <td class="px-6 py-4 text-white ">
                            <div class="flex justify-center item-center gap-2">
                                <a href="{{ route('products.read', $product->id) }}"
                                    class="bg-blue-400 mb-2 p-2 rounded-md ">Read</a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="bg-green-400 mb-2  p-2 rounded-md ">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 p-2 text-white rounded-md">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <div class="my-3">
                </div>
            </tbody>
        </table>
   </div> --}}


       

