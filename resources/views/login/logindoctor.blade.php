@extends('login.plantillalogin')

@section('title', 'Login')

@section('login')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-md">
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Bienvenido al Portal de Doctores
      </h2>
    </div>

    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Error!</strong>
        <span class="block sm:inline">{{ $errors->first('correo') }}</span>
      </div>
    @endif

    <form class="mt-8 space-y-6" action="{{ route('doctor.login.submit') }}" method="POST">
      @csrf
        <div class="rounded-md shadow-sm -space-y-px">
            <div>
                <label for="correo" class="sr-only">Correo electrónico</label>
                <input id="correo" name="correo" type="email" autocomplete="email" required
                       class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300
                      placeholder-gray-500 text-black bg-white rounded-t-md focus:outline-none
                      focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       placeholder="Correo electrónico" value="{{ old('correo') }}">
            </div>
            <div>
                <label for="password" class="sr-only">Contraseña</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required
                       class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300
                      placeholder-gray-500 text-black bg-white rounded-b-md focus:outline-none
                      focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       placeholder="Contraseña">
            </div>
        </div>


        <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
          <label for="remember-me" class="ml-2 block text-sm text-gray-900">
            Recordarme
          </label>
        </div>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
              <path fill-rule="evenodd" d="M4 8V7a6 6 0 1112 0v1h1a1 1 0 011 1v8a1 1 0 01-1 1H4a1 1 0 01-1-1V9a1 1 0 011-1h2V7a4 4 0 018 0v1h2a1 1 0 011 1v8a1 1 0 01-1 1H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
          </span>
          Iniciar sesión
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
