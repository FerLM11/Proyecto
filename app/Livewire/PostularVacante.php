<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;
    protected $rules=[
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

       //Almacenar imagen
       $cv= $this->cv->store('public/cv');
       $datos['cv'] = str_replace('public/cv/','', $cv);


        //Crear candidato
        $this->vacante->candidatos()->create([
            'user_id' =>auth()->user()->id,
            'cv' =>$datos['cv']
        ]);

        //Crear notificaciones y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        //Mostrar el usuario mensaje OK
        
        return redirect()->back()->with('mensaje', 'Felicidades! ya te postulaste a esta vacante, tu informacion se envio correctamente');
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
