@extends('layouts.app')

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <div class="md:w-4/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen Registro de Usuarios" width="500" height="500">
        </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">

        <h2 class="text-4xl pb-10 text-center font-extrabold dark:text-white text-gray-600">
            INICIAR SESIÓN
        </h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if(session('status'))
                {{session('status')}}
            @endif

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input type="email" id="email" name="email" placeholder="Tu Email"
                       class="border p-3 w-full rounded-lg @error('email') border-red-500" @enderror value="{{ old('name') }}">

                @error('email')
                <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password
                </label>
                <input type="password" id="password" name="password" placeholder="Tu Password"
                       class="border p-3 w-full rounded-lg  @error('password') border-red-500" @enderror value="{{ old('name') }}">

                @error('password')
                <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror

            </div>

            <input type="submit"
                   value="Iniciar Sesión"
                   class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

        </form>

    </div>
    </div>
@endsection
