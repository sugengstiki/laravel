<?php

use App\Models\Feedback;
use Livewire\Component;

new class extends Component
{
    public $name, $email, $feedback;

    public function save()
    {
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'feedback' => 'required|max:1000',
        ]);
        Feedback::create([
            'name' => $this->name,
            'email' => $this->email,
            'feedback' => $this->feedback,
        ]);
        $this->reset();
        session()->flash('message', 'Feedback berhasil dikirim!');
    }

    //
};
?>

<div>
    {{-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama --}}
    <form wire:submit.prevent="save" class="flex flex-col space-y-4 p-4 bg-gray-100 rounded">
        <label for="name">Nama:</label>
        <input type="text" id="name" wire:model="name" class="border border-gray-300 rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <label for="email">Email:</label>
        <input type="email" id="email" wire:model="email" class="border border-gray-300 rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <label for="feedback">Feedback:</label>
        <textarea id="feedback" wire:model="feedback" class="border border-gray-300 rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Kirim Feedback
        </button>
    </form>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
</div>