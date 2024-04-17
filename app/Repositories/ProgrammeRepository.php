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
}