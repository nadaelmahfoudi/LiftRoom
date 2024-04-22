<?php

namespace App\Repositories;

use App\Models\Abonnement;

interface AbonnementRepositoryInterface
{
    public function create(array $data);
    public function findById(int $id): ?Abonnement;
}
