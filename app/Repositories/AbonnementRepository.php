<?php

namespace App\Repositories;

use App\Models\Abonnement;

class AbonnementRepository implements AbonnementRepositoryInterface
{
    public function create(array $data)
    {
        return Abonnement::create($data);
    }

    public function findById(int $id): ?Abonnement
    {
        return Abonnement::find($id);
    }
    public function updateStatus(int $abonnementId, string $status)
    {
        $abonnement = Abonnement::findOrFail($abonnementId);
        $abonnement->update(['statut' => $status]);
        return $abonnement;
    }

}
