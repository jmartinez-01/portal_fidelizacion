<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class GenerarPacientesController extends Controller
{
    public function index()
    {
        //$response = 'Usuarios';

        return view('layouts.GenerarPacientes');  // Asegúrate de tener una vista llamada 'crear_usuario.blade.php'
       
        // return view('modulo_usuarios.Usuarios')->with('Usuarios', json_decode($response,true));
    }

    public function store(Request $request)
    {
        
    }
}