<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use App\Models\Skill;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name;
    public $editingSkillId = null;

    protected $rules = [
        'name' => 'required|string|max:255'
    ];

    public function render()
    {
        $skills = Skill::latest()->paginate(5);

        return view('livewire.pages.skills.index', [
            'skills' => $skills,
        ]);
    }

    public function save()
    {
        $this->validate();

        if ($this->editingSkillId) {
            Skill::findOrFail($this->editingSkillId)->update(['name' => $this->name]);
        } else {
            Skill::create(['name' => $this->name]);
        }

        $this->resetForm();
        $this->resetPage();
    }

    public function edit($id)
    {
        $skill = Skill::find($id);
        $this->name = $skill->name;
        $this->editingSkillId = $id;
    }

    public function delete($id)
    {
        Skill::find($id)?->delete();
        $this->resetPage();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->editingSkillId = null;
    }
}
