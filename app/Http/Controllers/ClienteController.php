<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Client::all();
        return view('sistema.listCliente',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function __construct(){
        /* middleware genera unas instancias de acción antes o después de invocar a mi ruta para este caso se va a solicitar lo siguiente
           de acuerdo a la directiva can se da el permiso al administrador Crear Cliente y con eso solo el administrador pueda crear un cliente
        */
        $this->middleware('can: Crear Cliente')->only('create');
        $this->middleware('can: Eliminar Cliente')->only('destroy');
    } 

    public function create()
    {
        return view('sistema.addCliente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        /* validación de los campos de texto y númericos del formulario de registro */
        $validation = $request->validate([
            'cedula' => 'required|numeric||unique:clients,cedula|min:10',
            'apellido' => 'required|string|max:75',
            'nombre' => 'required|string|max:75',
            'email' => 'required|email|unique:clients,email|max:80',
            'telefono' => 'required|numeric|min:20',
        ]);

        $cliente = new Client();
        $cliente->cedula = $request->input('cedula');
        $cliente->apellido = $request->input('apellido');
        $cliente->nombre = $request->input('nombre');
        $cliente->email = $request->input('email');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->estado = $request->input('estado');

        $cliente->save();
        return back()->with('message','ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $cliente = Client::find($id);
        return view('sistema.editCliente',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Client::find($id);
        $cliente->cedula = $request->input('cedula');
        $cliente->apellido = $request->input('apellido');
        $cliente->nombre = $request->input('nombre');
        $cliente->email = $request->input('email');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->estado = $request->input('estado');

        $cliente->update();
        /*back() -> permite retornar a la misma vista*/
        return back()->with('message','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $cliente = Client::find($id);
        $cliente->delete();
        return back();
    }
}
