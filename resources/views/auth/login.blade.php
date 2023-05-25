@extends('layouts.app')

@section('titulo')
Pagina principal
@endsection()


@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
<div class="md:w-6/12 p-5">
    <p><img src="{{asset('img/login.jpg')}}"/></p>
</div>
<div class="md:w-4/12 bg-white shadow-xl p-6 rounded-lg">
    <form action="{{route('login')}}" method="POST">
        @csrf

        
        @if(session('mensaje'))
        <p class="bg-red-500 text-white rounded-lg tet-sm p-2 text-center my-2">{{session('mensaje')}}</p>   
        @endif
        <div class="mb-5">
            <label id="email" class="mb-2 block uppercase text-grat-500 font-bold">
                Email
            </label>
            <input name="email" id="email" type="email" placeholder="Tu Email" class="border p-3 w-full rounded-lg"/>
            @error('email')
            <p class="bg-red-500 text-white rounded-lg tet-sm p-2 text-center my-2">{{$message}}</p>   
            @enderror
        </div>
        <div class="mb-5">
            <label id="password" class="mb-2 block uppercase text-grat-500 font-bold">
                Password
            </label>
            <input 
                name="password" 
                id="password" 
                type="password" 
                placeholder="Tu Password" 
                class="border p-3 w-full rounded-lg" 
                placeholder="Repite Password"/>
            @error('password')
            <p class="bg-red-500 text-white rounded-lg tet-sm p-2 text-center my-2">{{$message}}</p>   
            @enderror
        </div>
        <div>
            <input type="checkbox" name="remember"> <label>Recuerdame en el sitio</label>
        </div>
        <input 
        type="submit" 
        value="Iniciar" 
        class="w-full bg-sky-600 hover:bg-sky-700 transition-colors
        text-white w-full p-3 rounded-lg"
        />
    </form>
</div>
</div>
@endsection()