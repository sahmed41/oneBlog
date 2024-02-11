<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OneTravelBlog</title>
</head>
<body>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('One Block') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            @foreach ($blogs as $blog )
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3">
                    <div class="p-6 text-gray-900">
                        <a href="{{route('blog.singleBlog',['blog'=>$blog])}}">
                            {{$blog->title}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

</body>
</html>