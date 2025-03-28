@extends('plantillas.plantillalogin')

@section('title', 'Acceso Soporte Elite')

@section('login')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


    <div class="min-h-screen flex items-center justify-center bg-static-gradient overflow-hidden relative p-4">
        <!-- Partículas estáticas -->
        <div id="particles-container"></div>

        <!-- Contenedor principal sin efectos hover -->
        <div class="relative w-full max-w-6xl mx-4 z-10 animate__animated animate__fadeIn">
            <div class="flex flex-col lg:flex-row rounded-2xl overflow-hidden glass-panel-static">
                <!-- Panel izquierdo -->
                <div class="w-full lg:w-1/2 p-10 lg:p-14 flex flex-col justify-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-900/90 to-red-700/90 z-0"></div>
                    <div class="absolute inset-0 opacity-10" style="
                        background-image: url('{{ asset('imagen/pattern.png') }}');
                        background-size: 300px;
                        z-index: 1;
                    "></div>

                    <div class="relative z-10 text-center">
                        <div class="floating mx-auto mb-10">
                            <img src="{{ asset('imagen/icon1.png') }}" class="h-44 mx-auto drop-shadow-2xl" alt="Logo Soporte Elite">
                        </div>

                        <h1 class="text-5xl font-bold mb-4 tracking-tight text-gradient">TECH SUPPORT ELITE</h1>
                        <p class="text-muted-white text-lg mb-10 font-medium">Plataforma de gestión técnica avanzada</p>

                        <div class="flex justify-center gap-5 flex-wrap">
                            <div class="feature-card-static p-5 rounded-xl">
                                <div class="w-14 h-14 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                                </div>
                                <p class="text-sm font-semibold uppercase tracking-wider">Seguridad Nivel 4</p>
                            </div>
                            <div class="feature-card-static p-5 rounded-xl">
                                <div class="w-14 h-14 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-bolt text-2xl text-white"></i>
                                </div>
                                <p class="text-sm font-semibold uppercase tracking-wider">Respuesta 24/7</p>
                            </div>
                            <div class="feature-card-static p-5 rounded-xl">
                                <div class="w-14 h-14 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-lock text-2xl text-white"></i>
                                </div>
                                <p class="text-sm font-semibold uppercase tracking-wider">Autenticación MFA</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel derecho (formulario) -->
                <div class="w-full lg:w-1/2 p-10 lg:p-14">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold mb-3 tracking-tight text-gradient">ACCESO SEGURO</h2>
                        <p class="text-muted-white font-medium">Ingrese sus credenciales autorizadas</p>
                    </div>

                    <form class="space-y-7" action="{{ route('soporte.login.submit') }}" method="POST">
                        @csrf

                        @error('email')
                        <div class="error-message-static p-4 rounded-lg animate__animated animate__shakeX flex items-center">
                            <i class="fas fa-exclamation-circle mr-3"></i>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                        @enderror


                        <div class="space-y-5">
                            <div>
                                <label class="form-label block text-sm mb-2">CORREO ELECTRÓNICO</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-black"></i>
                                    </div>
                                    <input id="email" name="email" type="email" required
                                           class="input-glass w-full pl-10 pr-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white/30"
                                           placeholder="correo@dominio.com" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div>
                                <label class="form-label block text-sm mb-2">CONTRASEÑA</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-black"></i>
                                    </div>
                                    <input id="password" name="password" type="password" required
                                           class="input-glass w-full pl-10 pr-12 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white/30"
                                           placeholder="••••••••">
                                    <button type="button" id="toggle-password"
                                            class="absolute inset-y-0 right-0 px-3 text-muted-white hover:text-white focus:outline-none"
                                            onclick="togglePassword()">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-1">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox"
                                       class="h-5 w-5 rounded border-white/30 focus:ring-primary bg-white/10">
                                <label for="remember_me" class="ml-3 block text-sm text-muted-white font-medium">
                                    Mantener sesión
                                </label>
                            </div>

                            <a href="#" class="text-sm text-white hover:text-accent transition font-semibold flex items-center">
                                <span class="border-b border-dotted border-white/30 hover:border-accent">¿Contraseña olvidada?</span>
                                <i class="fas fa-question-circle ml-2 text-sm"></i>
                            </a>
                        </div>

                        <div class="pt-8">
                            <button type="submit"
                                    class="btn-static w-full py-4 px-5 text-lg font-bold rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 shadow-lg">
                                <i class="fas fa-fingerprint mr-2"></i>
                                VERIFICAR IDENTIDAD
                            </button>
                        </div>

                        <div class="divider-static">O AUTENTICARSE CON</div>

                        <div class="grid grid-cols-2 gap-4">
                            <button type="button"
                                    class="social-btn-static flex items-center justify-center py-3 px-4 rounded-xl text-white font-medium">
                                <i class="fab fa-google mr-3"></i> Google
                            </button>
                            <button type="button"
                                    class="social-btn-static flex items-center justify-center py-3 px-4 rounded-xl text-white font-medium">
                                <i class="fab fa-microsoft mr-3"></i> Microsoft
                            </button>
                        </div>

                        <div class="text-center pt-8">
                            <button type="button"
                                    class="text-sm text-muted-white hover:text-white transition font-semibold flex items-center justify-center mx-auto"
                                    onclick="window.location.href='{{ route('inicio') }}'">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Volver al portal principal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer estático -->
        <div class="absolute bottom-0 left-0 right-0 py-5 footer-static z-10">
            <div class="container mx-auto px-4">
                <p class="text-sm flex flex-col sm:flex-row justify-center items-center gap-2 sm:gap-6 font-medium">
                    <span>© {{ date('Y') }} TECH SUPPORT ELITE v4.0</span>
                    <span class="hidden sm:block text-white/30">•</span>
                    <a href="#" class="text-white/80 hover:text-accent">Términos de servicio</a>
                    <span class="hidden sm:block text-white/30">•</span>
                    <a href="#" class="text-white/80 hover:text-accent">Política de privacidad</a>
                    <span class="hidden sm:block text-white/30">•</span>
                    <a href="#" class="text-white/80 hover:text-accent">Soporte técnico</a>
                    <span class="hidden sm:block text-white/30">•</span>
                    <a href="#" class="text-white/80 hover:text-accent">Documentación</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const eyeIcon = document.getElementById("toggle-password").querySelector("i");

            if (password.type === "text") {
                password.type = "password";
                eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                password.type = "text";
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
            }
        }

        // Efecto de partículas sin interacción
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('particles-container');
            const particleCount = window.innerWidth < 768 ? 6 : 12;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                const size = Math.random() * 300 + 100;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const duration = Math.random() * 25 + 15;
                const delay = Math.random() * 10;
                const colors = [
                    'linear-gradient(145deg, var(--accent), var(--secondary-light))',
                    'linear-gradient(145deg, var(--primary), var(--secondary))',
                    'linear-gradient(145deg, var(--accent-light), var(--accent))'
                ];
                const randomColor = colors[Math.floor(Math.random() * colors.length)];

                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.background = randomColor;
                particle.style.animation = `floating ${duration}s ease-in-out ${delay}s infinite, fadeIn 2s ${i * 0.2}s ease-out forwards`;

                container.appendChild(particle);
            }
        });
    </script>

    <style>
        :root {
            --primary: #e63946;
            --primary-dark: #c1121f;
            --primary-light: #ff758f;
            --secondary: #1d3557;
            --secondary-light: #457b9d;
            --accent: #a8dadc;
            --accent-light: #f1faee;
            --dark: #0d1b2a;
            --darker: #050a14;
            --light: #ffffff;
            --light-90: rgba(255, 255, 255, 0.9);
            --light-80: rgba(255, 255, 255, 0.8);
            --light-60: rgba(255, 255, 255, 0.6);
            --light-30: rgba(255, 255, 255, 0.3);
            --light-10: rgba(255, 255, 255, 0.1);

            --border-radius: 16px;
            --box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --transition: all 0.3s ease;
        }

        body {
            color: var(--light);
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
        }

        .bg-static-gradient {
            background: linear-gradient(135deg, var(--darker) 0%, var(--secondary) 100%);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .glass-panel-static {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.03) 100%);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--light-30);
            box-shadow: var(--box-shadow);
            border-radius: var(--border-radius);
        }

        .input-static {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--light-30);
            color: var(--light) !important;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .input-static::placeholder {
            color: var(--light-60) !important;
        }

        .input-static:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(168, 218, 220, 0.3);
            outline: none;
        }

        .btn-static {
            letter-spacing: 0.5px;
            font-weight: 700;
            position: relative;
            overflow: hidden;
            z-index: 1;
            background: linear-gradient(45deg, var(--primary), var(--primary-dark));
        }

        .floating {
            animation: floating 8s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0) rotate(-1deg); }
            50% { transform: translateY(-25px) rotate(1deg); }
        }

        .particle {
            position: absolute;
            background: linear-gradient(145deg, var(--accent), var(--secondary-light));
            border-radius: 50%;
            filter: blur(60px);
            z-index: 0;
            opacity: 0;
            animation: fadeIn 2s ease-out forwards;
        }

        .text-gradient {
            background: linear-gradient(90deg, var(--light), var(--accent-light));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .feature-card-static {
            background: linear-gradient(135deg, var(--light-10), var(--light-30));
            backdrop-filter: blur(8px);
            border: 1px solid var(--light-30);
        }

        .error-message-static {
            background: linear-gradient(90deg, rgba(239, 68, 68, 0.2), rgba(239, 68, 68, 0.1)) !important;
            border-left: 4px solid #ef4444;
            backdrop-filter: blur(10px);
        }

        .divider-static {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--light-60);
            margin: 2rem 0;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .divider-static::before, .divider-static::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid var(--light-30);
        }

        .divider-static::before {
            margin-right: 1.5rem;
        }

        .divider-static::after {
            margin-left: 1.5rem;
        }

        .social-btn-static {
            border: 1px solid var(--light-30);
            background: var(--light-10);
        }

        .footer-static {
            background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.5));
            backdrop-filter: blur(10px);
            border-top: 1px solid var(--light-10);
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .login-container {
                flex-direction: column;
            }

            .feature-card-static {
                padding: 1rem;
            }
        }
    </style>
@endsection

