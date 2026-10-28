<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{

    public function showLogin() { return view('auth.login'); }
    public function showRegister() { return view('auth.register'); }

    public function register(Request $request){
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'username'      => ['required', 'string', 'max:50', 'alpha_dash', 'unique:users'],
            'email'         => ['required', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'confirmed', 'min:8'],
            'phone'         => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\-\s]+$/'],
            'role'          => ['required', Rule::in([User::ROLE_SELLER, User::ROLE_BUYER])],
            'profile_photo' => ['nullable', 'image', 'max:2048'],
         ]);

         if($request->hasFile('profile_photo')){
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photo' , 'public');
         }

        $user = new User($data);
        $user->role = $data['role'];
        $user->save();

         Auth::login($user);
         $request->session()->regenerate();

         return redirect()->to($this->homeFor($user));
    }
    public function login(Request $request){
        $request->validate([
            'login' => ['required' , 'string'],
            'password' => ['required']
        ]);

        $field = filter_var($request->login , FILTER_VALIDATE_EMAIL) ? 'email'  : 'username';

        if(Auth::attempt(
            [$field => $request->login , 'password' => $request->password],$request->boolean('remember'))){
            $request->session()->regenerate();
            return redirect()->intended($this->homeFor($request->user()));
        }
        return back()
        ->withErrors(['login' => 'Email/username atau password salah.'])
        ->onlyInput('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    protected function homeFor(User $user): string{
        return match ($user->role) {
            User::ROLE_BUYER => route('dashboard') ,
            User::ROLE_SELLER => route('dashboard'),
            default => route('home')
        };
    }
}
