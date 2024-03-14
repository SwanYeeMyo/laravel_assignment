@extends('layouts.master')
@section('content')
    {{-- @vite('resources/css/app.css') --}}

    <div class="flex flex-wrap mt-6 mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="mb-3 flex items-center justify-between p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="">Articles table</h6>
                    <h5>
                    <a class="p-2 bg-blue-300 text-white rounded-md " href="{{route('articles.create')}}">Create table</a>

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
                                        TITLE</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        SLUG</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        CONTEXT</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        IMAGE</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        excerpt</th>
                                    <th colspan="2"
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        action</th>




                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">

                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal ">{{ $article->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight  dark:opacity-80">
                                                {{ $article->title }}</p>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight  dark:opacity-80">
                                                {{ $article->slug }}</p>
                                        </td>

                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="text-xs font-semibold leading-tight  dark:opacity-80 text-slate-400">     {{ Str::limit($article->context, 40) }}
                                                </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex items-center justify-center">
                                                <img class="w-30 rounded-lg" src="{{ asset('storage/' . $article->image) }}"
                                                    alt="{{ $article->image }}">
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="text-xs font-semibold leading-tight  dark:opacity-80 text-slate-400">{{ Str::limit($article->excerpt,40) }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent ">
                                            <a href="{{ route('articles.edit', $article->id) }}"
                                                class=" text-white bg-blue-300 p-2 rounded-md">Edit</a>
                                        </td>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
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

{{-- <div class="container mx-auto">
        <div class="max-w-7xl mx-auto ">
            <div class="my-5">
                <a href="{{ route('articles.create') }}"
                    class="block p-2 max-w-20 rounded-md bg-blue-300 text-center text-white">Create</a>
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
                                Image
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
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $article->id }} </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <h5 class=" font-semibold">{{ $article->title }} </h5>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $article->slug }} </td>

                                <td class="px-6 py-4">
                                    {{ $article->context }} </td>

                                    <td class="px-6 py-4">
                                        <img class="w-32 rounded-md" src="{{ asset('storage/' . $article->image) }}" alt="Image">

                                    </td>

                                <td class="px-6 py-4 text-white">
                                    {{ $article->excerpt }}
                                </td>
                                <td class="px-6 py-4   text-white ">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('articles.edit', $article->id) }}"
                                            class="bg-blue-300 p-2 rounded-md">Edit</a>

                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-500 p-2 text-white rounded-md">Delete</button>
                                        </form>
                                    </div>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
    </div> --}}
</body>

</html>
