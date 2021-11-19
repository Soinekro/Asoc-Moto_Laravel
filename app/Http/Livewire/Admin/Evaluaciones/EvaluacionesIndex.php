<?php

namespace App\Http\Livewire\Admin\Evaluaciones;

use App\Models\EvaluacionPostulante;
use Livewire\Component;
use Livewire\WithPagination;

class EvaluacionesIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $evaluaciones=EvaluacionPostulante::where('users.name', 'like', '%'.$this->search.'%')
        ->join('postulantes', 'evaluacion_postulantes.postulante_id','=','postulantes.id')
        ->join('users', 'postulantes.user_id', '=', 'users.id')
            ->select('evaluacion_postulantes.*')
            ->orderBy('postulantes.id', 'desc')->Paginate(8);
        return view('livewire.admin.evaluaciones.evaluaciones-index', compact('evaluaciones'));
    }
}
