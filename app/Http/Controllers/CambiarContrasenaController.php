<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class CambiarContrasenaController extends Controller
{
    public function index()
    {
        //$response = 'Usuarios';

        return view('modulo_usuarios.CambiarContrasena');  // Asegúrate de tener una vista llamada 'crear_usuario.blade.php'
       
        // return view('modulo_usuarios.CambiarContrasena')->with('Mantenimiento', json_decode($response,true));
    }

    public function store(Request $request)
    {
        
    }
}