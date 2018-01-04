<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Redirect;

class NoticiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::orderBy('id', 'DESC')->paginate(10);
        return View('noticias/noticias', ['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
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
        $rules = array(
            'titulo'       => 'required',
            'descripcion'      => 'required',
            'juego' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('noticias/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $noticia = new Noticia;
            $noticia->titulo    = Input::get('titulo');
            $noticia->descripcion   = Input::get('descripcion');
            $noticia->juego     = Input::get('juego');
            $noticia->idUsuario = Auth::id();
            $noticia->save();

            // redirect
            Session::flash('message', 'Tu noticia ha sido publicada con exito !!');
            return Redirect::to('noticias');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);
        return View::make('noticias/edit')->with('noticia', $noticia);
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
            'titulo' => 'required',
            'descripcion' => 'required',
            'juego' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $noticia = Noticia::find($id);
            $noticia->titulo = Input::get('titulo');
            $noticia->descripcion = Input::get('descripcion');
            $noticia->juego = Input::get('juego');
            $noticia->idUsuario = Auth::id();
            $noticia->save();

            // redirect
            Session::flash('message', 'Tu noticia ha sido modificada con exito !!');
            return Redirect::to('perfil/noticias');
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
        $noticia = Noticia::find($id);
        $noticia->delete();

        // redirect
        Session::flash('message', 'Tu noticia ha sido eliminada.');
        return Redirect::to('perfil/noticias');
    }
}
