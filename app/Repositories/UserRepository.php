<?php 

namespace App\Repositories;
use Illuminate\Support\Collection;

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

    public function getSubscribedUsers(int $programmeId): Collection
    {
        return User::whereHas('abonnements', function ($query) use ($programmeId) {
            $query->where('programme_id', $programmeId);
        })->get();
    }
    
}
