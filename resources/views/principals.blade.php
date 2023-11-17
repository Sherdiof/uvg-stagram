
@extends('layouts.app')


<h1>
    @section('titulo')
        PRINCIPAL
    @endsection
</h1>

@section('contenido')

    @foreach($posts as $post)
        <div class="container justify-center items-center rounded-b flex py-2 ">
            <div class="max-w-3xl overflow-hidden bg-white">
                <div class="flex items-center px-2 py-2">

                </div>
                <a href="{{route('posts.show', [ $post->user->username, $post])}}">
                    <img class="w-full" src="{{asset('uploads/'. $post->imagen)}}" alt="Sunset in the mountains">
                </a>
                <div class="flex-none px-5  py-4 ">
                    <div class="flex flex-nowrap">
                        <p class="py-0.5">0</p>
                        <div class="pl-1 pt-4">
                            <h1 class="mt-0.5 inline w-4 h-4 text-indigo-800 "> Likes
                            </h1>
                        </div>
                    </div>

                    <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                    <p class="text-gray-700 text-base">
                        {{ $post->description }}
                    </p>

                    <div class="font-bold text-xl px-1">
                        <a href="{{ route('posts.index', $post->user->username) }}">{{ $post->user->username }}
                        </a>
                    </div>

                </div>
            </div>
        </div>

    @endforeach


@endsection

