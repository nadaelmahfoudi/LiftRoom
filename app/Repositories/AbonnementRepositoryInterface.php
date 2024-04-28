<?php

namespace App\Repositories;

use App\Models\Abonnement;

interface AbonnementRepositoryInterface
{
    public function create(array $data);
    public function findById(int $id): ?Abonnement;
    public function updateStatus(int $abonnementId, string $status);
    public function getExistingAbonnement($userId, $programmeId);
}
