<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\ForgotPasswordMail;


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

        Auth::login($user);
        return redirect('/boutique-create');
        // return redirect('/dashboqrd')->with('success', 'Inscription réussie. Connectez-vous.');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $name = $request-> email;
        $password = $request-> password;
        $user = User::where('email',$name)->first(); // recuperer la premiere aucurrence dans la bd
        if($user){
            if(password_verify($password, $user->password)){
                return redirect('/select-boutique')->with('success','Connexion reussie');
            }
            return redirect('/login-register')->with('error','les identifiants ne correspondent pas aux enregistrements');

        }
        return redirect('/login-register')->with('errors','utilisateur introuvable');

    }


    public function forgotPassword(Request $request){
        $email=$request->email;

        $user=User::where('email',$email)->first();

        if($user){

            Mail::to($user->email)->send(new ForgotPasswordMail($user->email)); 

            return redirect('/forgot-password')->with('success','Le lien de reinitialisation a ete envoye');
        }
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login-register');
        
    }
}


