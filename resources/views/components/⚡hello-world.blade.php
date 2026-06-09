<?php

use Livewire\Component;

new class extends Component
{
    public $name = 'John Doe';
};
?>

<div class="p-6 lg:p-8 bg-gray-800 dark:bg-gray-100 shadow rounded-lg">
    {{-- Be present above all else. - Naval Ravikant --}}
    <input type="text" wire:model.live="name" class="border border-gray-300 rounded px-4 py-2 mb-4" placeholder="Enter your name">
    <h1 class="text-2xl font-bold">Hello {{ $name }}</h1>
    
</div>