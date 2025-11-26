<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;

class EventosController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('fecha_inicio', 'desc')->paginate(10);
        return view('admin.eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('admin.eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:150',
            'descripcion' => 'required|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'lugar' => 'required|max:150'
        ]);

        Evento::create($request->all());

        return redirect()->route('admin.eventos.index')->with('success', 'Evento creado exitosamente');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('admin.eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);

        $request->validate([
            'titulo' => 'required|max:150',
            'descripcion' => 'required|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'lugar' => 'required|max:150'
        ]);

        $evento->update($request->all());

        return redirect()->route('admin.eventos.index')->with('success', 'Evento actualizado exitosamente');
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('admin.eventos.index')->with('success', 'Evento eliminado exitosamente');
    }
}
