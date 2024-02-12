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
        $cliente = Client::all();
        return view('sistema.listarCliente',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
