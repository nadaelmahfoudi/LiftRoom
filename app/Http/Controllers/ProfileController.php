<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = auth()->user();

        return view('Profile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $data = $request->only(['name', 'email']);

        $this->userRepository->update($data); 

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
