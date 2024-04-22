<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbonnementRequest;
use App\Repositories\AbonnementRepositoryInterface;
use Illuminate\Http\Request;

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
    $abonnement = $this->abonnementRepository->create($validatedData);
    return redirect()->back() ;
}
}
