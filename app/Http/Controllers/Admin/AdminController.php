<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Evento;
use App\Models\Proyecto;
use App\Models\Contacto;

class AdminController extends Controller
{
    public function index()
    {
        $totalMiembros = Usuario::count();
        $totalEventos = Evento::count();
        $totalProyectos = Proyecto::count();
        $totalContactos = Contacto::count();

        $ultimosContactos = Contacto::with('usuario')->latest()->take(5)->get();
        $proximosEventos = Evento::where('fecha_inicio', '>=', now())->orderBy('fecha_inicio')->take(3)->get();

        return view('admin.dashboard', compact(
            'totalMiembros',
            'totalEventos',
            'totalProyectos',
            'totalContactos',
            'ultimosContactos',
            'proximosEventos'
        ));
    }
}
