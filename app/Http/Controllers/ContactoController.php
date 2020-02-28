<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;
use App\Empresa;
use DB;
use Session;



class ContactoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = Empresa::all();
        return view('contacto.create',compact('empresa'));
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
        'nombre_contacto'=>'required|max:45',
        'celular'=>'required|max:8',
        'email_principal'=>'required|max:45',
        'email_secundario'=>'max:45',
      ));

      $contacto=new Contacto;
      $contacto->nombre_contacto=$request->nombre_contacto;
      $contacto->celular=$request->celular;
      $contacto->email_principal=$request->email_principal;
      $contacto->email_secundario=$request->email_secundario;
      $contacto->id_empresa=$request->id_empresa;
      $contacto->save();

      return redirect('empresa')->with('status', "Guardado con éxito");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $contacto = Contacto::find($id);
      $empresa = Empresa::all();
    //  $contacto=  Contacto::where('id_empresa', '=', $id)->first();
      return view('contacto.edit',compact('empresa','id','contacto'));
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
        'nombre_contacto'=>'required|max:45',
        'celular'=>'required|max:8',
        'email_principal'=>'required|max:45',
        'email_secundario'=>'max:45',
      ));

      $contacto= Contacto::find($id);
      $contacto->nombre_contacto=$request->nombre_contacto;
      $contacto->celular=$request->celular;
      $contacto->email_principal=$request->email_principal;
      $contacto->email_secundario=$request->email_secundario;
      $contacto->id_empresa=$request->id_empresa;
      $contacto->save();

      return redirect('empresa')->with('status', "Guardado con éxito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contacto=  Contacto::find($id);
      $contacto->delete();
      //return redirect('empresa')->with('status', "Cambios guardados con éxito");
        return back();
    }



}
