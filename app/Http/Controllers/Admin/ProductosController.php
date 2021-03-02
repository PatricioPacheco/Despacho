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

    public function store(Request $request)
    {

        $rules = [
            'nombre_producto' => 'required|max:255|unique:productos',
            'codigo_producto' => 'required|max:255|unique:productos',
                  ];
          $messages = [
            'nombre_producto.required' => 'Es necesario ingresar el nombre del producto.',
            'nombre_producto.max' => 'El nombre del producto es demasiado extenso.',
            'nombre_producto.unique' => 'El producto ya esta registrado.',
            'codigo_producto.required' => 'Es necesario ingresar el código del producto.',
            'codigo_producto.max' => 'El código del producto es demasiado extenso.',
            'codigo_producto.unique' => 'El código ya esta registrado.',
          ];

      $this->validate($request, $rules, $messages);
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

    public function edit($id)
    {
        $cat=Categorias::find($id);
        return view ('admin/editcat', compact('cat'));
    }

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

    public function destroy($id)
    {
        DB::table('productos')->delete($id);
        return back()->with('warning', 'Producto eliminado exitosamente.');
    }
}
