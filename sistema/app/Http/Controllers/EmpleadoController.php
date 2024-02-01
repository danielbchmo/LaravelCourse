<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

//Class for deleting
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
//------------------------------------------------------------------------ INDEX -------------------------------------------------
    public function index()
    {
        $data['empleados']=Empleado::paginate(2);
        return view('employee.index', $data);
    }

//------------------------------------------------------------------------ CREATE -------------------------------------------------
    public function create()
    {
        //
        return view('employee.create');
    }

//------------------------------------------------------------------------ STORE -------------------------------------------------
    public function store(Request $request)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Foto'=>'required|max:100|mimes:jpeg,png,jpg',
        ];
        $mensajeError=[
            'required"=>":attribute',
            'Foto.required'=>'Es necesario seleccionar una imagen',
        ];

        $this->validate($request,$campos,$mensajeError);

        //a variable just for testing
        //$datos = request()->all();

        //For security, we'll go to hide the token
        $datos = request()->except('_token');

        if($request->hasFile('Foto')){
            $datos['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleado::insert( $datos );
        // return response()->json( $datos );
        return redirect('employee')->with('mensaje','Empleado agregado con exito');
    }

//------------------------------------------------------------------------ SHOW -------------------------------------------------
    public function show(Empleado $empleado)
    {
        //
    }

//------------------------------------------------------------------------ EDIT -------------------------------------------------
    public function edit($id)
    {
        $empleado=Empleado::findOrFail($id);
        return view('employee.edit', compact('empleado'));
    }

//------------------------------------------------------------------------ UPDATE -------------------------------------------------
    public function update(Request $request, $id)
    {   
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',
        ];
        $mensajeError=[
            'required"=>":attribute',
        ];

        //just if you don't want to be obligatory the photo
        if($request->hasFile('Foto')){
            $campos=['Foto.required'=>'Es necesario seleccionar una imagen'];
            $mensajeError=['Foto.required'=>'Es necesario seleccionar una imagen'];
        }
        
        $this->validate($request,$campos,$mensajeError);

        //                                  do not resect
        $datos = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $empleado=Empleado::findOrFail($id);
            //Delete information
            Storage::delete('public/'.$empleado->Foto);

            $datos['Foto']=$request->file('Foto')->store('uploads','public');
        }

        //Update
        Empleado::where('id','=',$id)->update($datos);

        //reload
        $empleado=Empleado::findOrFail($id);

        //return view('employee.edit', compact('empleado'));
        return redirect('employee')->with('mensaje','Empleado actualizado exitosamente');
    }


//------------------------------------------------------------------------ DESTROY -------------------------------------------------
    public function destroy($id)
    {   
        $empleado=Empleado::findOrFail($id);

        if(Storage::delete('public/'.$empleado->Foto)){
            Empleado::destroy($id);
        }

        return redirect('employee')->with('mensaje','Empleado borrado exitosamente');
    }
}
