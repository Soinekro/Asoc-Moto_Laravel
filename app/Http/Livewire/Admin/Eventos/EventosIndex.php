<?php

namespace App\Http\Livewire\Admin\Eventos;

use App\Models\EventoSocio;
use Livewire\Component;
use Livewire\WithPagination;

class EventosIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $eventos = EventoSocio::where('name_evento', 'like', '%'.$this->search.'%')
        ->orwhere('descripcion_evento', 'like', '%'.$this->search.'%')
        ->where('fecha_hora','>=','CURDATE()')
        ->orderBy('fecha_hora','ASC')
        ->paginate(10);
        return view('livewire.admin.eventos.eventos-index',compact('eventos'));
    }
}
