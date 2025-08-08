<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{

    public function register(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|confirmed|min:6',
        // ]);

        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login');
        // return redirect('/dash')->with('success', 'Inscription réussie. Connectez-vous.');
    }
    public function login(Request $request){

        $name = $request-> email;
        $password = $request-> password;
        $user = User::where('email',$name)->first(); // recuperer la premiere aucurrence dans la bd
        if($user){
            if(password_verify($password, $user->password)){
                return redirect('/dashboardP')->with('success','Connexion reussie');
            }
            return redirect('/login')->with('error','les identifiants ne correspondent pas aux enregistrements');

        }
        return redirect('/login')->with('errors','utilisateur introuvable');

    }
}


