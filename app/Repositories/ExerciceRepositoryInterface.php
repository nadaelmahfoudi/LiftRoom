<?php
namespace App\Repositories;

interface ExerciceRepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function storeFile($exerciceId, $file);

    public function updateFile($exerciceId, $file);

    public function find($id);
}
