<div class="flex flex-col space-y-4">
    <!-- Botón para Agregar Cuentas -->
    <div class="w-full">
        <a href="{{ route('añadircuentas') }}" id="btnAñadirCuentas"
            class="menu-button inline-block w-full py-2 px-4 text-black font-normal transition-all transform hover:scale-105 bg-gray-200 bg-opacity-100 hover:bg-opacity-75 relative">
            <div class="absolute top-0 left-0 h-full bg-gray-500 bg-opacity-100 hover:bg-opacity-100" style="width: 3px;"></div>
            <i class="fas fa-plus-circle mr-2"></i>
            Agregar Cuentas
        </a>
        <hr class="border-b border-gray-300 my-2">
    </div>

    <!-- Botón para Ver Cuentas de Doctores -->
    <div class="w-full">
        <a href="{{ route('ver.doctores') }}" id="btnVerDoctores"
            class="menu-button inline-block w-full py-2 px-4 text-black font-normal transition-all transform hover:scale-105 bg-gray-200 bg-opacity-90 hover:bg-opacity-75 relative">
            <div class="absolute top-0 left-0 h-full bg-gray-600 bg-opacity-100 hover:bg-opacity-100" style="width: 3px;"></div>
            <i class="fas fa-user-md mr-2"></i>
            Ver Cuentas de Doctor
        </a>
        <hr class="border-b border-gray-300 my-2">
    </div>

    <!-- Botón para Ver Cuentas de Administradores -->
    <div class="w-full">
        <a href="{{ route('ver.administradores') }}" id="btnVerAdministradores"
            class="menu-button inline-block w-full py-2 px-4 text-black font-normal transition-all transform hover:scale-105 bg-gray-200 bg-opacity-90 hover:bg-opacity-75 relative">
            <div class="absolute top-0 left-0 h-full  bg-gray-600 bg-opacity-100 hover:bg-opacity-100" style="width: 3px;"></div>
            <i class="fas fa-users-cog mr-2"></i>
            Ver Cuentas de Administrador
        </a>
        <hr class="border-b border-gray-300 my-2">
    </div>
</div>


<style>
    .active-button {
    background-color: #4ab5bd; /* Cambia este color al que prefieras */
}

</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.menu-button');

    // Resaltar el botón activo basado en la URL actual
    const currentPath = window.location.pathname;
    buttons.forEach(button => {
        const path = new URL(button.href).pathname;
        if (path === currentPath) {
            button.classList.add('active-button'); // Añade la clase al botón actual
        }
    });

    // Escuchar los clics para actualizar el indicador activo
    buttons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Previene la navegación inmediata
            // Remover la clase activa de todos los botones
            buttons.forEach(btn => {
                btn.classList.remove('active-button');
            });
            // Añadir la clase activa a este botón
            this.classList.add('active-button');
            // Opcional: Redireccionar manualmente a la URL del botón
            window.location.href = this.href;
        });
    });
});

</script>