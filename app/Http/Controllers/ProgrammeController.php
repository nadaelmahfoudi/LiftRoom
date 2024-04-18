<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Repositories\ProgrammeRepositoryInterface;
use App\Repositories\SessionRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ProgrammeRequest;
use App\Repositories\SkillRepositoryInterface;

class ProgrammeController extends Controller
{
    protected $programmeRepository;
    protected $sessionRepository;
    protected $skillRepository;
    
    public function __construct(ProgrammeRepositoryInterface $programmeRepository, SessionRepositoryInterface $sessionRepository, SkillRepositoryInterface $skillRepository)
    {
        $this->programmeRepository = $programmeRepository;
        $this->sessionRepository = $sessionRepository;
        $this->skillRepository = $skillRepository; 
    }

    public function index()
    {
        $programmes = $this->programmeRepository->getAll();
        return view('Admin.programmes.index', compact('programmes'));
    }

    public function create()
    {
        $sessions = $this->sessionRepository->getAll();
        $skills = $this->skillRepository->getAll();
        return view('Admin.programmes.create', compact('sessions', 'skills'));
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
}
