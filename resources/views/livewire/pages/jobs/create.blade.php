<div class="p-6 max-w-7xl mx-auto">
    <h1 class="text-2xl font-semibold mb-6">Create new job posting</h1>

    @if (session()->has('message'))
        <div class="text-green-600 font-medium mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Job Details -->
        <div class="md:col-span-2 space-y-4">
            <div>
                <label class="block text-sm font-medium">Title</label>
                <input wire:model="title" type="text" class="mt-1 w-full rounded border-gray-300" placeholder="Job posting title">
            </div>
            <div>
                <label class="block text-sm font-medium">Description</label>
                <textarea wire:model="description" class="mt-1 w-full rounded border-gray-300" rows="4" placeholder="Job posting description"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Experience</label>
                    <input wire:model="experience" type="text" class="mt-1 w-full rounded border-gray-300" placeholder="Eg. 1-3 Yrs">
                </div>
                <div>
                    <label class="block text-sm font-medium">Salary</label>
                    <input wire:model="salary" type="text" class="mt-1 w-full rounded border-gray-300" placeholder="Eg. 2.75-5 Lacs PA">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Location</label>
                    <input wire:model="location" type="text" class="mt-1 w-full rounded border-gray-300" placeholder="Eg. Remote / Pune">
                </div>
                <div>
                    <label class="block text-sm font-medium">Extra Info</label>
                    <input wire:model="extra" type="text" class="mt-1 w-full rounded border-gray-300" placeholder="Eg. Full Time, Urgent...">
                    <small class="text-gray-400">Comma-separated</small>
                </div>
            </div>
        </div>

        <!-- Company Details -->
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium">Company Name</label>
                <input wire:model="company_name" type="text" class="mt-1 w-full rounded border-gray-300" placeholder="Company Name">
            </div>
            <div>
                <label class="block text-sm font-medium">Logo</label>
                <input wire:model="company_logo" type="file" class="mt-1 w-full">
            </div>
           <!-- Skills -->
            <div class="mb-4">
                <label for="skills" class="block font-semibold text-sm text-gray-700 mb-1">Skills</label>
                <select wire:model="selectedSkills" multiple id="skills" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                    @foreach($skills as $skill)
                        <option value="{{ $skill->name }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                @error('selectedSkills') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

        </div>

        <div class="md:col-span-3">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>
    </form>
</div>