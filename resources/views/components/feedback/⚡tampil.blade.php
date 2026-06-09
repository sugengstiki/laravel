<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed()]
    public function feedbacks()
    {
        return \App\Models\Feedback::latest()->get();
    }
};
?>

<div>
    {{-- Simplicity is an acquired taste. - Katharine Gerould --}}
    <table class="min-w-full bg-white border border-gray-200 rounded shadow mt-4">
        <thead class="bg-gray-200 border-b border-gray-300 text-sm uppercase font-semibold">
            <tr class="text-gray-700 h-12">
                <th>Nama</th>
                <th>Email</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->feedbacks as $item)
            <tr class="border-b border-gray-300 hover:bg-gray-100 transition-colors duration-200 h-12">
                <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                <td class="px-6 py-4">{{ $item->feedback }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>