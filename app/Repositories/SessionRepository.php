<?php

namespace App\Repositories;

use App\Models\Session;

class SessionRepository implements SessionRepositoryInterface
{
    public function getAll()
    {
        return Session::all();
    }

    public function getById($id)
    {
        return Session::findOrFail($id);
    }

    public function create(array $data)
    {
        return Session::create($data);
    }

    public function update(array $data, $id)
    {
        $session = Session::findOrFail($id);
        $session->update($data);
        return $session;
    }

    public function delete($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();
    }
}
