<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Niveles;
use Carbon\Carbon;
use DB;

class NivelesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $lvl=Niveles::orderBy('nombre_nivel','ASC')->paginate(5);
        return view('Admin/niveles', compact('user'), compact('lvl'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre_nivel' => 'required|max:255|unique:niveles',
            
                  ];
          $messages = [
            'nombre_nivel.required' => 'Es necesario ingresar el nivel del usuario.',
            'nombre_nivel.max' => 'El nombre del nivel es demasiado extenso.',
            'nombre_nivel.unique' => 'El nivel ya esta registrada.',

          ];

  
      $this->validate($request, $rules, $messages);
        $lvl=new Niveles();
        $lvl->nombre_nivel=$request->input('nombre_nivel');
        $lvl->save();
        return back ()->with('notificacion','Nivel creado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $lvl=Niveles::find($id);
        return view ('admin/editNiveles', compact('lvl'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'nombre_nivel' => 'required|max:255|unique:niveles',
            
                  ];
          $messages = [
            'nombre_nivel.required' => 'Es necesario ingresar el nivel del usuario.',
            'nombre_nivel.max' => 'El nombre del nivel es demasiado extenso.',
            'nombre_nivel.unique' => 'El nivel ya esta registrada.',

          ];

  
      $this->validate($request, $rules, $messages);
        $lvl = Niveles::find($id);
        $lvl->nombre_nivel=$request->input('nombre_nivel');              
        $lvl->save();
        return redirect('/niveles')->with('success', 'Nivel actualizado correctamente');
    }

    public function destroy($id)
    {
        DB::table('niveles')->delete($id);
        return back()->with('warning', 'Nivel eliminado exitosamente');
    }
}
