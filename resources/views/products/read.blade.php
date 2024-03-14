@extends('layouts.master')
@section('content')
    <div class="w-full mx-auto ">


        <div class="mt-36 max-w-4xl   mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow ">
            <div class="flex justify-between items-center mb-3">
                <h4 class="capitalize">Product - {{ $product->name }}</h4>

                <div>
                    <span class="text-slate-500 text-sm">Status </span> : <button
                        class="text-center text-sm {{ $product->status == 0 ? 'bg-green-600' : 'bg-red-400' }} p-1 rounded-md text-white">
                        {{ $product->status == 0 ? 'Success' : 'Rejected' }}
                    </button>
                </div>
            </div>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ $product->description }}</p>
            <h5 class="text-gray  font-semibold text-gray-500">Price - ${{ $product->price }}</h5>

            <div class="mt-5">
                <a href="{{ route('products.index') }}"
                    class="p-1 rounded-md block max-w-20 bg-black text-white text-center">Back</a>
            </div>
            <div class="my-3 flex justify-center item-center">
                @foreach ($product->images as $product)
                    <img class="w-36 " src="{{ asset('storage/img/' . $product->img_name) }}"
                        alt="{{ $product->img_name }}">
                @endforeach
            </div>
        </div>


    </div>
@endsection
