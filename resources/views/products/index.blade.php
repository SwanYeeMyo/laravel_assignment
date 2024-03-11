<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')

        
    </head>
<body>
    <div class="container mx-auto">
    <div class="max-w-7xl mx-auto ">
   <div class="mt-5">
    <a href="{{route('products.create')}}" class="block p-2 max-w-20 rounded-md bg-blue-300 text-center text-white" >Create</a>
   </div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                    Action

                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)          
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$product->id}}             </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <h5 class=" font-semibold">{{$product->name}}   </h5>    
                </th>
                <td class="px-6 py-4">
                    {{$product->description}}        </td>

                  
                    <td class="px-6 py-4`">
                        <h5 class="text-center {{ $product->status == 0 ? 'bg-green-400' : 'bg-red-400' }} p-1 rounded-md text-white">
                            {{ $product->status == 0 ? 'Success' : 'Rejected' }}
                        </h5>
                    </td>
                
                <td class="px-6 py-4 text-white">
                    ${{$product->price}} 
                </td>
                <td class="px-6 py-4 text-white ">
                    <div class="flex justify-center item-center gap-2">
                        <a href="{{route('products.read',$product->id)}}" class="bg-blue-400 mb-2 p-2 rounded-md ">Read</a>
                    <a  href="{{route('products.edit',$product->id)}}" class="bg-green-400 mb-2  p-2 rounded-md ">Edit</a>
                    <form action="">
                        <button class="bg-red-500 p-2 text-white rounded-md" >Delete</button>
                    </form>
                    </div>
                </td>         
            </tr>
            @endforeach 
            <div class="my-3">
            </div>
        </tbody>
    </table>
</div>
  

        </div>    
    </div>    
</body>
</html>
