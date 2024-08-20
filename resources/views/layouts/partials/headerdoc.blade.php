<header class="bg-gray-800 text-white py-6" style="background-color: rgb(0, 0, 0); box-shadow: 0 6px 40px rgba(0, 0, 0, 0.1);">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('images/default-user.png') }}" alt="Foto de perfil" class="w-12 h-12 rounded-full border-2 border-gray-100">
                @if(auth()->guard('doctor')->check())
                    <div class="ml-4">
                        <h1 class="text-lg font-semibold">{{ auth()->guard('doctor')->user()->nombre }} {{ auth()->guard('doctor')->user()->apellido }}</h1>
                        <p class="text-sm text-white">Bienvenido al <span class="text-white">portal de citas</span></p>
                    </div>
                @else
                    <div class="ml-4">
                        <h1 class="text-lg font-semibold">Invitado</h1>
                        <p class="text-sm text-gray-300">Por favor, inicia sesión</p>
                    </div>
                @endif
            </div>
            @if(auth()->guard('doctor')->check())
                <form action="{{ route('doctor.logout') }}" method="POST" class="ml-4">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md transition duration-300">Cerrar sesión</button>
                </form>
            @endif
        </div>
    </div>
</header>
