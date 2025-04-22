@extends('plantillas.administrador.plantilla')

@section('title', 'Panel de Administración - Citas Médicas')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')


        <!-- Estadísticas Principales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <!-- Tarjeta Personal Médico -->
            <div class="bg-gray-700 rounded-xl p-4 shadow-lg border border-gray-600 hover:border-blue-500 transition-all">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-blue-300 font-medium">Personal Médico</p>
                        <h2 class="text-2xl font-bold text-white mt-1">28</h2>
                        <div class="flex items-center mt-2">
                        <span class="text-green-400 text-sm flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 4 nuevos
                        </span>
                            <span class="text-gray-400 text-sm ml-3">este trimestre</span>
                        </div>
                    </div>
                    <div class="bg-blue-500/20 p-3 rounded-lg">
                        <i class="fas fa-user-md text-xl text-blue-400"></i>
                    </div>
                </div>
                <div class="mt-3 flex justify-between text-xs text-gray-400">
                    <span>15 Especialistas</span>
                    <span>13 Generalistas</span>
                </div>
            </div>

            <!-- Tarjeta Citas del Día -->
            <div class="bg-gray-700 rounded-xl p-4 shadow-lg border border-gray-600 hover:border-green-500 transition-all">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-green-300 font-medium">Citas Hoy</p>
                        <h2 class="text-2xl font-bold text-white mt-1">47</h2>
                        <div class="flex items-center mt-2">
                        <span class="text-green-400 text-sm flex items-center">
                            <i class="fas fa-check-circle mr-1"></i> 32 confirmadas
                        </span>
                        </div>
                    </div>
                    <div class="bg-green-500/20 p-3 rounded-lg">
                        <i class="fas fa-calendar-check text-xl text-green-400"></i>
                    </div>
                </div>
                <div class="mt-3 flex justify-between text-xs text-gray-400">
                    <span>9:00 AM - Pico</span>
                    <span>15 Pendientes</span>
                </div>
            </div>

            <!-- Tarjeta Horarios -->
            <div class="bg-gray-700 rounded-xl p-4 shadow-lg border border-gray-600 hover:border-purple-500 transition-all">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-purple-300 font-medium">Horarios Activos</p>
                        <h2 class="text-2xl font-bold text-white mt-1">186</h2>
                        <div class="flex items-center mt-2">
                        <span class="text-blue-400 text-sm flex items-center">
                            <i class="fas fa-clock mr-1"></i> 72 disponibles
                        </span>
                        </div>
                    </div>
                    <div class="bg-purple-500/20 p-3 rounded-lg">
                        <i class="fas fa-calendar-alt text-xl text-purple-400"></i>
                    </div>
                </div>
                <div class="mt-3 flex justify-between text-xs text-gray-400">
                    <span>78% Ocupación</span>
                    <span>14 Horas semanales/doc</span>
                </div>
            </div>

            <!-- Tarjeta Consultorios -->
            <div class="bg-gray-700 rounded-xl p-4 shadow-lg border border-gray-600 hover:border-yellow-500 transition-all">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-yellow-300 font-medium">Consultorios</p>
                        <h2 class="text-2xl font-bold text-white mt-1">12</h2>
                        <div class="flex items-center mt-2">
                        <span class="text-green-400 text-sm flex items-center">
                            <i class="fas fa-check mr-1"></i> 10 operativos
                        </span>
                        </div>
                    </div>
                    <div class="bg-yellow-500/20 p-3 rounded-lg">
                        <i class="fas fa-clinic-medical text-xl text-yellow-400"></i>
                    </div>
                </div>
                <div class="mt-3 flex justify-between text-xs text-gray-400">
                    <span>2 En mantenimiento</span>
                    <span>85% Uso promedio</span>
                </div>
            </div>
        </div>

        <!-- Sección Principal -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
            <!-- Agenda de Citas -->
            <div class="lg:col-span-2 bg-gray-700 rounded-xl p-4 shadow-lg border border-gray-600">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-3">
                    <h2 class="text-xl font-bold text-white">Próximas Citas (Hoy)</h2>
                    <div class="flex space-x-2">
                        <select class="bg-gray-600 text-white rounded-lg px-3 py-1 text-sm border border-gray-500">
                            <option>Todas las especialidades</option>
                            <option>Cardiología</option>
                            <option>Pediatría</option>
                            <option>Dermatología</option>
                        </select>
                        <button class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded-lg text-sm font-medium transition-all">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-600">
                        <thead class="bg-gray-600">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Hora</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Paciente</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Médico</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Consultorio</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Estado</th>
                        </tr>
                        </thead>
                        <tbody class="bg-gray-700 divide-y divide-gray-600">
                        <!-- Cita 1 -->
                        <tr class="hover:bg-gray-600 transition-colors">
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-white">09:00 AM</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-medium text-sm mr-3">JL</div>
                                    <div class="text-sm text-white">Juan López</div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-white">Dr. Rodríguez</div>
                                <div class="text-xs text-gray-400">Cardiólogo</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-white">C-3</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">
                                    <i class="fas fa-check-circle mr-1"></i> Confirmada
                                </span>
                            </td>
                        </tr>

                        <!-- Cita 2 -->
                        <tr class="hover:bg-gray-600 transition-colors">
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-white">09:30 AM</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-green-500 rounded-full flex items-center justify-center text-white font-medium text-sm mr-3">MP</div>
                                    <div class="text-sm text-white">María Pérez</div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-white">Dra. Martínez</div>
                                <div class="text-xs text-gray-400">Pediatra</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-white">C-5</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500/20 text-yellow-400">
                                    <i class="fas fa-exclamation-circle mr-1"></i> Pendiente
                                </span>
                            </td>
                        </tr>

                        <!-- Cita 3 -->
                        <tr class="hover:bg-gray-600 transition-colors">
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-white">10:15 AM</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-purple-500 rounded-full flex items-center justify-center text-white font-medium text-sm mr-3">AG</div>
                                    <div class="text-sm text-white">Ana Gómez</div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-white">Dr. López</div>
                                <div class="text-xs text-gray-400">Dermatólogo</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-white">C-2</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500/20 text-blue-400">
                                    <i class="fas fa-clock mr-1"></i> Programada
                                </span>
                            </td>
                        </tr>

                        <!-- Cita 4 -->
                        <tr class="hover:bg-gray-600 transition-colors">
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-white">11:00 AM</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-red-500 rounded-full flex items-center justify-center text-white font-medium text-sm mr-3">CR</div>
                                    <div class="text-sm text-white">Carlos Rojas</div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-white">Dr. Fernández</div>
                                <div class="text-xs text-gray-400">Traumatólogo</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-white">C-1</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500/20 text-red-400">
                                    <i class="fas fa-times-circle mr-1"></i> Cancelada
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <div class="text-sm text-gray-400">Mostrando 4 de 47 citas para hoy</div>
                    <button class="text-blue-400 hover:text-blue-300 text-sm flex items-center">
                        Ver todas <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>
            </div>

            <!-- Panel de Control Rápido -->
            <div class="space-y-4">
                <!-- Acciones Administrativas -->
                <div class="bg-gray-700 rounded-xl p-4 shadow-lg border border-gray-600">
                    <h2 class="text-xl font-bold text-white mb-4">Acciones Administrativas</h2>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="#" class="bg-blue-600/30 hover:bg-blue-500/40 p-3 rounded-lg transition-all border border-blue-500/30 flex items-center">
                            <i class="fas fa-user-plus text-xl text-blue-400 mr-3"></i>
                            <span class="text-sm text-white">Registrar Médico</span>
                        </a>
                        <a href="#" class="bg-green-600/30 hover:bg-green-500/40 p-3 rounded-lg transition-all border border-green-500/30 flex items-center">
                            <i class="fas fa-calendar-plus text-xl text-green-400 mr-3"></i>
                            <span class="text-sm text-white">Programar Horarios</span>
                        </a>
                        <a href="#" class="bg-purple-600/30 hover:bg-purple-500/40 p-3 rounded-lg transition-all border border-purple-500/30 flex items-center">
                            <i class="fas fa-procedures text-xl text-purple-400 mr-3"></i>
                            <span class="text-sm text-white">Gestionar Consultorios</span>
                        </a>
                        <a href="#" class="bg-yellow-600/30 hover:bg-yellow-500/40 p-3 rounded-lg transition-all border border-yellow-500/30 flex items-center">
                            <i class="fas fa-file-alt text-xl text-yellow-400 mr-3"></i>
                            <span class="text-sm text-white">Generar Reportes</span>
                        </a>
                    </div>
                </div>

                <!-- Calendario y Notificaciones -->
                <div class="bg-gray-700 rounded-xl p-4 shadow-lg border border-gray-600">
                    <h2 class="text-xl font-bold text-white mb-4">Calendario</h2>
                    <div class="bg-gray-600 rounded-lg p-3 mb-3">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-white font-medium">Junio 2023</span>
                            <div class="flex space-x-2">
                                <button class="p-1 text-gray-400 hover:text-white"><i class="fas fa-chevron-left"></i></button>
                                <button class="p-1 text-gray-400 hover:text-white"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="grid grid-cols-7 gap-1 text-center text-xs text-gray-400 mb-1">
                            <div>L</div><div>M</div><div>M</div><div>J</div><div>V</div><div>S</div><div>D</div>
                        </div>
                        <div class="grid grid-cols-7 gap-1 text-center text-sm text-white">
                            <div class="py-1 opacity-30">29</div><div class="py-1 opacity-30">30</div><div class="py-1 opacity-30">31</div>
                            <div class="py-1">1</div><div class="py-1">2</div><div class="py-1">3</div><div class="py-1">4</div>
                            <div class="py-1">5</div><div class="py-1 bg-blue-600 rounded-full">6</div><div class="py-1">7</div>
                            <div class="py-1">8</div><div class="py-1">9</div><div class="py-1">10</div><div class="py-1">11</div>
                            <div class="py-1">12</div><div class="py-1 bg-blue-600 rounded-full">13</div><div class="py-1">14</div>
                            <div class="py-1">15</div><div class="py-1">16</div><div class="py-1">17</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between p-2 bg-gray-600 rounded-lg">
                            <div class="flex items-center">
                                <div class="h-2 w-2 bg-blue-400 rounded-full mr-2"></div>
                                <span class="text-xs text-gray-300">Reunión médica</span>
                            </div>
                            <span class="text-xs text-gray-400">Jun 6, 10:00 AM</span>
                        </div>
                        <div class="flex items-center justify-between p-2 bg-gray-600 rounded-lg">
                            <div class="flex items-center">
                                <div class="h-2 w-2 bg-green-400 rounded-full mr-2"></div>
                                <span class="text-xs text-gray-300">Mantenimiento consultorios</span>
                            </div>
                            <span class="text-xs text-gray-400">Jun 13, Todo el día</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Inferior -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <!-- Médicos con más disponibilidad -->
            <div class="bg-gray-700 rounded-xl p-4 shadow-lg border border-gray-600">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-white">Médicos con más disponibilidad</h2>
                    <a href="#" class="text-xs text-blue-400 hover:text-blue-300">Ver todo el personal</a>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center p-2 bg-gray-600 rounded-lg">
                        <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold text-sm mr-3">DG</div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-white">Dra. González</h3>
                            <p class="text-xs text-gray-300">Ginecóloga - 22 horarios disponibles</p>
                        </div>
                        <div class="text-sm text-green-400">+15%</div>
                    </div>
                    <div class="flex items-center p-2 bg-gray-600 rounded-lg">
                        <div class="h-10 w-10 rounded-full bg-green-500 flex items-center justify-center text-white font-bold text-sm mr-3">DP</div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-white">Dr. Pérez</h3>
                            <p class="text-xs text-gray-300">Neurólogo - 18 horarios disponibles</p>
                        </div>
                        <div class="text-sm text-green-400">+8%</div>
                    </div>
                    <div class="flex items-center p-2 bg-gray-600 rounded-lg">
                        <div class="h-10 w-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold text-sm mr-3">DS</div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-white">Dr. Sánchez</h3>
                            <p class="text-xs text-gray-300">Oftalmólogo - 16 horarios disponibles</p>
                        </div>
                        <div class="text-sm text-yellow-400">+3%</div>
                    </div>
                </div>
            </div>

            <!-- Próximas actividades administrativas -->
            <div class="bg-gray-700 rounded-xl p-4 shadow-lg border border-gray-600">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-white">Actividades Programadas</h2>
                    <a href="#" class="text-xs text-blue-400 hover:text-blue-300">Ver calendario completo</a>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-2 bg-gray-600 rounded-lg">
                        <div class="flex items-center">
                            <div class="bg-blue-500/20 p-2 rounded-lg mr-3">
                                <i class="fas fa-users text-blue-400"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-white">Reunión de personal</h3>
                                <p class="text-xs text-gray-300">Todos los médicos</p>
                            </div>
                        </div>
                        <div class="text-xs text-white">Viernes, 10:00 AM</div>
                    </div>
                    <div class="flex items-center justify-between p-2 bg-gray-600 rounded-lg">
                        <div class="flex items-center">
                            <div class="bg-green-500/20 p-2 rounded-lg mr-3">
                                <i class="fas fa-tools text-green-400"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-white">Mantenimiento preventivo</h3>
                                <p class="text-xs text-gray-300">Consultorios 3 y 4</p>
                            </div>
                        </div>
                        <div class="text-xs text-white">15 Jun, Todo el día</div>
                    </div>
                    <div class="flex items-center justify-between p-2 bg-gray-600 rounded-lg">
                        <div class="flex items-center">
                            <div class="bg-purple-500/20 p-2 rounded-lg mr-3">
                                <i class="fas fa-chalkboard-teacher text-purple-400"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-white">Capacitación nuevo sistema</h3>
                                <p class="text-xs text-gray-300">Equipo administrativo</p>
                            </div>
                        </div>
                        <div class="text-xs text-white">20 Jun, 2:00 PM</div>
                    </div>
                </div>
            </div>
        </div>

@endsection
