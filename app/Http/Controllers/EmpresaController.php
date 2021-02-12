<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$empresas = Empresa::all();
        $empresas = Empresa::paginate(10);
        return view('empresas.lista', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'sitioweb' => 'required'
        ]);

        
        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $empresa->correo = $request->correo;
        $empresa->sitioweb = $request->sitioweb;
        $empresa->save();

        return back()->with('mensaje', 'Empresa Agregada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresas.detalle', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresas.editar', compact('empresa'));
    }

    // public function detalle($id)
    // {
    //     $empresa = Empresa::findOrFail($id);
    //     return view('empresas.detalle', compact('empresa'));
    // }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'sitioweb' => 'required'
        ]);
        
        $empresaActualizada = Empresa::find($id);
        $empresaActualizada->nombre = $request->nombre;
        $empresaActualizada->correo = $request->correo;
        $empresaActualizada->sitioweb = $request->sitioweb;
        $empresaActualizada->save();
        return back()->with('mensaje', 'Empresa editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresaEliminar = Empresa::findOrFail($id);
        $empresaEliminar->delete();

        return back()->with('mensaje', 'Empresa Eliminada');
    }
}
