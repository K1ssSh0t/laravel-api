<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $cliente = new Cliente();
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->password = $request->password;
        $cliente->profile_picture = $request->profile_picture;
        $cliente->save();

        return $cliente;
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {

        return $cliente;
    }
    public function getCliente($email, $password)
    {

        $cliente = Cliente::where('email', $email)->where('password', $password)->first();
        if (!$cliente) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profile_picture' => 'required',

        ]);


        $cliente->name  = $request->name;
        $cliente->email = $request->email;
        $cliente->password = $request->password;
        $cliente->profile_picture = $request->profile_picture;
        $cliente->update();

        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (is_null($cliente)) {
            return response()->json('No se pudo realizar correctamente la operacion ', 404);
        }

        $cliente->delete();

        return response()->noContent();
    }
}
