<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacante;



class MostarVacantes extends Component
{
    protected $listeners =['eliminarVacante'];
    public function eliminarVacante(Vacante $vacante)
    {
        $vacante->delete();
    }
    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.mostar-vacantes', [
            'vacantes' => $vacantes 
        ]);
    }
}
