<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Proveedores;
use Carbon\Carbon;
use DB;

class ProveedoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $prv=Proveedores::orderBy('nombre_proveedor','ASC')->paginate(5);
        return view('Admin/proveedores', compact('user'), compact('prv'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre_proveedor' => 'required|max:255|unique:proveedores',
            'email_proveedor' => 'required|email|max:255|unique:proveedores',
            
                  ];
          $messages = [
            'nombre_proveedor.required' => 'Es necesario ingresar el nombre del proveedor.',
            'nombre_proveedor.max' => 'El nombre del proveedor es demasiado extenso.',
            'nombre_proveedor.unique' => 'El proveedor ya esta registrado.',
            'email_proveedor.email' => 'El e-mail ingresado no es válido.',
            'email_proveedor.max' => 'El e-mail es demasiado extenso.',
            'email_proveedor.unique' => 'Este e-mail ya se encuentra en uso.',
          ];

  
      $this->validate($request, $rules, $messages);
        $prv=new Proveedores();
        $prv->nombre_proveedor=$request->input('nombre_proveedor');
        $prv->direccion_proveedor=$request->input('direccion_proveedor');
        $prv->email_proveedor=$request->input('email_proveedor');
        $prv->numero_proveedor=$request->input('numero_proveedor');
        $prv->save();
        return back ()->with('notificacion','Proveedor creado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $prv=Proveedores::find($id);
        return view ('admin/editProveedores', compact('prv'));
    }

    public function update(Request $request, $id)
    {
        $prv = Proveedores::find($id);
        $prv->nombre_proveedor=$request->input('nombre_proveedor');
        $prv->direccion_proveedor=$request->input('direccion_proveedor');
        $prv->email_proveedor=$request->input('nombre_proveedor');
        $prv->numero_proveedor=$request->input('numero_proveedor');              
        $prv->save();
        return redirect('/proveedores')->with('success', 'Proveedor actualizado correctamente');
    }

    public function destroy($id)
    {
        DB::table('proveedores')->delete($id);
        return back()->with('warning', 'Proveedor eliminado exitosamente');
    }
}
