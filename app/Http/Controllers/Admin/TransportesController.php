<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Transportes;
use Carbon\Carbon;
use DB;

class TransportesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $trs=Transportes::orderBy('empresa_transporte','ASC')->paginate(5);
        return view('Admin/transportes', compact('user'), compact('trs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $rules = [
            'empresa_transporte' => 'required|max:255',
            'tipo_transporte' => 'required|max:255|',
            'numero_transporte' => 'required',
            
                  ];
          $messages = [
            'empresa_transporte.required' => 'Es necesario ingresar el nombre de la empresa.',
            'empresa_transporte.max' => 'El nombre es demasiado extenso.',
            'tipo_transporte.required' => 'Es necesario ingresar el nombre de la empresa.',
            'tipo_transporte.max' => 'El nombre es demasiado extenso.',

            'numero_transporte.required' => 'Es necesario ingresar el número de la empresa.',
        
           
          ];
   
          $this->validate($request, $rules, $messages);
        $trs=new Transportes();
        $trs->empresa_transporte=$request->input('empresa_transporte');
        $trs->tipo_transporte=$request->input('tipo_transporte');
        $trs->numero_transporte=$request->input('numero_transporte');
        $trs->save();
        return back ()->with('notificacion','Transporte creado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $trs=Transportes::find($id);
        return view ('admin/editTransportes', compact('trs'));
    }

    public function update(Request $request, $id)

    {

        $rules = [
            'empresa_transporte' => 'required|max:255',
            'tipo_transporte' => 'required|max:255|',
            'numero_transporte' => 'required',
            
                  ];
          $messages = [
            'empresa_transporte.required' => 'Es necesario ingresar el nombre de la empresa.',
            'empresa_transporte.max' => 'El nombre es demasiado extenso.',
            'tipo_transporte.required' => 'Es necesario ingresar el nombre de la empresa.',
            'tipo_transporte.max' => 'El nombre es demasiado extenso.',
            'numero_transporte.required' => 'Es necesario ingresar el número de la empresa.',
        
           
          ];

          $this->validate($request, $rules, $messages);
        $trs = Transportes::find($id);
        $trs->empresa_transporte=$request->input('empresa_transporte');
        $trs->tipo_transporte=$request->input('tipo_transporte');
        $trs->numero_transporte=$request->input('numero_transporte');
        $trs->save();
        return redirect('/transportes')->with('success', 'Transporte actualizado correctamente');
    }

    public function destroy($id)
    {
        DB::table('transportes')->delete($id);
        return back()->with('warning', 'Transporte eliminado exitosamente');
    }
}
