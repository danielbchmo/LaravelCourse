<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

//Class for deleting
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['empleados']=Empleado::paginate(5);
        return view('employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //a variable just for testing
        //$datos = request()->all();

        //For security, we'll go to hide the token
        $datos = request()->except('_token');

        if($request->hasFile('Foto')){
            $datos['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleado::insert( $datos );
        return response()->json( $datos );
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado=Empleado::findOrFail($id);
        return view('employee.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
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
        return view('employee.edit', compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect('employee');
    }
}
