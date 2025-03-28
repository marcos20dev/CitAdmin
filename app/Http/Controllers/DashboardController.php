<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener estadísticas principales
        $stats = [
            'noticiasCount' => Noticias::count(),
            'doctoresCount' => Doctor::count(),
            'horariosCount' => Horario::where('fecha', '>=', now()->format('Y-m-d'))->count(),

            // Últimas 5 noticias
            'ultimasNoticias' => Noticias::latest()->take(5)->get(),

            // Próximos 5 horarios
            'proximosHorarios' => Horario::with('doctor')
                ->where('fecha', '>=', now()->format('Y-m-d'))
                ->orderBy('fecha')
                ->orderBy('hora')
                ->take(5)
                ->get(),

            // Top 5 doctores con más horarios
            'doctoresActivos' => Doctor::withCount(['horarios' => function($query) {
                $query->where('fecha', '>=', now()->format('Y-m-d'));
            }])
                ->orderByDesc('horarios_count')
                ->take(5)
                ->get()
        ];

        return view('admin.dashboard', $stats);
    }
}
