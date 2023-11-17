@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')

{{--    Imagen--}}
    <div class="container bg-white mx-auto md:flex">
        <div class="md:w-1/2">
            <img class="md:" src="{{asset('uploads/'. $post->imagen)}}" alt="Imagen del post {{$post->titulo}}">
            @auth
                @if($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @method('DELETE') @csrf

                        <input type="submit" value="Eliminar publicación" class="mt-5 mx-5 cursor-pointer text-white bg-indigo-500 hover:text-white border border-white hover:bg-indigo-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 text-center mr-2 mb-2">

                    </form>

                @endif
            @endauth

            </div>

        <div class="md:w-1/2 flex-col flex-none">
            <div class="px-5 pt-1 mb-3">
                <div class="flex flex-nowrap pt-2">
                    <div class="pl-1 pt-4">
                        <h1 >0 <span class="mt-0.5 inline w-4 h-4 text-indigo-800 "> Likes </span>
                        </h1>
                    </div>

                </div>

                <div>
                    <a class="font-bold" href="{{ route('posts.index', $post->user->username) }}">{{$post->user->username}}</a>
                    <p class="text-sm text-gray-500">
                        {{$post->created_at->diffForHumans()}}
                    </p>
                    <p class="mt-2 mb-3">
                        {{$post->descripcion}}
                    </p>
                </div>


{{--                cajita de comentarios--}}
                    <div class="flex-none sm:h-96 md:h-32 xl:h-96 lg:h-64 2xl:h-128 ">
                    <div class="flex mb-5">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                                Comentarios <span class="font-normal text-gray-400 truncate">
                                    ({{$comments->count()}})</span>
                            </h5>
                    </div>
                    <div class="flow-root overflow-y-auto sm:h-80 xl:h-80 md:h-20 lg:h-52 2xl:h-[29rem]">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach($comments as $comment)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="{{asset('img/usuario.svg')}}" alt="Imagen usuario">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a class="text-sm font-medium text-gray-900 truncate dark:text-white" href="{{ route('posts.index', $post->user->username) }}">
                                                {{$comment->user->username}}
                                                <span class="font-normal text-sm text-gray-900 truncate dark:text-gray-400">
                                                {{$comment->descripcion}}
                                            </span>
                                            </a>

                                            <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                                                {{$comment->created_at->diffForHumans()}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

{{--                Agregar comentarios--}}
                @auth
                <form method="POST" action="{{ route('comments.store', ['user'=> auth()->user()->id, 'post' => $post->id ]) }}">
                    @csrf
                    <div class="py-2 grid grid-cols-7 gap-2">

                        <div class="col-span-6">
                            <input
                            id="comentario"
                            name="comentario"
                            placeholder="Agrega un comentario"
                            class="border p-3 w-full rounded-lg  @error('comentario') border-red-500" @enderror
                            value="{{ old('comentario') }}"
                            required>

                            @error('comentario')
                            <p class=" text-red-700 rounded-lg text-sm text-center">{{ $message }}</p>
                            @enderror
                        </div>

                                <input type="submit"
                               value="Comentar"
                               class="text-sky-700 text-xs cursor-pointer hover:text-indigo-800 transition-colors">

                    </div>
                </form>
                @endauth

                </div>

            </div>

        </div>

@endsection
