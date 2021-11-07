<?php

namespace App\Http\Livewire\Admin\Postulantes;

use App\Models\Postulante;
use Livewire\Component;
use Livewire\WithPagination;

class PostulantesIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $postulantes=Postulante::where('status','=',1)->where('users.name', 'like', '%'.$this->search.'%')->orwhere('users.email', 'like', '%'.$this->search.'%')
        ->join('users', 'postulantes.user_id', '=', 'users.id')
            ->select('postulantes.*', 'users.name as name','users.email as email')
            ->orderBy('postulantes.id', 'desc')->Paginate(8);
        return view('livewire.admin.postulantes.postulantes-index',compact('postulantes'));
    }
}
