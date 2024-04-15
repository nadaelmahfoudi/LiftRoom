<?php
namespace App\Repositories;

use App\Models\Exercice;
use App\Models\Exercise;

class ExerciceRepository implements ExerciceRepositoryInterface
{
public function getAll(){
    return Exercice::latest()->paginate(5);
}

public function create(array $data){
    return Exercice::create($data);
}

public function update(array $data,$id){
    $exercice = Exercice::findOrFail($id);
    $exercice->update($data);
    return $exercice;
}

public function delete($id){
    $exercice = Exercice::findOrFail($id);
    $exercice->delete();
}

public function storeFile($exerciceId, $file)
    {
        $exercice = Exercice::findOrFail($exerciceId);

        $imagePath = $file->store('exercice_images', 'public');

        $exercice->image = $imagePath;
        $exercice->save();

        return $exercice;
    }

    public function updateFile($exerciceId, $file)
    {
        $exercice = Exercice::findOrFail($exerciceId);

        $imagePath = $file->store('exercice_images', 'public');

        $exercice->image = $imagePath;
        $exercice->save();

        return $exercice;
    }

    public function find($id)
    {
        return Exercice::find($id);
    }

}