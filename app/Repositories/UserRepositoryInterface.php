<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function update(array $data);

    public function getSubscribedUsers(int $programmeId): Collection;

    public function getSubscribedProgrammes(User $user);
}
