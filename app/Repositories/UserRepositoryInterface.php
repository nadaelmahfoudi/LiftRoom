<?php

namespace App\Repositories;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function update(array $data);

    public function getSubscribedUsers(int $programmeId): Collection;
}
