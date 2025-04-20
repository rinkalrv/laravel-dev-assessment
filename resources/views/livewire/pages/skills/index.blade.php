<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Left: Table -->
        <div class="md:col-span-2">
            <h2 class="text-2xl font-bold mb-4">Skills</h2>

            <table class="w-full bg-white rounded-lg shadow-sm overflow-hidden">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-700 text-sm uppercase">
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-800 divide-y">
                    @foreach ($skills as $skill)
                        <tr>
                            <td class="px-6 py-3">{{ $skill->name }}</td>
                            <td class="px-6 py-3 text-right space-x-4">
                                <button wire:click="edit({{ $skill->id }})"
                                        class="text-blue-600 hover:underline">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $skill->id }})"
                                        class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="mt-4">
                    {{ $skills->links() }}
                </div>
        </div>

        <!-- Right: Add/Edit Form -->
        <div>
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold mb-4">
                    {{ $editingSkillId ? 'Edit skill' : 'Add new skill' }}
                </h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" wire:model="name"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Skill name">
                </div>

                <div class="flex space-x-2">
                    <button wire:click="save"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        {{ $editingSkillId ? 'Update' : 'Save' }}
                    </button>

                    @if ($editingSkillId)
                        <button wire:click="resetForm"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded">
                            Cancel
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
