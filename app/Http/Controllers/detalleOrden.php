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


use shonflower\detalle_orden;


class detalleOrden extends Controller
{
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
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        #return $request->all();
        #
        $token  = $request['token'];
        $item   = detalle_orden::create( $request->all() );
        $data   = array();
        $data['data']   = detalle_orden::select('*')->where('token', '=', $token)->whereNull('deleted_at')->orderBy('categoria', 'asc')->get();
        $data['cant']   = count( $data['data'] );
        #
        return $data;
        #
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
