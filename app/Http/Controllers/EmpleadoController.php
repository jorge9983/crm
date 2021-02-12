<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Empresa;

class EmpleadoController extends Controller
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
        //$empleados = Empleado::all();
        $empleados = Empleado::paginate(10);
        return view('empleados.lista', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        return view('empleados.crear', compact('empresas'));
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
            'apellido' => 'required',
            'correo' => 'required',
            'telefono' => 'required'
        ]);

        //return $request;
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->correo = $request->correo;
        $empleado->telefono = $request->telefono;
        $empleado->empresa_id = $request->empresa_id;
        $empleado->save();

        return back()->with('mensaje', 'Empleado Agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        //$idEmpresa =$empleado->empresa_id;
        $empresa = Empresa::findOrFail($empleado->empresa_id);
        if ($empresa != null)
            return view('empleados.detalle', compact('empleado', 'empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empresas = Empresa::all();
        return view('empleados.editar', compact('empleado', 'empresas'));
    }

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
            'apellido' => 'required',
            'correo' => 'required',
            'telefono' => 'required'
        ]);

        $empleadoActualizado = Empleado::find($id);
        $empleadoActualizado->nombre = $request->nombre;
        $empleadoActualizado->apellido = $request->apellido;
        $empleadoActualizado->correo = $request->correo;
        $empleadoActualizado->telefono = $request->telefono;
        $empleadoActualizado->empresa_id = $request->empresa_id;
        $empleadoActualizado->save();
        return back()->with('mensaje', 'Empleado editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleadoEliminar = Empleado::findOrFail($id);
        $empleadoEliminar->delete();

        return back()->with('mensaje', 'Empleado Eliminado');
    }
}
