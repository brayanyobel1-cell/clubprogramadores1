<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Usuario;
use App\Models\Equipo;

class ProyectosController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::with('creador', 'equipo')->paginate(10);
        return view('admin.proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $equipos = Equipo::all();
        return view('admin.proyectos.create', compact('usuarios', 'equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'us_nombre' => 'required|max:150',
            'descripcion' => 'required|max:150',
            'repositorio_url' => 'required|url|max:255',
            'fecha_creacion' => 'required|date',
            'creador_id' => 'required|exists:usuario,us_id',
            'id_equipo' => 'required|exists:equipo,id_equipo'
        ]);

        Proyecto::create($request->all());

        return redirect()->route('admin.proyectos.index')->with('success', 'Proyecto creado exitosamente');
    }

    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $usuarios = Usuario::all();
        $equipos = Equipo::all();
        return view('admin.proyectos.edit', compact('proyecto', 'usuarios', 'equipos'));
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $request->validate([
            'us_nombre' => 'required|max:150',
            'descripcion' => 'required|max:150',
            'repositorio_url' => 'required|url|max:255',
            'fecha_creacion' => 'required|date',
            'creador_id' => 'required|exists:usuario,us_id',
            'id_equipo' => 'required|exists:equipo,id_equipo'
        ]);

        $proyecto->update($request->all());

        return redirect()->route('admin.proyectos.index')->with('success', 'Proyecto actualizado exitosamente');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('admin.proyectos.index')->with('success', 'Proyecto eliminado exitosamente');
    }
}
