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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        
        $cat=Categorias::orderBy('nombre_categoria','ASC')->paginate(5);
        //$cat=Categorias::orderBy('nombre_categoria','ASC')->paginate(5);
        return view('Admin/categoria', compact('user'), compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $cat=new Categorias();
          $cat->nombre_categoria=$request->input('nombre_categoria');
          $cat->save();
          return back ()->with('notificacion','Categoria registrado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=Categorias::find($id);
        return view ('admin/editcat', compact('cat'));
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
        $cat = Categorias::find($id);
        $cat->nombre_categoria=$request->input('nombre_categoria');              
        $cat->save();
        return back ()->with('success', 'Categoria modificado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categorias')->delete($id);
        return back()->with('warning', 'Categoria eliminada exitosamente.');
    }
}
