<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobPosting;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $jobs = JobPosting::latest()->paginate(5);

        return view('livewire.pages.jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function delete($id)
    {
        JobPosting::find($id)?->delete();
        $this->resetPage();
    }
}
