<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class MiembrosController extends Controller
{
    public function index()
    {
        $miembros = Usuario::with('rol')->paginate(10);
        return view('admin.miembros.index', compact('miembros'));
    }

    public function create()
    {
        $roles = Rol::all();
        return view('admin.miembros.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'us_nombre' => 'required|max:100',
            'us_apellido' => 'required|max:100',
            'us_email' => 'required|email|unique:usuario,us_email',
            'us_password' => 'required|min:8',
            'rol_id' => 'required|exists:rol,rol_id'
        ]);

        Usuario::create([
            'us_nombre' => $request->us_nombre,
            'us_apellido' => $request->us_apellido,
            'us_email' => $request->us_email,
            'us_password' => Hash::make($request->us_password),
            'fecha_registro' => now(),
            'rol_id' => $request->rol_id
        ]);

        return redirect()->route('admin.miembros.index')->with('success', 'Miembro creado exitosamente');
    }

    public function edit($id)
    {
        $miembro = Usuario::findOrFail($id);
        $roles = Rol::all();
        return view('admin.miembros.edit', compact('miembro', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $miembro = Usuario::findOrFail($id);

        $request->validate([
            'us_nombre' => 'required|max:100',
            'us_apellido' => 'required|max:100',
            'us_email' => 'required|email|unique:usuario,us_email,' . $id . ',us_id',
            'rol_id' => 'required|exists:rol,rol_id'
        ]);

        $miembro->update([
            'us_nombre' => $request->us_nombre,
            'us_apellido' => $request->us_apellido,
            'us_email' => $request->us_email,
            'rol_id' => $request->rol_id
        ]);

        return redirect()->route('admin.miembros.index')->with('success', 'Miembro actualizado exitosamente');
    }

    public function destroy($id)
    {
        $miembro = Usuario::findOrFail($id);
        $miembro->delete();

        return redirect()->route('admin.miembros.index')->with('success', 'Miembro eliminado exitosamente');
    }
}
