<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Repositories\SkillRepository;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    protected $skillRepository;

    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function index()
    {
        $skills = $this->skillRepository->getAll();
        return view('Admin.skills.index', compact('skills'));
    }

    public function create()
    {
        $skills = $this->skillRepository->getAll();
        return view('Admin.skills.create', compact('skills'));
    }

    public function store(SkillRequest $request)
    {
        $validatedData = $request->validated();
        $this->skillRepository->create($validatedData);
        return redirect()->route('skills.index')->with('success', 'Skill added successfully');
    }

    public function show($id)
    {
        $skill = $this->skillRepository->find($id);
        return view('Admin.skills.index', compact('skill'));
    }

    public function edit($id)
    {
        $skill = $this->skillRepository->find($id);
        $skills = $this->skillRepository->getAll();
        return view('Admin.skills.edit', compact('skill', 'skills'));
    }

    public function update(SkillRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->skillRepository->update($validatedData, $id); 
        return redirect()->route('skills.index')->with('success', 'Skill updated successfully');
    }
    

    public function destroy($id)
    {
        $this->skillRepository->delete($id);
        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully');
    }
}
