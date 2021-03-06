<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Estantes;
use Carbon\Carbon;
use DB;

class EstantesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $est=Estantes::orderBy('nombre_estante','ASC')->paginate(5);
        return view('Admin/estantes', compact('user'), compact('est'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre_estante' => 'required|max:255|unique:estantes',
            
                  ];
          $messages = [
            'nombre_estante.required' => 'Es necesario ingresar el estante del usuario.',
            'nombre_estante.max' => 'El nombre del estante es demasiado extenso.',
            'nombre_estante.unique' => 'El estante ya esta registrado.',
           
          ];

  
      $this->validate($request, $rules, $messages);
        $est=new Estantes();
        $est->nombre_estante=$request->input('nombre_estante');
        $est->save();
        return back ()->with('success','Estante creado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $est=Estantes::find($id);
        return view ('admin/editEstantes', compact('est'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'nombre_estante' => 'required|max:255|unique:estantes',
            
                  ];
          $messages = [
            'nombre_estante.required' => 'Es necesario ingresar el estante del usuario.',
            'nombre_estante.max' => 'El nombre del estante es demasiado extenso.',
            'nombre_estante.unique' => 'El estante ya esta registrado.',
           
          ];

  
      $this->validate($request, $rules, $messages);
        $est = Estantes::find($id);
        $est->nombre_estante=$request->input('nombre_estante');              
        $est->save();
        return redirect('/estantes')->with('success', 'Estante actualizado correctamente');
    }

    public function destroy($id)
    {
        DB::table('estantes')->delete($id);
        return back()->with('warning', 'Estante eliminado exitosamente');
    }
}
