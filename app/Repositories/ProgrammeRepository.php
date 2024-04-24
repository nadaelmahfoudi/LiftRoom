<?php

namespace App\Repositories;

use App\Models\Programme;
use App\Models\Session;

class ProgrammeRepository implements ProgrammeRepositoryInterface
{
    public function getAll()
    {
        return Programme::all();
    }

    public function getById($id)
    {
        return Programme::findOrFail($id);
    }

    public function create(array $data)
    {
        return Programme::create($data);
    }

    public function update(array $data, $id)
    {
        $programme = Programme::findOrFail($id);
        $programme->update($data);
        return $programme;
    }

    public function delete($id)
    {
        $programme = Programme::findOrFail($id);
        $programme->delete();
    }


    public function storeFile($programmeId, $file)
    {
        $programme = Programme::findOrFail($programmeId);

        $imagePath = $file->store('programme_images', 'public');

        $programme->image = $imagePath;
        $programme->save();

        return $programme;
    }

    public function updateFile($programmeId, $file)
    {
        $programme = Programme::findOrFail($programmeId);

        $imagePath = $file->store('programme_images', 'public');

        $programme->image = $imagePath;
        $programme->save();

        return $programme;
    }

    public function find($id)
    {
        return Programme::find($id);
    }

    public function getAllPaginated($perPage)
    {
        $programmes = Programme::paginate($perPage);
        return $programmes;
    }

    public function getSubscriptions($id){
        $programme = Programme::findOrFail($id);
        return $programme->abonnements;
    }
}
