<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Evento;
use App\Models\Proyecto;
use App\Models\Contacto;

class ClubController extends Controller
{
    public function index()
    {
        // Obtener datos de la base de datos
        $miembros = Usuario::with('rol')->get();
        $eventos = Evento::orderBy('fecha_inicio', 'asc')->take(3)->get();
        $proyectos = Proyecto::with('creador', 'equipo')->take(3)->get();

        // Pasar datos a la vista
        return view('welcome', compact('miembros', 'eventos', 'proyectos'));
    }

    public function guardarContacto(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'nombre' => 'required|max:100',
            'email' => 'required|email|max:100',
            'tecnologias' => 'nullable|max:150',
            'mensaje' => 'required|max:255'
        ]);

        // Guardar en la base de datos
        Contacto::create([
            'Nombre' => $request->nombre,
            'correo' => $request->email,
            'Asunto' => $request->tecnologias ?? 'Sin especificar',
            'Mensaje' => $request->mensaje,
            'us_id' => 1 // Por ahora usamos ID 1, luego lo conectamos con autenticación
        ]);

        return redirect()->back()->with('success', '¡Solicitud enviada correctamente!');
    }
}
