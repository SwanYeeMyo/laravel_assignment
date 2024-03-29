@extends('layouts.master')
@section('content')
    <div class="flex flex-wrap mt-6 mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div
                    class="mb-3 flex items-center justify-between p-6 pb-0  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="">employee table</h6>
                    <h5>
                        <a class="p-2 bg-blue-300 text-white rounded-md " href="{{ route('employees.create') }}">Create
                            table</a>

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
                                        Title</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Price</th>
                                    {{-- <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Password</th> --}}
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Description</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40  text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action</th>





                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                    <tr>
                                        <td
                                            class="max-w-lg p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">

                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal ">{{ $result->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight  dark:opacity-80">
                                                {{ $result->title }}</p>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight  dark:opacity-80">
                                                {{ $result->price }}</p>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight  dark:opacity-80">
                                                {{ Str::limit($result->description, 25) }}
                                            </p>
                                        </td>




                                        {{-- <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <span
                                            class="text-xs font-semibold leading-tight  dark:opacity-80 text-slate-400">{{ $role->password }}</span>
                                    </td>  --}}
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent ">
                                            <a href="{{ route('employees.edit', $result->id) }}"
                                                class=" text-white bg-blue-300 p-2 rounded-md">Edit</a>
                                        </td>
                                        <form action="{{ route('employees.destroy', $result->id) }}" method="POST">
                                            @csrf
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
