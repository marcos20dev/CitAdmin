@extends('plantillas.administrador.plantilla')

@section('title', 'Ingresar Doctor')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('submenu')
    @include('vistas.administrador.doctor.nav')
@endsection

@section('content')

    <div class="flex"> <!-- Contenedor principal con flexbox -->
        <div class="max-w-2xl mx-auto py-8 px-4 flex-grow"> <!-- Primer div más grande -->
            <h1 class="text-3xl font-bold text-white mb-6">Registrar doctor</h1>
            <!-- Cambio de color del título a blanco -->

            <form action="{{ route('agregarDoctor') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
            
                <div>
                    <label class="block">
                        <span class="text-white">Nombre:</span>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                    </label>
                    @error('nombre')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <label class="block">
                        <span class="text-white">Apellido:</span>
                        <input type="text" name="apellido" value="{{ old('apellido') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                    </label>
                    @error('apellido')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <label class="block">
                        <span class="text-white">DNI:</span>
                        <input type="text" name="dni" value="{{ old('dni') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                    </label>
                    @error('dni')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <label class="block">
                        <span class="text-white">Especialidad:</span>
                        <select name="especialidad"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                            <option value="" disabled selected>Selecciona una especialidad</option>
                            <option value="Cardiología">Cardiología</option>
                            <option value="Dermatología">Dermatología</option>
                            <option value="Gastroenterología">Gastroenterología</option>
                        </select>
                    </label>
                    @error('especialidad')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block">
                        <span class="text-white">Correo electrónico:</span>
                        <input type="email" name="correo" value="{{ old('correo') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                    </label>
                    @error('correo')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block">
                        <span class="text-white">Contraseña:</span>
                        <div class="relative">
                            <input id="password" type="password" name="password" value="{{ old('password') }}"
                                class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2 pr-10">
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <img id="password-icon" src="{{ asset('logo/ps.png') }}" alt="Toggle Password Visibility" class="w-6 h-6">
                            </button>
                        </div>
                    </label>
                    
                    @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Registrar</button>
                </div>
            </form>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session()->has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: '{{ session('success') }}',
                confirmButtonText: 'Aceptar'
            });
        @endif
    </script>
    

    <script>
        function autoSizeTextarea() {
            const textarea = document.getElementById('descripcion');
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        window.addEventListener('DOMContentLoaded', autoSizeTextarea);
        document.getElementById('descripcion').addEventListener('input', autoSizeTextarea);

        function previewImage(event) {
            const preview = document.getElementById('preview');
            preview.innerHTML = '';
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onloadend = function() {
                const img = document.createElement('img');
                img.src = reader.result;
                img.className = 'w-full mt-2 rounded-md';
                preview.appendChild(img);
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }

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

        // Mostrar alerta de éxito usando SweetAlert2 si existe un mensaje de éxito en la sesión
        @if(session()->has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: '{{ session('success') }}',
                confirmButtonText: 'Aceptar'
            });
        @endif
    </script>

@endsection
