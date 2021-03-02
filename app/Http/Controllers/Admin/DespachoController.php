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


class DespachoController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $desp=DB::table('despachos')
        ->join('clientes','clientes.id','=','despachos.cliente_id')
        ->join('empaques','empaques.id','=','despachos.empaquetado_id')
        ->join('transportes','transportes.id','=','despachos.transporte_id')
        ->join('productos','productos.id','=','despachos.producto_id')
        ->select('*','despachos.id as despachoid', 'despachos.created_at as despachofecha')
        ->get();
        return view('Admin/viewdespacho', compact('user'), compact('desp'));
    }

    public function destroy($id)
    {
        DB::table('despachos')->delete($id);
        return back()->with('danger', 'Despacho eliminado exitosamente.');
    }


 
}
