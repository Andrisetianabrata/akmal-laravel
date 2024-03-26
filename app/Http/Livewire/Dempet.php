<?php

namespace App\Http\Livewire;

use App\Models\DataFrontClose;
use Livewire\Component;

class Dempet extends Component
{
    public function render()
    {
        return view('livewire.dempet',[
            'allData' => DataFrontClose::orderBy('id', 'desc')->get(),
            'latestData' => DataFrontClose::latest()->first()
        ]);
    }
}
