<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Repositories\ExerciceRepositoryInterface;
use App\Repositories\SessionRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\SessionRequest;

class SessionController extends Controller
{
    protected $sessionRepository;
    protected $exerciceRepository;
 

    public function __construct(SessionRepositoryInterface $sessionRepository, ExerciceRepositoryInterface $exerciceRepository)
    {
        $this->sessionRepository = $sessionRepository;
        $this->exerciceRepository = $exerciceRepository;
     }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = $this->sessionRepository->getAll();
        return view('Admin.sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exercices = $this->exerciceRepository->getAll();
        return view('Admin.sessions.create', compact('exercices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionRequest $request)
    {
        $form = $request->validated();
        $exercices = $request->input('exercices');
        $repetitions = $request->input('repetitions');
        
        $session = $this->sessionRepository->create($form);
        
        $exercicesWithRepetitions = [];
        for ($i = 0; $i < count($exercices); $i++) {
            $exercicesWithRepetitions[$exercices[$i]] = ['repetition' => $repetitions[$i]];
        }
        
        $session->exercices()->attach($exercicesWithRepetitions);   
        return redirect()->route('sessions.index')->with('success', 'Session créée avec succès');  
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $session = $this->sessionRepository->getById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $exercices = $this->exerciceRepository->getAll();
        $session = $this->sessionRepository->getById($id);
        return view('Admin.sessions.edit', compact('exercices', 'session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SessionRequest $request, int $id)
    {
        $form = $request->validated();
        $session = $this->sessionRepository->getById($id);
        $session->update($form);

        $exercices = $request->input('exercices');
        $repetitions = $request->input('repetitions');
        
        $exercicesWithRepetitions = [];
        for ($i = 0; $i < count($exercices); $i++) {
            $exercicesWithRepetitions[$exercices[$i]] = ['repetition' => $repetitions[$i]];
        }
        
        $session->exercices()->sync($exercicesWithRepetitions); 
        return redirect()->route('sessions.index')->with('success', 'La session a été modifiée avec succès');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->sessionRepository->delete($id);
        return redirect()->route('sessions.index')->with('success', 'La session a été supprimée avec succès');  
    }
}
