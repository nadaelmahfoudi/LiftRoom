<?php 

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function update(array $data)
    {
        $user = auth()->user(); 
        
        $user->update($data); 

        return $user; 
    }
}
