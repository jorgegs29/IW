<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;
use DB;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        //Aqui es donde tendriamos que diferenciar a la hora
        //entre los distintos tipos de usuarios.
        $user = Auth::user();
        return View('perfil/perfil', ['user' => $user]);
    }

    public function noticias() {
        $noticias = DB::table('noticias')
        ->select('*')
        ->where('idUsuario', Auth::id())
        ->get(); 

        return View('perfil/noticiasUsuario', ['noticias' => $noticias]);
    }

    public function mensajes() {
        $mensajes = DB::table('mensajes')
        ->select('*')
        ->where('idUsuario', Auth::id())
        ->get();

        return View('perfil/mensajesUsuario', ['mensajes' => $mensajes]);
    }
}
