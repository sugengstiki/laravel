<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $editId;
    public $showModal = false;

    #[On('closeModal')]
    public function closeModal()
    {
        $this->showModal = false;
    }
    public function tambah()
    {
        $this->showModal = true;
    }
    public function edit($id)
    {
        $this->editId = $id;
        $this->showModal = true;
    }

    public function delete($id)
    {
        \App\Models\Feedback::destroy($id);
    }
    #[Computed()]
    public function feedbacks()
    {
        return \App\Models\Feedback::latest()->paginate(10);
    }
};
?>

<div>
    {{-- Simplicity is an acquired taste. - Katharine Gerould --}}

    <button wire:click="tambah" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Tambah Feedback
    </button>
    <div wire:show="showModal">
        <livewire:feedback.form wire:model="editId" isEditing="{{ $editId !== null }}" />
    </div>
    <div class="mt-4">{{ $this->feedbacks->links(data: ['scrollTo' => false]) }}</div>
    <table class="min-w-full bg-white border border-gray-200 rounded shadow mt-4">
        <thead class="bg-gray-200 border-b border-gray-300 text-sm uppercase font-semibold">
            <tr class="text-gray-700 h-12">
                <th>Nama</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->feedbacks as $item)
            <tr class="border-b border-gray-300 hover:bg-gray-100 transition-colors duration-200 h-12">
                <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                <td class="px-6 py-4">{{ $item->feedback }}</td>
                <td>
                    <button wire:click="edit({{ $item->id }})" class="text-blue-500 hover:text-blue-700">
                        Edit
                    </button>
                    <button wire:click="delete({{ $item->id }})" class="ml-2 text-red-500 hover:text-red-700">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>