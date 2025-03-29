@extends('plantillas.plantillalogin')

@section('title', 'Inicio de sesión')

@section('login')
    <link rel="shortcut icon" href="{{ asset('logo/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Fondo Ultra Premium Oscuro -->
    <div class="neural-network"></div>
    <div class="particles-container" id="particles-js"></div>
    <div class="particle-connections" id="connections-js"></div>
    <div class="holographic-waves"></div>

    <!-- Contenido Principal -->
    <div class="min-h-screen flex items-center justify-center relative overflow-hidden p-4">
        <div class="relative w-full max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-20 z-10 py-12">

            <!-- Sección Izquierda -->
            <div class="w-full lg:w-1/2 flex flex-col items-center lg:items-start space-y-12 px-4 transform transition-all duration-500 hover:scale-[1.01]">
                <!-- Botón Médico -->
                <div class="w-full flex justify-end">
                    <button type="button" onclick="window.location.href='{{ route('doctor') }}'"
                            class="group flex items-center space-x-3 px-6 py-3 bg-gray-800 hover:bg-gray-700 border border-gray-700 text-gray-200 rounded-xl text-md font-medium transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1">
                        <svg class="h-5 w-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <span>Acceso Médico</span>
                        <svg class="h-4 w-4 group-hover:translate-x-1 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <!-- Logo y Texto -->
                <div class="flex flex-col items-center lg:items-start space-y-10 text-center lg:text-left">
                    <div class="logo-3d relative group">
                        <div class="absolute -inset-3 bg-gradient-to-r from-indigo-900/50 to-blue-900/50 rounded-2xl blur-xl opacity-60 group-hover:opacity-80 transition duration-700"></div>
                        <div class="relative bg-gray-800/90 backdrop-blur-sm p-6 rounded-xl shadow-lg border border-gray-700/50">
                            <img src="{{ asset('imagen/icon.png') }}" class="h-52 w-auto" alt="Hospital Logo">
                            <div class="absolute -bottom-2 -right-2 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">v4.2.1</div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h1 class="text-5xl font-bold text-gray-100 leading-tight">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-blue-400">Sistema Clínico</span><br>
                            <span class="text-gray-300">Integrado</span>
                        </h1>
                        <p class="text-xl text-gray-400 max-w-lg leading-relaxed">
                            Plataforma segura para la gestión administrativa hospitalaria con los más altos estándares de seguridad.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <div class="flex items-center space-x-2 bg-indigo-900/40 px-4 py-2 rounded-full border border-indigo-800/50 backdrop-blur-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <span class="text-sm font-medium text-indigo-300">Certificado HIPAA</span>
                            </div>
                            <div class="flex items-center space-x-2 bg-indigo-900/40 px-4 py-2 rounded-full border border-indigo-800/50 backdrop-blur-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span class="text-sm font-medium text-indigo-300">Cifrado AES-256</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Login -->
            <div class="w-full lg:w-1/2 max-w-md dark-glass-card p-10 relative overflow-hidden">
                <!-- Barra decorativa superior -->
                <div class="holographic-bar absolute top-0 left-0 right-0"></div>

                <!-- Formulario de acceso -->
                <form class="space-y-8" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="space-y-8">
                        <div class="text-center pt-4">
                            <div class="mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 mx-auto text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-100 mb-3">
                                Acceso Administrativo
                            </h2>
                            <p class="text-gray-400 text-sm font-medium">
                                Credenciales restringidas al personal autorizado
                            </p>
                        </div>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
                        <div class="space-y-6">
                            <!-- Campo Usuario -->
                            <div class="space-y-3">
                                <label for="usuario" class="block text-sm font-medium text-gray-300">
                                    Usuario
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400 text-lg"></i>
                                    </div>
                                    <input id="usuario" name="usuario" type="text" required
                                           class="w-full pl-11 pr-4 py-3.5 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-400 transition-all duration-200"
                                           placeholder="usuario.admin"
                                           autocomplete="username">
                                </div>
                            </div>

                            <!-- Campo Contraseña -->
                            <div class="space-y-3">
                                <label for="password" class="block text-sm font-medium text-gray-300">
                                    Contraseña
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-400 text-lg"></i>
                                    </div>
                                    <input id="password" name="password" type="password" required
                                           class="w-full pl-11 pr-12 py-3.5 bg-gray-700 border border-gray-600 rounded-xl text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-400 transition-all duration-200"
                                           placeholder="••••••••"
                                           autocomplete="current-password">
                                    <button id="toggle-password-button" type="button"
                                            class="absolute right-3 bottom-3.5 p-1.5 rounded-lg bg-gray-600/70 hover:bg-gray-500/70 transition-colors backdrop-blur-sm"
                                            onclick="togglePassword()">
                                        <i id="password-icon" class="fas fa-eye text-gray-300 text-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <!-- Mensaje de error -->
                        @error('usuario')
                        <div class="px-4 py-3 rounded-xl bg-red-900/80 border border-red-700 text-red-100 text-sm flex items-center animate-shake backdrop-blur-sm">
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
                                       class="h-4 w-4 rounded bg-gray-700 border-gray-600 text-indigo-500 focus:ring-indigo-400">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-400">
                                    Recordar mi acceso
                                </label>
                            </div>

                            <button type="button"
                                    class="text-sm text-indigo-400 hover:text-indigo-300 font-medium transition-colors hover:underline"
                                    onclick="window.location.href='{{ route('soporte') }}'">
                                <svg class="h-4 w-4 mr-1 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                Soporte Técnico
                            </button>
                        </div>

                        <!-- Botón de Submit -->
                        <div class="pt-6">
                            <button type="submit"
                                    class="w-full py-4 px-6 dark-holographic-btn rounded-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform hover:-translate-y-1 active:translate-y-0 group relative overflow-hidden">
                                <span class="absolute inset-0 bg-white/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                <span class="relative z-10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    Acceder al sistema
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer Futurista Oscuro -->
        <div class="dark-holographic-footer absolute bottom-0 left-0 right-0 h-20 flex items-center justify-center z-10">
            <div class="flex flex-col items-center space-y-1">
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-500 hover:text-indigo-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </a>
                </div>
                <p class="text-gray-400 text-xs tracking-wide font-medium mt-2">
                    © 2023 Sistema Clínico Integrado - v4.2.1
                </p>
                <p class="text-gray-500 text-[0.65rem]">
                    Todos los derechos reservados | Política de privacidad
                </p>
            </div>
        </div>
    </div>

    <script>
        // Función para crear partículas
        function createParticles() {
            const container = document.getElementById('particles-js');
            const particleCount = 50;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                // Tamaño aleatorio entre 1px y 5px
                const size = Math.random() * 4 + 1;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                // Posición inicial aleatoria
                const posX = Math.random() * 100;
                particle.style.left = `${posX}%`;
                particle.style.bottom = '-10px';

                // Opacidad aleatoria
                const opacity = Math.random() * 0.3 + 0.1;
                particle.style.opacity = opacity;

                // Duración de animación aleatoria
                const duration = Math.random() * 20 + 10;
                particle.style.animationDuration = `${duration}s`;

                // Retraso aleatorio
                const delay = Math.random() * 15;
                particle.style.animationDelay = `${delay}s`;

                container.appendChild(particle);
            }
        }

        // Función para crear conexiones entre partículas
        function createConnections() {
            const container = document.getElementById('connections-js');
            const canvas = document.createElement('canvas');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            container.appendChild(canvas);

            const ctx = canvas.getContext('2d');
            const particles = [];
            const particleCount = 90;

            // Crear partículas para las conexiones
            for (let i = 0; i < particleCount; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    size: Math.random() * 2 + 1,
                    speedX: Math.random() * 0.5 - 0.25,
                    speedY: Math.random() * 0.5 - 0.25
                });
            }

            // Función de animación
            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                // Actualizar y dibujar partículas
                particles.forEach(particle => {
                    particle.x += particle.speedX;
                    particle.y += particle.speedY;

                    // Rebotar en los bordes
                    if (particle.x < 0 || particle.x > canvas.width) particle.speedX *= -1;
                    if (particle.y < 0 || particle.y > canvas.height) particle.speedY *= -1;

                    // Dibujar partícula
                    ctx.fillStyle = `rgba(99, 102, 241, ${particle.size/3})`;
                    ctx.beginPath();
                    ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
                    ctx.fill();
                });

                // Dibujar conexiones
                for (let i = 0; i < particles.length; i++) {
                    for (let j = i + 1; j < particles.length; j++) {
                        const dx = particles[i].x - particles[j].x;
                        const dy = particles[i].y - particles[j].y;
                        const distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < 150) {
                            const opacity = 1 - distance / 150;
                            ctx.strokeStyle = `rgba(99, 102, 241, ${opacity * 0.2})`;
                            ctx.lineWidth = 0.8;
                            ctx.beginPath();
                            ctx.moveTo(particles[i].x, particles[i].y);
                            ctx.lineTo(particles[j].x, particles[j].y);
                            ctx.stroke();
                        }
                    }
                }

                requestAnimationFrame(animate);
            }

            animate();

            // Redimensionar canvas al cambiar tamaño de ventana
            window.addEventListener('resize', () => {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });
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

            // Efecto de animación al hacer clic
            icon.parentElement.classList.add("animate-ping");
            setTimeout(() => {
                icon.parentElement.classList.remove("animate-ping");
            }, 300);
        }

        // Inicializar cuando el DOM esté cargado
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            createConnections();

            setTimeout(() => {
                document.querySelectorAll('input').forEach(input => {
                    input.classList.add('transition-all', 'duration-300');
                });
            }, 500);
        });
    </script>
    <!-- Estilos CSS Ultra Premium Oscuro -->
    <style>
        :root {
            --color-primary: #6366f1;
            --color-primary-light: #818cf8;
            --color-primary-dark: #4f46e5;
            --color-secondary: #10b981;
            --color-accent: #f59e0b;
            --color-error: #ef4444;
            --color-text: #f3f4f6;
            --color-text-light: #9ca3af;
            --color-background: #111827;
            --color-surface: rgba(31, 41, 55, 0.9);
            --color-border: rgba(55, 65, 81, 0.6);
        }

        /* Fondo oscuro con múltiples efectos */
        body {
            background: linear-gradient(-45deg,
            #2e3136,
            #1f2937,
            #22252a,
            #1e293b);
            background-size: 400% 400%;
            animation: gradientBG 18s ease infinite;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
            color: var(--color-text);
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Efecto de red neuronal en el fondo */
        .neural-network {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: 0.15;
            background-image:
                radial-gradient(circle at 20% 30%, var(--color-primary-dark) 0%, transparent 25%),
                radial-gradient(circle at 80% 70%, var(--color-secondary) 0%, transparent 25%),
                linear-gradient(to right, rgba(79, 70, 229, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(79, 70, 229, 0.1) 1px, transparent 1px);
            background-size:
                100% 100%,
                100% 100%,
                40px 40px,
                40px 40px;
            animation: neuralPulse 12s infinite alternate;
        }

        @keyframes neuralPulse {
            0% { opacity: 0.1; }
            100% { opacity: 0.2; }
        }

        /* Partículas flotantes premium */
        .particles-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: var(--color-primary-light);
            border-radius: 50%;
            opacity: 0;
            filter: blur(1px);
            animation: floatParticle linear infinite;
        }

        @keyframes floatParticle {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 0.3;
            }
            90% {
                opacity: 0.3;
            }
            100% {
                transform: translateY(-100vh) translateX(20px);
                opacity: 0;
            }
        }

        /* Efecto de ondas holográficas */
        .holographic-waves {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30vh;
            background: linear-gradient(0deg, rgba(99, 102, 241, 0.1) 0%, transparent 100%);
            z-index: 1;
            animation: waveAnimation 8s ease-in-out infinite;
            mask-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="white"/></svg>');
            mask-size: 1200px 120px;
            mask-repeat: repeat-x;
        }

        @keyframes waveAnimation {
            0% { transform: translateX(0); }
            100% { transform: translateX(-600px); }
        }

        /* Efecto de conexiones entre partículas */
        .particle-connections {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        /* Tarjeta de vidrio futurista oscura */
        .dark-glass-card {
            background: rgba(31, 41, 55, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 24px;
            border: 1px solid var(--color-border);
            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.2),
                0 8px 25px rgba(79, 70, 229, 0.25),
                inset 0 0 15px rgba(255, 255, 255, 0.1);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            z-index: 10;
            position: relative;
        }

        .dark-glass-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.05) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: rotate(30deg);
            animation: shine 6s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) rotate(30deg); }
            100% { transform: translateX(100%) rotate(30deg); }
        }

        .dark-glass-card:hover {
            transition: transform 0.3s ease;
            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.3),
                0 15px 35px rgba(79, 70, 229, 0.3),
                inset 0 0 20px rgba(255, 255, 255, 0.1);
        }

        /* Barra decorativa holográfica */
        .holographic-bar {
            height: 6px;
            background: linear-gradient(
                90deg,
                var(--color-primary),
                var(--color-secondary),
                var(--color-primary)
            );
            background-size: 200% 100%;
            border-radius: 6px 6px 0 0;
            position: relative;
            overflow: hidden;
            animation: gradientFlow 3s ease infinite;
        }

        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Botón futurista oscuro */
        .dark-holographic-btn {
            background: linear-gradient(
                135deg,
                var(--color-primary-dark),
                var(--color-primary)
            );
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            box-shadow:
                0 5px 20px rgba(79, 70, 229, 0.5),
                0 2px 10px rgba(255, 255, 255, 0.1) inset;
            z-index: 1;
        }

        .dark-holographic-btn:hover {
            transform: translateY(-4px);
            box-shadow:
                0 10px 30px rgba(79, 70, 229, 0.6),
                0 3px 15px rgba(255, 255, 255, 0.2) inset;
        }

        .dark-holographic-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: 0.6s;
            z-index: -1;
        }

        .dark-holographic-btn:hover::before {
            left: 100%;
        }

        /* Input fields futuristas oscuros */
        .dark-holographic-input {
            background: rgba(55, 65, 81, 0.8);
            border: 1px solid rgba(75, 85, 99, 0.7);
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            box-shadow:
                0 2px 5px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(99, 102, 241, 0) inset;
        }

        .dark-holographic-input:hover {
            border-color: var(--color-primary-light);
            box-shadow:
                0 2px 8px rgba(0, 0, 0, 0.2),
                0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .dark-holographic-input:focus {
            border-color: var(--color-primary);
            box-shadow:
                0 2px 10px rgba(0, 0, 0, 0.2),
                0 0 0 3px rgba(79, 70, 229, 0.2);
            background: rgba(31, 41, 55, 0.9);
        }

        /* Animaciones premium */
        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            25% {
                transform: translateY(-12px) translateX(6px) rotate(1deg);
            }
            50% {
                transform: translateY(6px) translateX(-6px) rotate(-1deg);
            }
            75% {
                transform: translateY(-6px) translateX(3px) rotate(0.5deg);
            }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delay {
            animation: float 8s ease-in-out 2s infinite;
        }

        /* Logo 3D */
        .logo-3d {
            perspective: 1000px;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .logo-3d:hover {
            transform: rotateY(15deg) rotateX(5deg) scale(1.05);
        }

        /* Footer futurista oscuro */
        .dark-holographic-footer {
            background: rgba(31, 41, 55, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-top: 1px solid rgba(55, 65, 81, 0.7);
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
