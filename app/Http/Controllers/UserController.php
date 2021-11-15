<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\SignupMail;
use App\Mail\NotifMail;

class UserController extends Controller
{

    
    public function login(Request $request) {

        if($request->input()) {
            $credentials = $request->validate([
                'email' => ['required'],
                'password' => ['required'],
            ]);
    
            if (Auth::attempt(['approve' => '1', 'email' => $request->input('email'), 'password' => $request->input('password')])) {
                $request->session()->regenerate();
    
                return redirect()->intended('/');
            } else {
                return redirect()->back()->with('message', 'Mauvais identifiants');
            }
    
        }

        return view('login/login');
    }

    public function signup(Request $request) {

        if($request->input()) {
            $credentials = $request->validate([
                'name' => ['required'],
                'email' => ['required'],
                'password' => ['required'],
            ]);

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->isAdmin = 0;
            $user->approve = 0;

            $user->save();
            

            Mail::to($user->email)->send(new SignupMail($user));
            
            $admins = User::where('isAdmin', '=', 1)->get();
            foreach($admins as $admin) {
                Mail::to($admin->email)->send(new NotifMail($user, $admin));
            }
            return redirect()->back()->with('message', 'Vous avez été inscrit, il ne vous reste plus qu\'à attendre la validation d\'un administrateur.');
    
        }

        return view('login/signup');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }

    public function account(Request $request) {
        $user = Auth::user();
        if($request->input()) {
            $credentials = $request->validate([
                'name' => ['required'],
                'email' => ['required'],
                'password' => ['required'],
            ]);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->isAdmin = $user->isAdmin;
            $user->approve = $user->approve;

            $user->save();
        
            return redirect()->back()->with('message', 'Vous avez bien modifié votre profil');
    
        }

        return view('account/account', compact('user'));
    }
}


