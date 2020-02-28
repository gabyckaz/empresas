<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Contacto;
use DB;
use Session;



class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empresa = Empresa::all();
      return view('empresa.index',compact('empresa'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validando la informacion
      $this->validate($request,array(
        'nombre' => 'required|max:45',
        'direccion' => 'required|max:100',
        'telefono'=>'required|max:8',
        'sitio_web'=>'max:45',
      ));
      //Guardar en la BD
      //Relacionando campo de BD con formulario
      //campo de BD -> campo del formulario
      $empresa=new Empresa;
      $empresa->nombre_empresa=$request->nombre;
      $empresa->direccion_empresa=$request->direccion;
      $empresa->telefono_empresa=$request->telefono;
      $empresa->sitio_web=$request->sitio_web;
      $empresa->save();

      return redirect('empresa')->with('status', "Guardado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $empresa = Empresa::find($id);
      $contacto=  Contacto::where('id_empresa', '=', $id)->get();

      return view('empresa.show',compact('empresa','id','contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $empresa = Empresa::find($id);
    //  $contacto=  Contacto::where('id_empresa', '=', $id)->first();
      return view('empresa.edit',compact('empresa','id','contacto'));
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
      //validando la informacion
      $this->validate($request,array(
        'nombre' => 'required|max:45',
        'direccion' => 'required|max:100',
        'telefono'=>'required|max:8',
        'sitio_web'=>'max:45',
      ));
      //guardar en la bd

      $empresa = Empresa::find($id);
      $empresa->nombre_empresa=$request->nombre;
      $empresa->direccion_empresa=$request->direccion;
      $empresa->telefono_empresa=$request->telefono;
      $empresa->sitio_web=$request->sitio_web;
      $empresa->save();
      return redirect('empresa')->with('status', "Cambios guardados con éxito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empresa= Empresa::find($id);
      $contacto=  Contacto::where('id_empresa', '=', $id)->firstOrFail();
      $contacto->delete();
      $empresa->delete();
      return redirect('empresa')->with('status', "Cambios guardados con éxito");
    }



}
