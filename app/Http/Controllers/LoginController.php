<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function verificar_Login(Request $request)
    {
        // Obtenemos los usuarios desde el endpoint
        $verificar_Login = Http::get('http://localhost:3000/get_usuarios');
        $usuarios = json_decode($verificar_Login, true);

        // Guardamos los usuarios en la sesión
        session()->put('tbl_usuario', $usuarios);

        // Recibimos los datos del formulario
        $email = $request->input('correo');
        $contrasena = $request->input('contra');

        // Variable para verificar si se encontró el usuario
        $verificar = false;
        $usuarioAutenticado = null;

        // Validamos los datos del usuario
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] == $email && $usuario['contrasena'] == $contrasena) {
                // Verificamos si el estado del usuario es activo
                if ($usuario['estado'] === 'ACTIVO') {
                    $verificar = true;
                    $usuarioAutenticado = $usuario;
                    break; // Salimos del bucle si encontramos al usuario activo
                } else {
                    // Si la cuenta está inactiva, mostramos un mensaje específico
                    return view('layouts.Login')->with('mensaje', 'Su cuenta está inactiva, comuníquese con el administrador');
                }
            }
        }

        // Redirigimos a la vista 'inicio' si el usuario fue verificado
        if ($verificar) {
            // Aquí puedes guardar el usuario autenticado en la sesión
            session()->put('usuario_autenticado', $usuarioAutenticado);

            // Redirigimos a la vista 'inicio'
            return redirect('inicio');
        } else {
            // Mostramos un mensaje de error en la vista de Login
            return view('layouts.Login')->with('mensaje', 'Acceso incorrecto, intente nuevamente');
        }
    }
}
