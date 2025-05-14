<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index()
    {
        $unidades = Unidad::all();
        return view('admin.unidades.index', compact('unidades'));
    }

    public function create()
    {
        return view('admin.unidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:unidads',
            'descripcion' => 'nullable|string|max:255',
            'abreviatura' => 'nullable|string|max:10',
        ]);

        $unidad = new Unidad();
        $unidad->nombre = $request->nombre;
        $unidad->descripcion = $request->descripcion;
        $unidad->abreviatura = $request->abreviatura;
        $unidad->save();

        return redirect()->route('admin.unidades.index')
            ->with('mensaje', 'Unidad creada correctamente')
            ->with('icono', 'success');
    }

    public function edit($id)
    {
        $unidad = Unidad::findOrFail($id);
        return view('admin.unidades.edit', compact('unidad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:unidads,nombre,' . $id,
            'descripcion' => 'nullable|string|max:255',
            'abreviatura' => 'nullable|string|max:10',
        ]);

        $unidad = Unidad::findOrFail($id);
        $unidad->nombre = $request->nombre;
        $unidad->descripcion = $request->descripcion;
        $unidad->abreviatura = $request->abreviatura;
        $unidad->save();

        return redirect()->route('admin.unidades.index')
            ->with('mensaje', 'Unidad actualizada correctamente')
            ->with('icono', 'success');
    }

    public function destroy($id)
    {
        $unidad = Unidad::findOrFail($id);
        $unidad->delete();

        return redirect()->route('admin.unidades.index')
            ->with('mensaje', 'Unidad eliminada correctamente')
            ->with('icono', 'success');
    }
}
