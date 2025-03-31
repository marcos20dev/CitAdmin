@extends('plantillas.plantillalogin')

@section('title', 'Acceso Médico')

@section('login')
    <link rel="shortcut icon" href="{{ asset('logo/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Estilos CSS con nuevo diseño -->
    <style>
        :root {
            /* Nueva paleta de colores */
            --color-primary: #4f46e5;       /* Índigo oscuro */
            --color-primary-light: #6366f1; /* Índigo medio */
            --color-primary-dark: #4338ca;  /* Índigo más oscuro */
            --color-secondary: #10b981;    /* Verde esmeralda */
            --color-accent: #f59e0b;       /* Ámbar */
            --color-error: #ef4444;         /* Rojo */

            /* Colores de texto */
            --color-text: #1e293b;         /* Gris oscuro (texto principal) */
            --color-text-light: #64748b;    /* Gris medio (texto secundario) */

            /* Colores de fondo */
            --color-background: #f8fafc;   /* Gris claro (fondo principal) */
            --color-surface: #ffffff;       /* Blanco (tarjetas, formularios) */
            --color-border: #e2e8f0;       /* Borde gris claro */
            --color-overlay: rgba(0, 0, 0, 0.1); /* Overlay sutil */
        }

        /* Fondo con gradiente sutil */
        body {
            background: linear-gradient(135deg, #f9fafb 0%, #f1f5f9 100%);
        }

        /* Efecto de partículas médicas (más sutiles) */
        .particle-medical {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='120' height='120' viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='10' cy='10' r='4' fill='%234f46e5' fill-opacity='0.05'/%3E%3Ccircle cx='60' cy='60' r='6' fill='%234f46e5' fill-opacity='0.07'/%3E%3Ccircle cx='100' cy='100' r='5' fill='%234f46e5' fill-opacity='0.06'/%3E%3C/svg%3E");
            background-size: 150px 150px;
            background-repeat: repeat;
            z-index: 0;
            animation: moveParticles 15s infinite linear;
        }

        /* Animación para hacer que las partículas se muevan ligeramente */
        @keyframes moveParticles {
            0% { transform: translateX(0) translateY(0); }
            50% { transform: translateX(-10px) translateY(-10px); }
            100% { transform: translateX(0) translateY(0); }
        }


        /* Burbujas decorativas modernas */
        .bubble {
            position: absolute;
            border-radius: 50%;
            filter: blur(50px);
            opacity: 0.2;
            z-index: 0;
            mix-blend-mode: multiply;
        }

        .bubble-1 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, var(--color-primary) 0%, var(--color-primary-light) 70%, transparent 100%);
            top: 10%;
            left: 5%;
            animation: float-bubble-1 15s ease-in-out infinite;
        }

        .bubble-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, var(--color-primary-light) 0%, var(--color-secondary) 70%, transparent 100%);
            bottom: 15%;
            right: 10%;
            animation: float-bubble-2 18s ease-in-out infinite 2s;
        }

        .bubble-3 {
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, var(--color-secondary) 0%, var(--color-primary) 70%, transparent 100%);
            top: 60%;
            left: 20%;
            animation: float-bubble-3 12s ease-in-out infinite 1s;
        }

        /* Animaciones para burbujas */
        @keyframes float-bubble-1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-20px, -30px) scale(1.05); }
        }
        @keyframes float-bubble-2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(15px, -25px) scale(1.03); }
        }
        @keyframes float-bubble-3 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-10px, 20px) scale(0.98); }
        }

        /* Efectos hover modernos */
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-scale:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Tarjeta de login con sombra y bordes suaves */
        .login-card {
            background: var(--color-surface);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--color-border);
            backdrop-filter: blur(10px);
        }

        /* Barra superior decorativa */
        .decorative-bar {
            height: 4px;
            background: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
            border-radius: 4px 4px 0 0;
        }

        /* Botón de acceso con gradiente */
        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
            color: white;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        }
    </style>

    <!-- Fondo con efecto de burbujas y gradiente -->
    <div class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Partículas y burbujas de fondo -->
        <div class="absolute inset-0 overflow-hidden z-0">
            <div class="particle-medical"></div>
            <div class="bubble bubble-1"></div>
            <div class="bubble bubble-2"></div>

        </div>

        <!-- Contenido principal -->
        <div class="relative w-full max-w-7xl mx-4 lg:mx-10 flex flex-col lg:flex-row items-center justify-center gap-10 lg:gap-20 z-10 py-12 px-4">

            <!-- Sección izquierda (logo y descripción) -->
            <div class="w-full lg:w-1/2 flex flex-col items-center lg:items-start space-y-10 px-4">
                <!-- Botón de administrador -->
                <div class="w-full flex justify-end">
                    <button onclick="window.location.href='{{ route('inicio') }}'"
                            class="flex items-center space-x-2 px-6 py-3 bg-white hover:bg-gray-50 border border-gray-200 text-gray-800 rounded-xl text-md font-semibold hover-scale">
                        <svg class="h-5 w-5 text-indigo-600 group-hover:-translate-x-1 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Acceso Administrador</span>
                    </button>
                </div>

                <!-- Logo y texto descriptivo -->
                <div class="flex flex-col items-center lg:items-start space-y-10 text-center lg:text-left">
                    <div class="relative group transform transition duration-500 hover:scale-[1.03]">
                        <div class="absolute -inset-3 bg-gradient-to-r from-indigo-100 to-blue-100 rounded-2xl blur-lg opacity-60 group-hover:opacity-80 transition duration-700"></div>
                        <div class="relative bg-white/90 backdrop-blur-sm p-6 rounded-xl shadow-lg border border-gray-100">
                            <img src="{{ asset('imagen/icon2.png') }}" class="h-52 w-auto" alt="Hospital Logo">
                        </div>
                    </div>
                    <div class="space-y-6">
                        <h1 class="text-5xl font-bold text-gray-800 leading-tight">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-blue-500">Portal Médico</span><br>
                            <span class="text-gray-800 font-semibold">Hospital Distrital de Laredo</span>
                        </h1>
                        <p class="text-xl text-gray-600 max-w-lg leading-relaxed">
                            Plataforma segura para el acceso exclusivo del personal médico a los sistemas clínicos del hospital.
                        </p>
                        <div class="flex items-center space-x-3 text-indigo-600 font-medium">
                            <div class="p-2 bg-indigo-50 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <span class="text-base">Certificación HIPAA Nivel 4 - Encriptación AES-256</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de login (diseño moderno) -->
            <div class="w-full lg:w-1/2 max-w-md login-card p-10 relative overflow-hidden transition-smooth">
                <!-- Barra decorativa superior -->
                <div class="decorative-bar absolute top-0 left-0 right-0"></div>

                <!-- Formulario de acceso -->
                <form class="space-y-8" action="{{ route('doctor.login.submit') }}" method="POST">
                    @csrf

                    <div class="space-y-8">
                        <div class="text-center">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-3">
                                Acceso Médico
                            </h2>
                            <p class="text-gray-500 text-sm font-medium">
                                Ingrese sus credenciales
                            </p>
                        </div>

                        <div class="space-y-6">
                            <!-- Campo Correo -->
                            <div class="space-y-3">
                                <label for="correo" class="block text-sm font-medium text-gray-700">
                                    Correo electrónico
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input id="correo" name="correo" type="email" required
                                           class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-white border border-gray-200 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition-all shadow-sm hover:border-gray-300"
                                           placeholder="usuario@correo.com">
                                </div>
                            </div>

                            <!-- Campo Contraseña -->
                            <div class="space-y-3">
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    Contraseña
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <input id="password" name="password" type="password" required
                                           class="w-full pl-11 pr-12 py-3.5 rounded-xl bg-white border border-gray-200 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 shadow-sm hover:border-gray-300"
                                           placeholder="••••••••">
                                    <button id="toggle-password-button" type="button"
                                            class="absolute right-3 bottom-3.5 p-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors shadow-sm"
                                            onclick="togglePassword()">
                                        <img id="password-icon" src="{{ asset('logo/ps.png') }}"
                                             alt="Mostrar/Ocultar contraseña" class="h-4 w-4">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Mensaje de error -->
                        @error('correo')
                        <div class="px-4 py-3 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-center">
                            <svg class="h-5 w-5 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $message }}</span>
                        </div>
                        @enderror

                        <!-- Opciones de acceso -->
                        <div class="flex items-center justify-between pt-3">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox"
                                       class="h-4 w-4 rounded bg-white border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-600">
                                    Recordar mi acceso
                                </label>
                            </div>

                            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition-colors hover:underline">
                                ¿Olvidó su contraseña?
                            </a>
                        </div>

                        <!-- Botón de Submit (con gradiente) -->
                        <div class="pt-6">
                            <button type="submit"
                                    class="w-full py-4 px-6 btn-primary rounded-xl shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform hover:scale-[1.02] active:scale-[0.98] group relative overflow-hidden">
                                <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                <span class="relative z-10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    Acceder al Portal
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="absolute bottom-0 left-0 right-0 h-20 bg-white/95 border-t border-gray-200 flex items-center justify-center z-10 backdrop-blur-sm">
            <div class="flex flex-col items-center space-y-1">
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-500 hover:text-indigo-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </a>
                </div>
                <p class="text-gray-600 text-xs tracking-wide font-medium mt-2">
                    © 2023 Hospital Distrital de Laredo - v4.2.1
                </p>
                <p class="text-gray-500 text-[0.65rem]">
                    Todos los derechos reservados | Política de privacidad
                </p>
            </div>
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
