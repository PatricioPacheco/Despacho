<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Empaques;
use App\Despachos;
use App\Productos;
use Carbon\Carbon;
use DB;

class EmpaquesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $emp=Empaques::orderBy('orden_empaque','ASC')->paginate(7);
        $prod= DB::table('productos')->get();

        $emp2=DB::table('productos')
        ->join('empaques','empaques.producto_id','=','productos.id')
        ->select('*', 'productos.id as idprod', 'empaques.id as idempaque')
        ->get();

        return view('Admin/empaques', compact('user', 'prod','emp2'), compact('emp'));
    }
    

   

    public function store(Request $request)
    {

            $rules = [
              'orden_empaque' => 'required|max:255|unique:empaques',
              'producto_id' => 'required|unique:empaques',
              'cantidad_producto' => 'required',
                    ];
            $messages = [
              'orden_empaque.required' => 'Es necesario ingresar el orden de paquete del usuario.',
              'orden_empaque.max' => 'El nombre del empaquetado es demasiado extenso.',
              'orden_empaque.unique' => 'La orden de paquete ya esta registrado.',
              'producto_id.required' => 'Es indispensable ingresar el producto.',
              'producto_id.unique' => 'Este producto ya tiene empaquetado.',
              'cantidad_producto.required' => 'Olvidó ingresar una la cantidad.',
            ];
  
    
        $this->validate($request, $rules, $messages);
        $emp=new Empaques();
        $emp->orden_empaque=$request->input('orden_empaque');
        $emp->producto_id=$request->input('producto_id');
        $emp->cantidad_producto=$request->input('cantidad_producto');
        $emp->stock_actual=$request->input('stock_actual');
        $emp->save();
        return back ()->with('success','Estante creado correctamente');
    }


    

    public function destroy($id)
    {
        DB::table('empaques')->delete($id);
        return back()->with('warning', 'Empaquetado eliminado exitosamente.');
    }


    public function viewdespacho($id)
    {
        $user=Auth::user();
        $emp=Empaques::orderBy('orden_empaque','ASC')->paginate(7);
        $prod= DB::table('productos')->get();
        $cli= DB::table('clientes')->get();
        $trs= DB::table('transportes')->get();

        $emp2=DB::table('productos')
        ->where('productos.id',$id)
        ->join('empaques','empaques.producto_id','=','productos.id')
        ->select('*', 'productos.id as idprod', 'empaques.id as idempaque')
        ->first();


        $emp2=DB::table('productos')
        ->where('productos.id',$id)
        ->join('empaques','empaques.producto_id','=','productos.id')
        ->select('*', 'productos.id as idprod', 'empaques.id as idempaque')
        ->first();
    

        return view('Admin/despacho', compact('user', 'prod','emp2','cli','trs'), compact('emp'));
    }



    public function despacho($id,Request $request)

       { 
        $des=new Despachos();
        
        $des->cliente_id =$request->input('cliente_id');
        $des->empaquetado_id=$request->input('empaquetado_id');
        $des->transporte_id =$request->input('transporte_id');
        $des->producto_id =$request->input('producto_id');
        $des->desp_latitude=$request->input('desp_latitude');
        $des->desp_longitude=$request->input('desp_longitude');
        $des->zoom=$request->input('zoom');

        $des->save();

        $prod = Productos::find($id);
        $prod->stock_producto=$request->input('stock_producto');              
        $prod->save();
             
        return redirect('/empaques')->with('success', 'Despacho agregada exitosamente.');
    }



}
