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

use shonflower\Http\Requests\productoAddRequest;
use shonflower\Http\Requests\productoUpdateRequest;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProd = array();
        $dataProd = productos::paginate(10);
        return view('producto.homeProducto',compact('dataProd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['categoria']   = categoria::orderBy('nombre')->lists('nombre','id');
        #
        return view('producto.addProducto',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productoAddRequest $request)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $categ = productos::create( $request->all() );

        return redirect::to('/producto')->with('message','Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #
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
        $producto = productos::find($id);
        $data['categoria']  = categoria::orderBy('nombre')->lists('nombre','id');
        $data['producto']   = $producto;
        return view('producto.editProducto',[ "data" => $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productoUpdateRequest $request, $id)
    {
        #User data
        $id_user    = Auth::User()->id;
        $user       = Auth::User()->user;
        #
        $producto = productos::find( $id );
        $producto->fill( $request->all() );
        $producto->save();
        #Personal Log
        #
        return redirect::to('/producto')->with('message','Producto editado correctamente');
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
        $data = productos::where(['id' => $id])->delete();
        #Personal Log
        #
        return $data;
    }

    public function prod_by_categ( $categ )
    {
        $data = array();
        $data['prod']   = productos::where('id_categoria','=',$categ)->orderBy('nombre')->get();
        $data['cant']   = count($data['prod']);
        return $data;
    }

    public function find_prod( $id )
    {
        $data = array();
        $data['prod']   = productos::where('id','=',$id)->get();
        $data['cant']   = count($data['prod']);
        return $data;
    }

}
