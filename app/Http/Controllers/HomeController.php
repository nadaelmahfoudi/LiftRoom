<?php

namespace App\Http\Controllers;

use App\Repositories\ProgrammeRepositoryInterface;
use App\Repositories\SkillRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $skillRepository;
    protected $programmeRepository;

    public function __construct(SkillRepositoryInterface $skillRepository, ProgrammeRepositoryInterface $programmeRepository)
    {
        $this->skillRepository = $skillRepository;
        $this->programmeRepository = $programmeRepository;
    }
    public function index(){
        $programmes = $this->programmeRepository->getAllPaginated(3); 
        $skills = $this->skillRepository->getAll();
        return view('welcome', compact('programmes','skills'));
    }
}
