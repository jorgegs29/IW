<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Redirect;
use App\Mensaje;

class MensajeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                    'contenido'       => 'required'
                );
        
                $validator = Validator::make(Input::all(), $rules);
        
                // process the login
                if ($validator->fails()) {
                    return Redirect::back()
                        ->withErrors($validator)
                        ->withInput(Input::except('password'));
                } else {
                    // store
                    $mensaje = new Mensaje;
                    $mensaje->contenido    = Input::get('contenido');
                    $mensaje->idPost     = $request->input('idPost');
                    $mensaje->idUsuario = Auth::id();
                    $mensaje->save();
        
                    // redirect
                    Session::flash('message', 'Tu mensaje ha sido publicado con exito !!');
                    return Redirect::back();
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
        $mensaje = Mensaje::find($id);
        return View::make('foro/editMensaje')->with('mensaje', $mensaje);
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
            'contenido'       => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $mensaje = Mensaje::find($id);
            $mensaje->contenido = Input::get('contenido');
            $mensaje->save();

            // redirect
            Session::flash('message', 'Tu mensaje ha sido modificado con exito !!');
            return Redirect::to('perfil/mensajes');
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
        $mensaje = Mensaje::find($id);
        $mensaje->delete();

        // redirect
        Session::flash('message', 'Tu mensaje ha sido eliminado.');
        return Redirect::back();
    }
}
