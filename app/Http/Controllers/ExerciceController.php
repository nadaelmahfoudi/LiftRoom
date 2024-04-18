<?php
namespace App\Http\Controllers;

use App\Http\Requests\ExerciceRequest;
use App\Models\Exercice;
use App\Repositories\ExerciceRepositoryInterface;
use Illuminate\Http\Request;

class ExerciceController extends Controller
{
    protected $exerciceRepository;

    public function __construct(ExerciceRepositoryInterface $exerciceRepository)
    {
        $this->exerciceRepository = $exerciceRepository;
    }

    public function index()
    {
        $exercices = $this->exerciceRepository->getAll();
        
        return view('Admin.Exercices.index', compact('exercices'));
    }

    public function create()
    {
        return view('Admin.Exercices.create');
    }


    public function store(ExerciceRequest $request)
    {
        $exercice = $this->exerciceRepository->create($request->validated());

        if ($request->hasFile('image')) {
            $this->exerciceRepository->storeFile($exercice->id, $request->file('image'));
        }

        return redirect()->route('exercices')->with('success', 'Exercice created successfully.');
    }

    public function show($id)
    {
        $exercice = $this->exerciceRepository->find($id);

        return view('Admin.Exercices.show', compact('exercice'));
    }

    public function edit($id)
    {
        $exercice = $this->exerciceRepository->find($id);

        return view('Admin.Exercices.edit', compact('exercice'));
    }


    public function update(ExerciceRequest $request, $id)
    {
        $exerciceData = $request->validated();
        
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('exercice_images', 'public'); 
            $exerciceData['image'] = $imagePath; 
        }
    
        
        $this->exerciceRepository->update($exerciceData, $id);
    
        return redirect()->route('exercices')->with('success', 'Exercice updated successfully.');
    }

    public function destroy($id)
    {
        $this->exerciceRepository->delete($id);
        
        return redirect()->route('exercices')->with('success', 'Company deleted successfully.');
    }

   public function showExercises()
    {
        $exercices = $this->exerciceRepository->getAll();
        return view('Exercises', compact('exercices'));
    }
}

