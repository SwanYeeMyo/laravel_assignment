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

            <form action="{{ route('articles.store') }}" method="POST"
                class="max-w-md mt-36 mx-auto bg-white shadow-md p-5">
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
    </div>
</body>

</html>
