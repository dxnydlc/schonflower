<?php

namespace shonflower\Http\Controllers;

use Illuminate\Http\Request;

use shonflower\Http\Requests;
use shonflower\Http\Controllers\Controller;

use shonflower\Http\Requests\promoRequest;


use Session;
use Redirect;
use Auth;
use Carbon;
use DB;

use shonflower\tipo_menu;
use shonflower\promocion;
use shonflower\categoria;
use shonflower\promocion_detalle;

class promoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        $data = promocion::paginate(5);
        return view('promocion.homePromocion',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #
        $mytime = Carbon\Carbon::now('America/Lima');
        $mytime->toDateString();
        $token = \Hash::make( $mytime->toDateTimeString() );
        #
        $data = array();
        $data['categoria']  = categoria::orderBy('nombre')->lists('nombre','id');
        $data['fecha']      = $mytime->format('d/m/Y');
        $data['token']      = $token;
        return view('promocion.addPromocion',compact('data'));
        #
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(promoRequest $request)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        #return $request->all();
        #
        $token      = $request['token'];
        $promo      = promocion::create( $request->all() );
        $id_menu    = $promo->id;

        #Uniendo detalle con encabezado
        DB::table('promocion_detalles')
            ->where('token', $token)
            ->update(['id_promo' => $id_menu]);

        return redirect::to('/promo_combo')->with('message','Promoción creada correctamente');
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
