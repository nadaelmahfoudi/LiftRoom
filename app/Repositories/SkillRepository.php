<?php

namespace App\Repositories;

use App\Models\Skill;

class SkillRepository implements SkillRepositoryInterface
{
    public function getAll()
    {
        return Skill::latest()->paginate(5);
    }

    public function create(array $data)
    {
        return Skill::create($data);
    }

    public function update(array $data, $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update($data);
        return $skill;
    }
    
    public function delete($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
    }

    public function find($id)
    {
        return Skill::find($id);
    }
}
