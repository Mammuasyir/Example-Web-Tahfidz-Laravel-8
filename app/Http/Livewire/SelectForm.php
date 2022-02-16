<?php

namespace App\Http\Livewire;

use App\Models\jenjang;
use App\Models\Kelas;
use Livewire\Component;

class SelectForm extends Component
{
    public $jenjang;
    public $kelas = [];
    


    public function render()
    {
        if (!empty($this->jenjang)) {
            $this->kelas = jenjang::where('kelas_id', $this->jenjang)->get();
        }

        $kelas = Kelas::orderBy('kelas')->get();
        return view('livewire.select-form')
        ->with([
            'kelas' => $kelas
        ]);
    }
}
