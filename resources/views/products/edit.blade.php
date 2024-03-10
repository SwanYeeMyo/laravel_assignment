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

            <form action="{{route('products.update',$product->id)}}" method="POST" class="max-w-md mt-36 mx-auto bg-white shadow-md p-5">
                @csrf
                <h5 class="mb-3 ">Update New Product </h5>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                    <input type="text" value="{{$product->name}}" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Dimitri" required />
                </div>
                <div class="mb-5">

                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                    <textarea id="message" name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Write your description here...">
                    {{$product->description}}
                    </textarea>

                </div>
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                    <select name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option @if($product->status === 0)
                            selected
                        @endif value="0">True</option>
                        <option @if($product->status === 1)
                            selected
                        @endif  value="1">False</option>

                    </select>
                </div>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                    <input type="text" value="{{$product->price}}" name="price" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="price" required />
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
