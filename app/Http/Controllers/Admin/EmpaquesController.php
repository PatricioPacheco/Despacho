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

        $emp2=DB::table('empaques')
        ->where('empaques.Estado_emp',0)
        ->join('productos','productos.id','=','empaques.producto_id')
        ->select('*', 'empaques.id as idempaque')
        ->get();

        return view('Admin/empaques', compact('user', 'prod','emp2'), compact('emp'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {


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

        $emp2=DB::table('empaques')
        ->where('empaques.id',$id)
        ->join('productos','productos.id','=','empaques.producto_id')
        ->select('*', 'empaques.id as idempaque', 'productos.id as idprod')
        ->first();

        return view('Admin/despacho', compact('user', 'prod','emp2','cli','trs'), compact('emp'));
    }



    public function despacho(Request $request)
       { 
        $des=new Despachos();
        
        $des->cliente_id =$request->input('cliente_id');
        $des->empaquetado_id=$request->input('empaquetado_id');
        $des->transporte_id =$request->input('transporte_id');
        $des->producto_id =$request->input('producto_id');

        $des->save();
             
                return back()->with('success', 'Despacho agregada exitosamente.');
          }



}
