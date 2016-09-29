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

use shonflower\menu_hoy;
use shonflower\detalle_menu;
use shonflower\precio_combo;

use shonflower\Http\Requests\addMenuRequest;
use shonflower\Http\Requests\updateMenuRequest;

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
        $dataMenu = menu_hoy::orderBy('id', 'desc')->paginate(10);
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
        $token = \Hash::make( $mytime->toDateTimeString() );
        #
        $data = array();
        $data['productos']      = [''=>''];#productos::orderBy('nombre')->lists('nombre','id');
        $data['tipo_menu']      = tipo_menu::orderBy('nombre')->lists('nombre','id');
        $data['categoria']      = categoria::orderBy('nombre')->lists('nombre','id');
        $data['precio_combo']   = precio_combo::orderBy('tipo_menu')->lists('tipo_menu','id');
        $data['json_pc']        = precio_combo::select('id','precio')->get();
        $data['fecha']          = $mytime->format('d/m/Y');
        $data['token']          = $token;
        return view('menu.addMenu',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addMenuRequest $request)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $token      = $request['token'];
        $menu       = menu_hoy::create( $request->all() );
        $id_menu    = $menu->id;

        #Uniendo detalle con encabezado
        DB::table('detalle_menus')
            ->where('token', $token)
            ->update(['id_menu' => $id_menu]);

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
        $data = array();
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $data['json_pc']        = precio_combo::select('id','precio')->get();
        $data['productos']      = [''=>''];#productos::orderBy('nombre')->lists('nombre','id');
        $data['tipo_menu']      = tipo_menu::orderBy('nombre')->lists('nombre','id');
        $data['categoria']      = categoria::orderBy('nombre')->lists('nombre','id');
        $data['precio_combo']   = precio_combo::orderBy('tipo_menu')->lists('tipo_menu','id');
        #
        $menu = menu_hoy::find($id);
        $data['detalle']    = detalle_menu::select('*')->where('id_menu', '=', $menu->id )->whereNull('deleted_at')->orderBy('categoria', 'asc')->get();
        $data['menu']       = $menu;
        $data['token']      = $menu->token;
        $data['fecha']      = $menu->fecha;
        #return $data;
        return view('menu.editMenu',["data" => $data ]);
        #
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateMenuRequest $request, $id)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $menu = menu_hoy::find( $id );
        $menu->fill( $request->all() );
        $menu->save();
        #Personal Log
        #
        return redirect::to('/menu')->with('message','Menú editado correctamente');
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
        $data = menu_hoy::where(['id' => $id])->delete();
        #Personal Log
        #
        return $data;
    }
}
