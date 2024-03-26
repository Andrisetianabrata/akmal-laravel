<?php

namespace App\Http\Livewire;
use App\Models\dataInOut;
use Livewire\Component;
use Livewire\Attributes\On;

class Table extends Component
{
    public function render()
    {
        return view('livewire.table', [
            // 'allData' => dataInOut::orderBy('id', 'desc')->get(),
            'allData' => DataInOut::orderBy('id', 'desc')->get(),
            'latestData' => dataInOut::latest()->first()
        ]);
    }
}
