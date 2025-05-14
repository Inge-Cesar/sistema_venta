<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('admin.marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255|unique:marcas,nombre',
            'descripcion' => 'nullable',
            'logo' => 'nullable',
        ]);

        $marca = new Marca();
        $marca->nombre = $request->nombre;
        $marca->descripcion = $request->descripcion;
        $marca->logo = $request->file('logo')->store('marcas', 'public');
        $marca->save();

        return redirect()->route('admin.marcas.index')
            ->with('mensaje', 'Marca creada con éxito')
            ->with('icono', 'success');
    }


    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $marca = Marca::findOrFail($id);
        return view('admin.marcas.show', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $marca = Marca::findOrFail($id);
        return view('admin.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:marcas,nombre,' . $id,
            'descripcion' => 'nullable|string',
            'logo' => 'nullable',
        ]);

        $marca = Marca::findOrFail($id);
        $marca->nombre = $request->nombre;
        $marca->descripcion = $request->descripcion;

        if ($request->hasFile('logo')) {
            Storage::delete('public/' . $marca->logo);
            $marca->logo = $request->file('logo')->store('marcas', 'public');
        }

        $marca->save();

        return redirect()->route('admin.marcas.index')
            ->with('mensaje', 'Marca actualizada con éxito')
            ->with('icono', 'success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $marca = Marca::findOrFail($id);
        Storage::delete('public/' . $marca->logo);
        $marca->destroy($id);

        return redirect()->route('admin.marcas.index')
            ->with('mensaje', 'Marca eliminada con éxito')
            ->with('icono', 'success');
    }
}
