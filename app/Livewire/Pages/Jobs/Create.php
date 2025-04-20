<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobPosting;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title, $description, $experience, $salary, $location, $extra, $company_name, $company_logo;
    public $selectedSkills = [];
    public $skills = [];

    public function mount()
    {
        $this->skills = Skill::all();
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'experience' => 'required|string',
            'salary' => 'required|string',
            'location' => 'required|string',
            'extra' => 'nullable|string',
            'company_name' => 'required|string',
            'company_logo' => 'nullable|image|max:1024',
            'selectedSkills' => 'array',
        ]);

        $logoPath = $this->company_logo ? $this->company_logo->store('logos', 'public') : null;

        JobPosting::create([
            'title' => $this->title,
            'description' => $this->description,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'location' => $this->location,
            'extra' => array_map('trim', explode(',', $this->extra)),
            'company_name' => $this->company_name,
            'company_logo' => $logoPath,
            'skills' => $this->selectedSkills,
        ]);

        session()->flash('success', 'Job Posting Created!');
        return redirect()->route('admin.jobs.index');
    }

    public function render()
    {
        return view('livewire.pages.jobs.create');
    }
}

