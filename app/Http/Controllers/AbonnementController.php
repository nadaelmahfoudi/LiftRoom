<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbonnementRequest;
use App\Repositories\AbonnementRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbonnementController extends Controller
{
    protected $abonnementRepository;

    public function __construct(AbonnementRepositoryInterface $abonnementRepository)
    {
        $this->abonnementRepository = $abonnementRepository;
    }

    public function store(AbonnementRequest $request)
    {
        
        $validatedData = $request->validated();
        $userId = Auth::id();
        $validatedData['user_id'] = $userId;
        $abonnement = $this->abonnementRepository->create($validatedData);
        return redirect()->back();
    }

    public function acceptAbonnement($abonnementId)
    {
        $this->abonnementRepository->updateStatus($abonnementId, 'acceptee');
        return redirect()->back();
    }
}
