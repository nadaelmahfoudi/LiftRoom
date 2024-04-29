<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Repositories\ProgrammeRepositoryInterface;
use App\Repositories\SessionRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ProgrammeRequest;
use App\Models\Skill;
use App\Repositories\SkillRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProgrammeController extends Controller
{
    protected $programmeRepository;
    protected $sessionRepository;
    protected $skillRepository;
    protected $userRepository;
    
    public function __construct(ProgrammeRepositoryInterface $programmeRepository, SessionRepositoryInterface $sessionRepository, SkillRepositoryInterface $skillRepository, UserRepositoryInterface $userRepository)
    {
        $this->programmeRepository = $programmeRepository;
        $this->sessionRepository = $sessionRepository;
        $this->skillRepository = $skillRepository; 
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $programmes = $this->programmeRepository->getAll();
    
        foreach ($programmes as &$programme) {
            $programme->subscriptions = $this->programmeRepository->getSubscriptions($programme->id)->filter(function ($subscription){
                return $subscription->statut === 'en attente';
            });
        }
    
        return view('Admin.programmes.index', compact('programmes'));
    }    

    public function create()
    {
        $sessions = $this->sessionRepository->getAll();
        $skills = $this->skillRepository->getAll();
        return view('Admin.programmes.create', compact('sessions', 'skills'));
    }

    public function show($id)
    {
        $programme = $this->programmeRepository->getById($id);
        return view('Admin.programmes.show', compact('programme'));
    }

    public function showSubscribedProgramme()
    {
        $user = Auth::user();
    
        $abonnements = $this->userRepository->getSubscribedProgrammes($user)->where('statut', 'acceptee');
    
        return view('Admin.programmes.showSubscribedProgramme', ['abonnements' => $abonnements]);
    }

    public function store(ProgrammeRequest $request)
    {
        $form = $request->validated();
        $sessions = $request->input('sessions');
        $days = $request->input('days'); 
    
        $programme = $this->programmeRepository->create($form);
    
        // Attach sessions
        $sessionsWithDays = [];
        for ($i = 0; $i < count($sessions); $i++) {
            $sessionsWithDays[$sessions[$i]] = ['day' => $days[$i]];
        }
        $programme->sessions()->attach($sessionsWithDays); 
    
        // Attach skills
        $skills = $request->input('skills');
        $programme->skills()->attach($skills);

        if ($request->hasFile('image')) {
            $this->programmeRepository->storeFile($programme->id, $request->file('image'));
        }
    
        return redirect()->route('programmes.index')->with('success', 'Programme créé avec succès');  
    }

    public function edit(int $id)
    {
        $programme = $this->programmeRepository->getById($id);
        $sessions = $this->sessionRepository->getAll();
        $skills = $this->skillRepository->getAll();
        return view('Admin.programmes.edit', compact('sessions', 'programme' , 'skills')); 
    }

    public function update(ProgrammeRequest $request, int $id)
    {
        $form = $request->validated();
        $programme = $this->programmeRepository->getById($id);
        $programme->update($form);
    
        // Sync sessions
        $sessions = $request->input('sessions');
        $days = $request->input('days');
        $sessionsWithDays = [];
        for ($i = 0; $i < count($sessions); $i++) {
            $sessionsWithDays[$sessions[$i]] = ['day' => $days[$i]];
        }
        $programme->sessions()->sync($sessionsWithDays); 
    
        // Sync skills
        $skills = $request->input('skills');
        $programme->skills()->sync($skills);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('programme_images', 'public'); 
            $form['image'] = $imagePath; 
        }
    
        return redirect()->route('programmes.index')->with('success', 'La programme a été modifiée avec succès');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->programmeRepository->delete($id);
        return redirect()->route('programmes.index')->with('success', 'La programme a été supprimée avec succès');  
    }

    public function showSessions($id)
    {
        $user = Auth::user();
        
        $programme = $this->programmeRepository->getById($id);
        $sessions = $programme->sessions;
        return view('Admin.programmes.showSessions', compact('programme', 'sessions'));
    }
    

    public function showExercices($session_id)
    {
        $user = Auth::user();
        $abonnements = $this->userRepository->getSubscribedProgrammes($user);

        $session = $this->sessionRepository->getById($session_id);
        $exercices = $session->exercices;

        return view('Admin.programmes.showExercise', compact('abonnements', 'session', 'exercices'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
        $skills = $this->skillRepository->getAll();

        $programmes = $this->programmeRepository->searchByTitle($searchQuery)->paginate(3);

        return view('welcome', compact('programmes', 'skills'));
    }

    public function filter(Request $request)
    {
        $skills = $this->skillRepository->getAll();
        $programmes = $this->programmeRepository->filterBySkills($request->input('skills'))->paginate(3);
        return view('welcome', compact('programmes', 'skills'));
    }
    
    
}
