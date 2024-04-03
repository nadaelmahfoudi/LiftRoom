<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AuthRepositoryInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        
        if ($this->authRepository->login($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        
        return back()->withInput($request->only('email'));
    }

    public function registerForm(){

        return view('auth.register');

    }

    public function loginForm(){

        return view('auth.login');
        
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        
        $this->authRepository->register($data);
        return redirect('/');
    }

    public function logout(Request $request)
    {
        $this->authRepository->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $data = $request->validate(['email' => 'required|email']);

        $this->authRepository->forgotPassword($data);
        return  redirect()->route('login')->with(['success' => 'Password reset link sent successfully']);
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $this->authRepository->resetPassword($data);
        return redirect()->route('login')->with('status', 'Password reset successfully');
    }
}