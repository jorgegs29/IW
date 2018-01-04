<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use App\Juego;

class ForoController extends Controller
{
    public function index() {
        $juegos = Juego::orderBy('id', 'DESC')->paginate(15);
        $numPosts = array();
        foreach($juegos as $juego) {
            $aux = DB::table('posts')->where('idJuego', $juego->id)->count();
            array_push($numPosts, $aux);
        }
        return View::make('foro/foro')->with(compact('juegos', 'numPosts'));
    }

    public function show($id) {
        $posts = DB::table('posts')->select('*')->where('idJuego', $id)->orderBy('id', 'DESC')->paginate(10);
        $juego = Juego::find($id);
        $numMensajes = array();
        foreach($posts as $post) {
            $aux = DB::table('mensajes')->where('idPost', $post->id)->count();
            array_push($numMensajes, $aux);
        }

        return View::make('foro/post')->with(compact('posts', 'numMensajes', 'juego'));
    }
}
