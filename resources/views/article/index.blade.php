@extends('layouts.master')
@section('content')
    {{-- @vite('resources/css/app.css') --}}

    <div class="flex flex-wrap mt-6 mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div
                    class="mb-3 flex items-center justify-between p-6 pb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="">Articles table</h6>
                    <h5>
                        <a class="p-2 bg-blue-300 text-white rounded-md " href="{{ route('articles.create') }}">Create
                            table</a>
                    </h5>
                </div>
                <form action="{{route('articles.search')}}" method="GET">
                    @csrf
                    <div class="flex justify-between items-center p-2">
                        <div class="flex gap-5">
                            <div>

                                <label for="">Start Date :</label>
                                <input type="datetime-local" name="start_date" class="form-control">

                            </div>
                            <div>
                                <label for="">End Date :</label>
                                <input type="datetime-local" name="end_date" class="form-control">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-400 p-2 text-white">Search</button>
                        </div>
                    </div>
                </form>
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
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Date</th>
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
                                                class="text-xs font-semibold leading-tight  dark:opacity-80 text-slate-400">
                                                {{ Str::limit($article->context, 40) }}
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
                                                class="text-xs font-semibold leading-tight  dark:opacity-80 text-slate-400">{{ Str::limit($article->excerpt, 40) }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="text-xs font-semibold leading-tight  dark:opacity-80 text-slate-400">{{ date('d-m-Y', strtotime($article->created_at)) }}</span>
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
                                                <button class="text-white bg-red-500 rounded-md p-2">Delete</button>
                                            </td>
                                        </form>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="my-3 P-2">
                        {{$articles->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




</html>
