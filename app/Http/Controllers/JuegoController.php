<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Juego;
use App\Categoria;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Redirect;

class JuegoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juegos = Juego::paginate(10);
        $categorias = array();
        foreach($juegos as $juego) {
            $categoria = Categoria::find($juego->idCategoria);
            array_push($categorias, $categoria);
        }
        return View::make('juegos/juegos')->with(compact('juegos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return View::make('juegos/create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'titulo'       => 'required',
            'descripcion'      => 'required',
            'precio' => 'required',
            'imagen' => 'required',
            'idCategoria' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $juego = new Juego;
            $juego->titulo = Input::get('titulo');
            $juego->descripcion = Input::get('descripcion');
            $juego->precio = Input::get('precio');
            $juego->imagen = Input::get('imagen');
            $juego->idCategoria = Input::get('idCategoria');
            $juego->idUsuario = Auth::id();
            $juego->save();

            // redirect
            Session::flash('message', 'Tu juego ha sido publicado con exito !!');
            return Redirect::to('juegos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $juego = Juego::find($id);
        $categoria = Categoria::find($juego->idCategoria);
        $usuario = User::find($juego->idUsuario); 
        return View::make('juegos/show')->with(compact ('juego', 'categoria', 'usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $juego = Juego::find($id);
        $categorias = Categoria::all();
        return View::make('juegos/edit')->with(compact('juego', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'titulo'       => 'required',
            'descripcion'      => 'required',
            'precio' => 'required',
            'imagen' => 'required',
            'idCategoria' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $juego = Juego::find($id);
            $juego->titulo = Input::get('titulo');
            $juego->descripcion = Input::get('descripcion');
            $juego->precio = Input::get('precio');
            $juego->imagen = Input::get('imagen');
            $juego->idCategoria = Input::get('idCategoria');
            $juego->save();

            // redirect
            Session::flash('message', 'Tu juego ha sido modificado con exito !!');
            return Redirect::to('perfil/juegos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $juego = Juego::find($id);
        $juego->delete();

        // redirect
        Session::flash('message', 'Tu juego ha sido eliminado.');
        return Redirect::back();
    }
}
