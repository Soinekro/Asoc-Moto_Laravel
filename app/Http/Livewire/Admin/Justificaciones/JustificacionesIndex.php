<?php

namespace App\Http\Livewire\Admin\Justificaciones;

use App\Models\Justificacion;
use Livewire\Component;
use Livewire\WithPagination;

class JustificacionesIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $justificaciones = Justificacion::orwhere('name_evento', 'like', '%'.$this->search.'%')
        ->orwhere('name', 'like', '%'.$this->search.'%')
        ->join('evento_socios','justificacions.evento_socios_id','=','evento_socios.id')
        ->join('socios','justificacions.socio_id','=','socios.id')
        ->join('users','socios.user_id','=','users.id')
        ->paginate(10)
        ;
        return view('livewire.admin.justificaciones.justificaciones-index',compact('justificaciones'));
    }
}
