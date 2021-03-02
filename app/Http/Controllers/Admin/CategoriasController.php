<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Categorias;
use Carbon\Carbon;
use DB;


class CategoriasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        
        $cat=Categorias::orderBy('nombre_categoria','ASC')->paginate(5);
        //$cat=Categorias::orderBy('nombre_categoria','ASC')->paginate(5);
        return view('Admin/categoria', compact('user'), compact('cat'));
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre_categoria' => 'required|max:255|unique:categorias',
            
                  ];
          $messages = [
            'nombre_categoria.required' => 'Es necesario ingresar el categoria del usuario.',
            'nombre_categoria.max' => 'El nombre de la categoria es demasiado extenso.',
            'nombre_categoria.unique' => 'La categoria ya esta registrada.',

          ];

  
      $this->validate($request, $rules, $messages);
          $cat=new Categorias();
          $cat->nombre_categoria=$request->input('nombre_categoria');
          $cat->save();
          return back ()->with('notificacion','Categoria registrado exitosamente');
    }

    public function edit($id)
    {
        $cat=Categorias::find($id);
        return view ('admin/editcat', compact('cat'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'nombre_categoria' => 'required|max:255|unique:categorias',
            
                  ];
          $messages = [
            'nombre_categoria.required' => 'Es necesario ingresar la categoria del usuario.',
            'nombre_categoria.max' => 'El nombre de la categoria es demasiado extenso.',
            'nombre_categoria.unique' => 'La categoria ya esta registrada.',

          ];

  
      $this->validate($request, $rules, $messages);
        $cat = Categorias::find($id);
        $cat->nombre_categoria=$request->input('nombre_categoria');              
        $cat->save();
        return back ()->with('success', 'Categoria modificado exitosamente.');
    }

    public function destroy($id)
    {
        DB::table('categorias')->delete($id);
        return back()->with('warning', 'Categoria eliminada exitosamente.');
    }
}
