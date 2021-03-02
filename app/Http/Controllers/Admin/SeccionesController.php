<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Secciones;
use Carbon\Carbon;
use DB;

class SeccionesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $sec=Secciones::orderBy('nombre_seccion','ASC')->paginate(5);
        return view('Admin/secciones', compact('user'), compact('sec'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre_seccion' => 'required|max:255|unique:secciones',
            
                  ];
          $messages = [
            'nombre_seccion.required' => 'Es necesario ingresar la sección del usuario.',
            'nombre_seccion.max' => 'El nombre de la sección es demasiado extenso.',
            'nombre_seccion.unique' => 'La sección ya esta registrada.',

          ];

  
      $this->validate($request, $rules, $messages);
        $sec=new Secciones();
        $sec->nombre_seccion=$request->input('nombre_seccion');
        $sec->save();
        return back ()->with('notificacion','Sección creada correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sec=Secciones::find($id);
        return view ('admin/editSecciones', compact('sec'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'nombre_seccion' => 'required|max:255|unique:secciones',
            
                  ];
          $messages = [
            'nombre_seccion.required' => 'Es necesario ingresar la sección del usuario.',
            'nombre_seccion.max' => 'El nombre de la sección es demasiado extenso.',
            'nombre_seccion.unique' => 'La sección ya esta registrada.',

          ];

  
      $this->validate($request, $rules, $messages);
        $sec = Secciones::find($id);
        $sec->nombre_seccion=$request->input('nombre_seccion');              
        $sec->save();
        return redirect('/secciones')->with('success', 'Sección actualizada correctamente');
    }

    public function destroy($id)
    {
        DB::table('secciones')->delete($id);
        return back()->with('warning', 'Sección eliminada exitosamente');
    }
}
