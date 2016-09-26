<?php

namespace shonflower\Http\Controllers;

use Illuminate\Http\Request;

use shonflower\Http\Requests;
use shonflower\Http\Controllers\Controller;


use Session;
use Redirect;
use Auth;
use Carbon;
use shonflower\productos;
use shonflower\categoria;
use shonflower\precio_combo;
use shonflower\tipo_menu;


use shonflower\Http\Requests\precioCboaddRequest;
use shonflower\Http\Requests\precioCboupdateRequest;

class precioComboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProd = array();
        $dataProd = precio_combo::paginate(10);
        return view('precio_combo.homePrecioCombo',compact('dataProd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['tipo_menu']   = tipo_menu::orderBy('nombre')->lists('nombre','id');
        #
        return view('precio_combo.addprecioCbo',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(precioCboaddRequest $request)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $categ = precio_combo::create( $request->all() );

        return redirect::to('/precio_combo')->with('message','Combo creado correctamente');
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
        $data = array();
        $precio_combo           = precio_combo::find($id);
        $data['tipo_menu']      = tipo_menu::orderBy('nombre')->lists('nombre','id');
        $data['precio_combo']   = $precio_combo;
        return view('precio_combo.editPrecioCbo',[ "data" => $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(precioCboupdateRequest $request, $id)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $producto = precio_combo::find( $id );
        $producto->fill( $request->all() );
        $producto->save();
        #Personal Log
        #
        return redirect::to('/precio_combo')->with('message','Combo editado correctamente');
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
        $data = precio_combo::where(['id' => $id])->delete();
        #Personal Log
        #
        return $data;
    }
}
