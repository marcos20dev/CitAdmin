<div class="p-6 space-y-4" id="citas-container">
    @forelse($citas as $cita)
    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg shadow hover:bg-gray-100">
        <div class="flex items-center">
            <img class="w-12 h-12 rounded-full" src="https://placehold.co/48x48/eeeeee/4B5563/png?text=Paciente" alt="Paciente">
            <div class="ml-4">
                <h4 class="text-lg font-medium text-gray-800">{{ $cita->user->Nombre }} {{ $cita->user->ApePaterno }}</h4>
                <p class="text-sm text-gray-500">Fecha: {{ $cita->horario->fecha }}</p>
                <p class="text-sm text-gray-500">Hora: {{ $cita->horario->hora }}</p>
                <p class="text-sm text-gray-500">Estado: {{ $cita->estado == 0 ? 'Sin Atender' : 'Atendida' }}</p>
            </div>
        </div>

        @if($cita->estado == 0)
        <button 
            class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600"
            data-cita-id="{{ $cita->id }}"
            onclick="actualizarEstado(this)"
        >
            Marcar como Atendida
        </button>
        @endif
    </div>
    @empty
    <p class="text-gray-500">No tienes citas.</p>
    @endforelse
</div>
<script>
    function actualizarEstado(button) {
        const citaId = button.getAttribute('data-cita-id');

        fetch('{{ url('cita') }}/' + citaId + '/actualizar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Actualiza la lista de citas después de la actualización
                document.getElementById('citas-container').innerHTML = data.html;

                // Actualiza los contadores
                document.getElementById('count-programadas').textContent = data.citasProgramadas;
                document.getElementById('count-atendidas').textContent = data.citasAtendidas;
            } else {
                alert('Error al actualizar el estado.');
            }
        });
    }
</script>
