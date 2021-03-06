<?php

namespace shonflower\Http\Controllers;

use Illuminate\Http\Request;


use Session;
use Redirect;
use Auth;
use Carbon;
use shonflower\productos;
use shonflower\categoria;
use shonflower\direccion_usuario;


use shonflower\Http\Requests;
use shonflower\Http\Controllers\Controller;

class dirController extends Controller
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
        $token  = $request['token'];
        $item   = direccion_usuario::create( $request->all() );
        $response = array();
        $response['data']   = direccion_usuario::select('*')->where([ ['token', '=', $token],['id_usuario','=',$request['id_usuario']] ])->whereNull('deleted_at')->orderBy('distrito', 'asc')->get();
        $response['cant']   = count( $response['data'] );
        return $response;
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
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $data = direccion_usuario::where(['id' => $id])->delete();
        #Personal Log
        #
        return $data;
    }
}
