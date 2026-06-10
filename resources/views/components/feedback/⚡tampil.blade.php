<?php

use App\Models\Feedback;
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

    public $message = '';

    public $deleteId;
    public $showDeleteNotif = false;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteNotif = true;
    }

    public function deleteFeedback()
    {
        Feedback::find($this->deleteId)->delete();
        $this->showDeleteNotif = false;
        $this->deleteId = null;
        $this->message = 'Feedback berhasil dihapus.';
    }
    public function cancelDelete()
    {
        $this->deleteId = null;
        $this->showDeleteNotif = false;
    }

    #[On('pesan')]
    public function pesan($message)
    {
        $this->message = $message;
    }

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
    @if($this->message)
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ $this->message }}
    </div>
    @endif

    <div wire:show="showDeleteNotif" class="fixed inset-0 bg-gray-600/80
overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-6 max-w-md">
            <div class="bg-white rounded-3xl shadow-lg p-8">
                <div class="text-center mb-8">
                    <h2 class="text-xl font-bold text-gray-800">Hapus Feedback</h2>
                    <p class="text-gray-600 py-2">Apakah Anda yakin ingin menghapus feedback
                        ini?</p>
                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" wire:click="cancelDelete">
                        Batal
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:click="deleteFeedback">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    <button wire:click="tambah" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Tambah Feedback
    </button>
    <div wire:show="showModal" class="fixed inset-0 bg-gray-600/80 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-6 max-w-md">
            <div class="bg-white rounded-3xl shadow-lg p-8">
                <livewire:feedback.form wire:model="editId" isEditing="{{ $editId !== null }}" />
            </div>
        </div>
    </div>
    <div class="mt-4">{{ $this->feedbacks->links(data: ['scrollTo' => false]) }}</div>
    <table class="min-w-full bg-white border border-gray-200 rounded shadow mt-4">
        <thead class="bg-gray-200 border-b border-gray-300 text-sm uppercase font-semibold">
            <tr class="text-gray-700 h-12">
                <th>Nama</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->feedbacks as $item)
            <tr class="border-b border-gray-300 hover:bg-gray-100 transition-colors duration-200 h-12">
                <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                <td class="px-6 py-4">{{ $item->feedback }}</td>
                <td class="px-6 py-4">
                    @if($item->gambar)
                        <img src="{{ asset('storage/img/' . $item->gambar) }}" alt="Gambar Feedback" class="h-20 w-auto rounded">
                    @endif
                </td>
                <td>
                    <button wire:click="edit({{ $item->id }})" class="text-blue-500 hover:text-blue-700">
                        Edit
                    </button>
                    <button wire:click="confirmDelete({{ $item->id }})" class="ml-2 text-red-500 hover:text-red-700">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>