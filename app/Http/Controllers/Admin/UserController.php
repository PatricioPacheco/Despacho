<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use app\User;
use Carbon\Carbon;


class UserController extends Controller
{

 

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){

        $user=Auth::user();
        $name=$request->get('names');
        $users=User::name($name)->where('role',1)->orderBy('name','ASC')->paginate(4);
        return view('Admin/usuarios', compact('user'), compact('users'));
    }

     function registrar2(Request $request)

    { 
       $users=new User();
       $users->name=$request->input('name');
       $users->email=$request->input('email');
       $users->phone=$request->input('phone');
       $users->password=bcrypt($request->input('password'));
       $users->role=$request->input('role');
       $users->email_verified_at = Carbon::now()->toTimeString();
       $users->save();
       return redirect('/usuarios')->with('notificacion','Usuario registrado exitosamente');
    }




    public function index2(){
      $usrs=Auth::user();
      $userss=User::onlyTrashed()->orderBy('id','ASC')->paginate(5);
      return view('Admin/habilitar', compact('usrs'), compact('userss'));
    }



    public function delete($id)
    {
       $us=User::find($id);
       $us->delete();

       return redirect('/usuarios')->with('warning', 'Usuario eliminado exitosamente.');

     }
   
  



    public function restore($id)
    {
       $usr=User::withTrashed()->where('id', '=', $id)->first();
       $usr->restore();

       return redirect('/usuarios')->with('toast_warning', 'Usuario restaurado exitosamente.');
   
    }






    public function edit($id)
       { 
          $use=User::find($id);
          return view ('admin.editUser')->with('user',$use);
      }



          
   public function update($id, Request $request)
          { 
                $rules = [
                   'name' => 'required|max:255'
                   
                 ];
   
   
                 $this->validate($request, $rules);
                   $user = User::find($id);
                   $user->name = $request->input('name');                
                  
                
                   $user->save();
                   return redirect('/usuarios')->with('success', 'Usuario modificado exitosamente.');
             }



   

}
