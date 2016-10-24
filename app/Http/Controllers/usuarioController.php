<?php

namespace shonflower\Http\Controllers;

use Illuminate\Http\Request;

use shonflower\Http\Requests;
use shonflower\Http\Controllers\Controller;


use Session;
use Redirect;
use Auth;
use DB;
use Carbon;
use shonflower\productos;
use shonflower\categoria;
use shonflower\User;
use shonflower\ubigeo_lima;
use shonflower\direccion_usuario;

use shonflower\Http\Requests\usuarioAddRequest;
use shonflower\Http\Requests\usuarioUpdateRequest;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProd = array();
        $dataProd = User::paginate(10);
        return view('usuario.homeUsuario',compact('dataProd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['dirs'] = array();
        $data['usuario'] = array();
        $data['ubigeo'] = ubigeo_lima::orderBy('distrito')->lists('distrito','ubigeo');
        $mytime = Carbon\Carbon::now('America/Lima');
        $mytime->toDateString();
        $token = \Hash::make( $mytime->toDateTimeString() );
        $data['token'] = $token;
        #$data['categoria']   = categoria::orderBy('nombre')->lists('nombre','id');
        #
        return view('usuario.addUsuario',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(usuarioAddRequest $request)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $data = User::create( $request->all() );

        #Ahora vamos a unir las direcciones con el id del usuario
        $token      = $data->token;
        $id_usuario = $data->id;
        $nombre     = $data->name.' '.$data->apellidos;
        DB::table('direccion_usuario')
            ->where('token', $token)
            ->update([ 'id_usuario' => $id_usuario ,'usuario' => $nombre ]);

        return redirect::to('/usuario')->with('message','Usuario creado correctamente');
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
        $data           = array();
        $usuario        = User::find($id);
        $data['ubigeo'] = ubigeo_lima::orderBy('distrito')->lists('distrito','ubigeo');
        $data['dirs']   = direccion_usuario::where('id_usuario','=',$usuario->id)->orderBy('distrito')->get();
        $data['usuario']= $usuario;
        return view('usuario.editUsuario',[ "data" => $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(usuarioUpdateRequest $request, $id)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $data = User::find( $id );
        $data->fill( $request->all() );
        $data->save();
        #Personal Log
        #
        return redirect::to('/usuario')->with('message','Usuario editado correctamente');
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
        $data = User::where(['id' => $id])->delete();
        #Personal Log
        #
        return $data;
    }

    public function buscar_user( $q )
    {
        $data           = array();
        $data['data']   = User::where('name', 'like', '%'.$q.'%')->orWhere('apellidos', 'like','%'.$q.'%')->get();
        $data['cant']   = count( $data['data'] );
        return $data;
    }

    public function dirs_user( $id_user )
    {
        $data           = array();
        $data['data']   = direccion_usuario::where('id_usuario', '=', $id_user)->get();
        $data['actual'] = direccion_usuario::where([['actual', '=', '1'],['id_usuario', '=', $id_user]])->whereNull('deleted_at')->get();
        $data['cant']   = count( $data['data'] );
        return $data;
    }


    public function set_dirs_user( $id , $id_user )
    {
        $data = direccion_usuario::find( $id );
        #cambiar estado de todos los demas
        DB::table('direccion_usuario')
        ->where('id_usuario', $id_user)
        ->update(['actual' => 0]);
        $data->actual = 1;
        $data->save();
        $data = direccion_usuario::find( $id );
        #return $data;
    }

}
