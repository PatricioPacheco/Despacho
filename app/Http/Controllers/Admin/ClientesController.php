<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Clientes;
use Carbon\Carbon;
use DB;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $cli=Clientes::orderBy('primer_nombre_cliente','ASC')->paginate(5);
        return view('Admin/clientes', compact('user'), compact('cli'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cli=new Clientes();
        $cli->primer_nombre_cliente=$request->input('primer_nombre_cliente');
        $cli->segundo_nombre_cliente=$request->input('segundo_nombre_cliente');
        $cli->primer_apellido_cliente=$request->input('primer_apellido_cliente');
        $cli->segundo_apellido_cliente=$request->input('segundo_apellido_cliente');
        $cli->calle_principal_direccion=$request->input('calle_principal_direccion');
        $cli->calle_secundaria_direccion=$request->input('calle_secundaria_direccion');
        $cli->numero_direccion=$request->input('numero_direccion');
        $cli->referencia_direccion=$request->input('referencia_direccion');
        $cli->email_cliente=$request->input('email_cliente');
        $cli->numero_cliente=$request->input('numero_cliente');
        $cli->save();
        return back ()->with('notificacion','Cliente creado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cli=Clientes::find($id);
        return view ('admin/editClientes', compact('cli'));
    }

    public function update(Request $request, $id)
    {
        $cli = Clientes::find($id);
        $cli->primer_nombre_cliente=$request->input('primer_nombre_cliente');
        $cli->segundo_nombre_cliente=$request->input('segundo_nombre_cliente');
        $cli->primer_apellido_cliente=$request->input('primer_apellido_cliente');
        $cli->segundo_apellido_cliente=$request->input('segundo_apellido_cliente');
        $cli->calle_principal_direccion=$request->input('calle_principal_direccion');
        $cli->calle_secundaria_direccion=$request->input('calle_secundaria_direccion');
        $cli->numero_direccion=$request->input('numero_direccion');
        $cli->referencia_direccion=$request->input('referencia_direccion');
        $cli->email_cliente=$request->input('email_cliente');
        $cli->numero_cliente=$request->input('numero_cliente');
        $cli->save();
        return redirect('/clientes')->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy($id)
    {
        DB::table('clientes')->delete($id);
        return back()->with('warning', 'Cliente eliminado exitosamente');
    }
}
