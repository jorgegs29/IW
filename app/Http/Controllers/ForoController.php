<?php

namespace App\Http\Controllers;
use View;
use DB;

use Illuminate\Http\Request;

class ForoController extends Controller
{
    public function index() {
        $idJuego = 1;
        return View::make('foro/foro')->with('idJuego', $idJuego);
    }

    public function show($id) {
        //$posts = DB::table('posts')->select('*')->where('idJuego', $id)->paginate(10);
        $posts = DB::table('posts')->select('*')->where('idJuego', $id)->get();

        $numMensajes = array();
        foreach($posts as $post) {
            $aux = DB::table('mensajes')->where('idPost', $post->id)->count();
            array_push($numMensajes, $aux);
        }
        
        return View::make('foro/post')->with(compact('posts', 'numMensajes'));
        //return View::make('foro/post')->with('posts', $posts);
    }
}
