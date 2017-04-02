<?php

namespace shonflower\Http\Controllers;

use Illuminate\Http\Request;

use shonflower\Http\Requests;
use shonflower\Http\Controllers\Controller;


use Session;
use Redirect;
use Auth;
use Carbon;
use DB;

use shonflower\menu;
use shonflower\productos;
use shonflower\tipo_menu;
use shonflower\categoria;
use shonflower\empresa;

use shonflower\menu_hoy;
use shonflower\detalle_menu;
use shonflower\precio_combo;


class ordenManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #para marcar el menu
        Session::set('current_menu','pedido');
        Session::set('current_menu_opt','manual');

        $dataMenu = array();
        return view('orden.homeOrden',compact('dataMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mytime = Carbon\Carbon::now('America/Lima');
        $mytime->toDateString();
        $token = \Hash::make( $mytime->toDateTimeString() );
        #
        $data = array();
        $data['empresa']    = empresa::orderBy('nombre')->lists('nombre','id');
        $data['fecha']      = $mytime->format('d/m/Y');
        $data['token']      = $token;
        #
        $fecha              = $mytime->toDateString();
        # Menu hoy
        $data_menu          = menu_hoy::select('*')->where('fecha', '=', $fecha )->whereNull('deleted_at')->get();
        $data['menu']       = $data_menu;
        $id_menu            = $data_menu[0]->id;
        #Platos del menu de hoy
        $data_platos        = detalle_menu::select('*')->where('id_menu', '=', $id_menu )->whereNull('deleted_at')->orderBy('categoria', 'asc')->get();
        $data['platos']     = $data_platos;
        #
        #return $data;
        return view('orden.addOrden',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function get_menu_hoy()
    {
        #$mytime = Carbon\Carbon::now('America/Lima');
        $mytime = Carbon\Carbon::now();
        $fecha = $mytime->toDateString();
        #
        $data_menu = menu_hoy::select('*')->where('fecha', '=', $fecha )->whereNull('deleted_at')->get();
        return $fecha;
    }


}
