<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Productos;
use App\Categorias;
use Carbon\Carbon;
use DB;


class ProductosController extends Controller
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
        $cat = DB::table('categorias')->get();
        $est = DB::table('estantes')->get();
        $niv = DB::table('niveles')->get();
        $secc = DB::table('secciones')->get();
        $provee = DB::table('proveedores')->get();
        $prod=Productos::orderBy('nombre_producto','ASC')->paginate(5);
        return view('Admin/producto', compact('user','cat','est','niv','provee','secc'), compact('prod'));
    }


    public function informacion($id)
    {
        $user=Auth::user();
        $prod=DB::table('productos')
        ->where('productos.id',$id)
        ->join('categorias','categorias.id','=','productos.categoria_id')
        ->join('estantes','estantes.id','=','productos.estante_id')
        ->join('niveles','niveles.id','=','productos.nivel_id')
        ->join('secciones','secciones.id','=','productos.seccion_id')
        ->join('proveedores','proveedores.id','=','productos.proveedor_id')
        ->select('*')
        ->first();
        return view('Admin/productoinfo', compact('user'), compact('prod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod=new Productos();
        
        $prod->seccion_id =$request->input('seccion_id');
        $prod->categoria_id=$request->input('categoria_id');
        $prod->estante_id =$request->input('estante_id');
        $prod->nivel_id=$request->input('nivel_id');
        $prod->proveedor_id=$request->input('proveedor_id');
        $prod->nombre_producto=$request->input('nombre_producto');
        $prod->codigo_producto =$request->input('codigo_producto');
        $prod->peso_producto =$request->input('peso_producto');
        $prod->stock_producto =$request->input('stock_producto');
        $prod->estado_producto =$request->input('estado_producto');
        $prod->fecha_ingreso =$request->input('fecha_ingreso');
        $prod->fecha_caducidad =$request->input('fecha_caducidad');
        $prod->observacion_producto=$request->input('observacion_producto');
        $prod->save();
            
        return back()->with('success', 'Producto Agregada Correctamente');

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
        $prod = Productos::find($id);
        
        $prod->seccion_id =$request->input('seccion_id');
        $prod->categoria_id=$request->input('categoria_id');
        $prod->estante_id =$request->input('estante_id');
        $prod->nivel_id=$request->input('nivel_id');
        $prod->proveedor_id=$request->input('proveedor_id');
        $prod->nombre_producto=$request->input('nombre_producto');
        $prod->codigo_producto =$request->input('codigo_producto');
        $prod->peso_producto =$request->input('peso_producto');
        $prod->stock_producto =$request->input('stock_producto');
        $prod->estado_producto =$request->input('estado_producto');
        $prod->fecha_ingreso =$request->input('fecha_ingreso');
        $prod->fecha_caducidad =$request->input('fecha_caducidad');
        $prod->observacion_producto=$request->input('observacion_producto');
        $prod->save();
            
        return back()->with('success', 'Clase Agregada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('productos')->delete($id);
        return back()->with('warning', 'Producto eliminado exitosamente.');
    }
}
