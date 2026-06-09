<?php

use App\Models\Feedback;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    #[Modelable]
    public $editId;

    #[Validate('required|string|min:3|max:255', as: 'Nama')]
    public $name;
    #[Validate('required|email|max:255')]

    public $email;

    #[Validate('required|string|min:3')]
    public $feedback;

    #[Validate('image|max:1024')] // 1MB Max
    public $gambar;

    public function hydrate()
    {
        if ($this->editId) {
            $feedback = Feedback::findOrFail($this->editId);
            $this->name = $feedback->name;
            $this->email = $feedback->email;
            $this->feedback = $feedback->feedback;
        } else {
            $this->reset(['name', 'email', 'feedback']);
        }
    }

    public function save()
    {
        if ($this->editId) {
            $feedback = Feedback::findOrFail($this->editId);
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'feedback' => $this->feedback,
            ];
            if ($this->gambar) {
                $filename = $this->gambar->getClientOriginalName();
                $this->gambar->storeAs('img', $filename, 'public');
                $data['gambar'] = $filename;
            }
            $feedback->update($data);
        } else {
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'feedback' => $this->feedback,
                'user_id' => auth()->id(),
            ];
            if ($this->gambar) {
                $filename = $this->gambar->getClientOriginalName();
                $this->gambar->storeAs('img', $filename, 'public');
                $data['gambar'] = $filename;
            }
            Feedback::create($data);
        }
        $this->reset();
        $this->dispatch('pesan', message: 'Feedback berhasil dikirim!')
            ->to('feedback.tampil');
        $this->dispatch('closeModal')->to('feedback.tampil');
        // session()->flash('message', 'Feedback berhasil dikirim!');
    }

    public function resetForm()
    {
        $this->reset();
        $this->dispatch('closeModal')->to('feedback.tampil');
    }

    //
};
?>

<div>
    {{-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama --}}
    <h2>{{ $editId ? 'Edit' : 'Tambah' }} Feedback</h2>
    <form wire:submit.prevent="save" class="flex flex-col space-y-4 p-4 bg-gray-100 rounded">
        <form wire:submit.prevent="save">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="name" wire:model="name" class="border border-gray-300 rounded px-4 py-2">
                @error('name') {{ $message }} @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" wire:model="email" class="border border-gray-300 rounded px-4 py-2">
                @error('email') {{ $message }} @enderror
            </div>
            <div>
                <label for="feedback" class="block text-sm font-medium text-gray-700">Feedback:</label>
                <textarea id="feedback" wire:model="feedback" class="border border-gray-300 rounded px-4 py-2"></textarea>
                @error('feedback') {{ $message }} @enderror
            </div>
            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar:</label>
                <input type="file" id="gambar" wire:model="gambar" class="border border-gray-300 rounded px-4 py-2 w-full">
                @error('gambar')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @if($gambar
            instanceof
            \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
            <div class="mt-2">
                <img
                    src="{{ $gambar->temporaryUrl() }}"
                    alt="Preview"
                    class="h-20 w-auto rounded">
            </div>
            @endif
            @if($editId && is_string($gambar))
            <div class="mt-2">
                <img
                    src="{{ asset('storage/img/' . $gambar) }}"
                    alt="Gambar Feedback"
                    class="h-20 w-auto rounded">
            </div>
            @endif
            <div class="flex space-x-2 justify-end">

                <button type="button" wire:click="resetForm" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Batal
                </button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Kirim Feedback
                </button>
            </div>
        </form>
</div>