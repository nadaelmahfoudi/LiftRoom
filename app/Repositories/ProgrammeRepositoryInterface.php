<?php

namespace App\Repositories;

use App\Models\Session;

interface ProgrammeRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function storeFile($programmeId, $file);

    public function updateFile($programmeId, $file);

    public function getAllPaginated($perPage);

    public function getSubscriptions($id);
    
    public function searchByTitle($query);
}
