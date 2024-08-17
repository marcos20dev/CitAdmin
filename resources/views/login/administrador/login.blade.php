@extends('plantillas.plantillalogin')

@section('title', 'Inicio de sesion')

@section('login')
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon">
    <div class="relative min-h-screen flex items-start justify-center bg-cover bg-center pt-12"
        style="background-image: url('{{ asset('logo/fondo1.jpg') }}');">

        <div class="absolute left-20 w-full max-w-4xl space-y-0 p-2 rounded-lg z-10 flex">

            <div class="w-full md:w-1/2 px-0 py-20">


                <div class="flex justify-end w-full">
                    <button type="button"
                        class="group relative flex justify-center items-center py-2 px-4 border border-red-600 text-lg font-medium rounded-md text-red-600 hover:text-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600"
                        onclick="window.location.href='{{ route('doctor') }}'">
                        Doctor
                        <svg class="ml-2 h-6 w-6 text-red-600 group-hover:text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </button>
                </div>
                
                <div class="flex flex-col items-center">

                    <div>
                        <img src="{{ asset('imagen/icon.png') }}" class="h-30 w-40" alt="Company Logo">
                    </div>

                    <br>
                    <h2 class="text-center text-3xl font-semibold text-white">Iniciar sesión</h2>
                    <h3 class="text-center text-xl text-white">Administrador</h3>
                </div>
                <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="rounded-md shadow-sm">
                        <div style="margin-bottom: 20px;">
                            <div>
                                <label for="usuario" class="sr-only">Usuario</label>
                                <input id="usuario" name="usuario" type="text" required
                                    class="appearance-none rounded-md relative block w-full px-3 py-2 border
                                border-gray-300 placeholder-gray-300 text-white bg-white bg-opacity-30 focus:ring-white focus:border-white"
                                    placeholder="Usuario">
                            </div>
                            <br>
                            <div>
                                <label for="password" class="sr-only">Contraseña</label>
                                <div class="relative flex items-center">
                                    <input id="password" name="password" type="password" required
                                        class="appearance-none rounded-md relative block w-full px-3 py-2 border
                                    border-gray-300 placeholder-gray-300 text-white bg-white bg-opacity-30 focus:ring-white focus:border-white"
                                        placeholder="Contraseña">
                                    <button id="toggle-password-button" type="button"
                                        class="absolute inset-y-0 right-0 px-3 text-gray-600 focus:outline-none bg-white bg-opacity-80 rounded-md"
                                        onclick="togglePassword()">
                                        <img id="password-icon" src="{{ asset('logo/ps.png') }}"
                                            alt="Mostrar/Ocultar contraseña" class="h-7 w-7">
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    @error('usuario')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="h-4 w-4 text-white focus:ring-white border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-white">
                                Recordarme
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="group relative flex justify-center py-2 px-6 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                            Iniciar sesión
                        </button>
                    </div>

                    <div class="flex justify-end w-full">
                        <button type="button"
                            class="group relative flex justify-center items-center py-2 px-6 text-sm font-medium rounded-md text-red-600 hover:text-red-500"
                            onclick="window.location.href='{{ route('soporte') }}'">
                            Soporte
                            <svg class="ml-2 h-5 w-5 text-red-600 group-hover:text-red-500"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>



                </form>
            </div>
        </div>

        <!-- Nueva imagen agregada, aún más abajo en la página -->
        <div class="absolute inset-x-0 bottom-0">
            <img src="{{ asset('imagen/login.png') }}" class="w-full" alt="Login Background Image">
        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const icon = document.getElementById("password-icon");

            if (password.type === "text") {
                password.type = "password";
                icon.src = "{{ asset('logo/ps.png') }}";
            } else {
                password.type = "text";
                icon.src = "{{ asset('logo/ps-tachado.png') }}";
            }
        }
    </script>
@endsection
