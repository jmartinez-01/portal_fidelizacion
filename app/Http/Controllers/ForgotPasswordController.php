<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        //$response = 'Usuarios';

        return view('modulo_usuarios.ForgotPassword');  // Asegúrate de tener una vista llamada 'crear_usuario.blade.php'
       
        // return view('modulo_usuarios.ForgotPassword')->with('Mantenimiento', json_decode($response,true));
    }

    public function store(Request $request)
    {
        
    }
}