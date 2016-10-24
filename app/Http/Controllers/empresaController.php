<?php

namespace shonflower\Http\Controllers;

use Illuminate\Http\Request;

use shonflower\Http\Requests;
use shonflower\Http\Controllers\Controller;

use Session;
use Redirect;
use Auth;
use Carbon;

use shonflower\Http\Requests\empresaAddRequest;
use shonflower\Http\Requests\empresaUpdateRequest;

use shonflower\empresa;

class empresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataEmpresa = array();
        $dataEmpresa = empresa::paginate(5);
        return view('empresa.homeEmpresa',compact('dataEmpresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.addEmpresa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(empresaAddRequest $request)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $categ = empresa::create( $request->all() );

        return redirect::to('/empresa')->with('message','Empresa creada correctamente');
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
        $data = empresa::find($id);
        return view('empresa.editEmpresa',["data" => $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(empresaUpdateRequest $request, $id)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $empresa = empresa::find( $id );
        $empresa->fill( $request->all() );
        $empresa->save();
        #Personal Log
        #
        return redirect::to('/empresa')->with('message','Empresa editada correctamente');
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
        $data = empresa::where( [ 'id' => $id ] )->delete();
        #Personal Log
        #
        return $data;
    }
}
