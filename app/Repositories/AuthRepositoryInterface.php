<?php

namespace App\Repositories;
use App\Models\User;

interface AuthRepositoryInterface
{
    public function register(array $data);
    public function login(array $credentials);
    public function logout();
    public function forgotPassword(array $data);
    public function resetPassword(array $data);
    public function assignRole(User $user, string $roleName);
}
