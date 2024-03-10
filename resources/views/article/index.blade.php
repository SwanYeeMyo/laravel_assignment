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
   <div class="my-5">
    <a href="{{route('articles.create')}}" class="block p-2 max-w-20 rounded-md bg-blue-300 text-center text-white" >Create</a>
   </div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                     Slug
                </th>
                <th scope="col" class="px-6 py-3">
                        Context
                </th>
                <th scope="col" class="px-6 py-3">
                    Excerpt
                </th>
               
                <th scope="col" class="px-6 py-3">
                    Action

                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)          
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$article->id}}             </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <h5 class=" font-semibold">{{$article->title}}   </h5>    
                </th>
                <td class="px-6 py-4">
                    {{$article->slug}}        </td>

                    <td class="px-6 py-4">
                        {{$article->context}}        </td>
                <td class="px-6 py-4 text-white">
                    {{$article->excerpt}} 
                </td>
                <td class="px-6 py-4 flex justify-center items-center gap-4    text-white ">
                    
                    <a href="{{route('articles.edit',$article->id)}}" class="bg-blue-300 p-2 rounded-md">Edit</a>
                    
                        <form action="{{route('articles.destroy',$article->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 p-2 text-white rounded-md" >Delete</button>
                        </form>                    
                  
                </td>         
            </tr>
            @endforeach 
          
        </tbody>
    </table>
</div>
  

        </div>    
    </div>    
</body>
</html>
