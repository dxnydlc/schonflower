<?php

namespace shonflower\Http\Controllers;

use Illuminate\Http\Request;

use shonflower\Http\Requests;
use shonflower\Http\Controllers\Controller;


use Session;
use Redirect;
use Auth;
use Carbon;

use shonflower\tipo_menu;


use shonflower\Http\Requests\addTipoMenuRequest;
use shonflower\Http\Requests\updateTipoMenuRequest;


class tipoMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        #para marcar el menu
        Session::set('current_menu','mantenimiento');
        Session::set('current_menu_opt','tipo_menu');
    }

    public function index()
    {
        $dataTipoMenu = array();
        $dataTipoMenu = tipo_menu::paginate(5);
        return view('tipo_menu.homeTipoMenu',compact('dataTipoMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_menu.addTipoMenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addTipoMenuRequest $request)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        $data       = array();
        #
        $data = tipo_menu::create( $request->all() );

        return redirect::to('/tipo_menu')->with('message','Tipo de Menú creado correctamente');
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
        $data = tipo_menu::find($id);
        return view('tipo_menu.editTipoMenu',["data" => $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateTipoMenuRequest $request, $id)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $modelo = tipo_menu::find( $id );
        $modelo->fill( $request->all() );
        $modelo->save();
        #Personal Log
        #
        return redirect::to('/tipo_menu')->with('message','Tipo Menú editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $data = tipo_menu::where(['id' => $id])->delete();
        #Personal Log
        #
        return $data;
    }
}
