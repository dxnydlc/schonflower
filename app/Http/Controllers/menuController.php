<?php

namespace shonflower\Http\Controllers;

use Illuminate\Http\Request;

use shonflower\Http\Requests;
use shonflower\Http\Controllers\Controller;


use Session;
use Redirect;
use Auth;
use Carbon;

use shonflower\menu;
use shonflower\productos;
use shonflower\tipo_menu;
use shonflower\categoria;

use shonflower\Http\Requests\addTipoMenuRequest;
use shonflower\Http\Requests\updateTipoMenuRequest;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataMenu = array();
        $dataMenu = menu::paginate(10);
        return view('menu.homeMenu',compact('dataMenu'));
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
        #
        $data = array();
        $data['productos']   = [''=>''];#productos::orderBy('nombre')->lists('nombre','id');
        $data['tipo_menu']   = tipo_menu::orderBy('nombre')->lists('nombre','id');
        $data['categoria']   = categoria::orderBy('nombre')->lists('nombre','id');
        $data['fecha']       = $mytime->format('d/m/Y');
        return view('menu.addMenu',compact('data'));
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
        #
        #return $request->all();
        $categ = menu::create( $request->all() );

        return redirect::to('/menu')->with('message','Menu creado correctamente');
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
}
