<?php

use App\Models\Feedback;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    #[Modelable]    
    public $editId;

    #[Validate('required|string|min:3|max:255', as:'Nama')]
    public $name;
    #[Validate('required|email|max:255')]
    
    public $email;

    #[Validate('required|string|min:3')]
    public $feedback;

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
            $feedback->update([
            'name' => $this->name,
            'email' => $this->email,
            'feedback' => $this->feedback,
            ]);
        } else {
            Feedback::create([
            'name' => $this->name,
            'email' => $this->email,
            'feedback' => $this->feedback,
            ]);
        }
        $this->reset();
        // session()->flash('message', 'Feedback berhasil dikirim!');
    }

    public function resetForm()
    {
        $this->reset();
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