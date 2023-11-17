
   @extends('layouts.app')

   @section('titulo')
       Perfil: {{$user->name}}
   @endsection

   @section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img class="rounded-full" src="{{asset('img/icon.jpg')}}" alt="Imagen Usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col text-center md:items-start md:justify-center py-10 md:py-10">
                <p class="text-gray-700 text-2xl">{{$user->username}}</p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="form-normal"> Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="form-normal"> Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$posts->count()}}
                    <span class="form-normal"> Post</span>
                </p>
            </div>
        </div>
    </div>

       <section class="container mx-auto mt-10">
           <h2 class="text-4xl py-10 text-center font-black -my-10">Publicaciones</h2>

           @if($posts->count())
               <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 py-10">
                @foreach($posts as $post)
                    <a href="{{route('posts.show', ['post' => $post, 'user' => $user])}}">
                        <img src="{{asset('uploads/'.$post->imagen)}}" alt="Imagen {{$post->titulo}}" >
                    </a>
                @endforeach
               </div>

               <div class="my-10">
                   {{ $posts->links() }}
               </div>

           @else
               <p class="text-gray-600 uppercase text-sm text-center font-bold py-10"> No hay publicaciones</p>
           @endif
       </section>
   @endsection


