<?php

namespace App\Http\Livewire\Admin\Pagos;

use App\Models\Pago;
use Livewire\Component;
use Livewire\WithPagination;

class PagosIndex extends Component
{
    use WithPagination;
    protected $listeners =['render'=>'render'];
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $pagos = Pago::where('users.name', 'like', '%'.$this->search.'%')->orwhere('pagos.concepto', 'like', '%'.$this->search.'%')
        ->join('socios', 'pagos.socio_id', '=', 'socios.id')
        ->join('users','socios.user_id','=','users.id')
            ->select('pagos.*', 'users.name as name')
            ->orderBy('pagos.id', 'desc')->Paginate(10);
        return view('livewire.admin.pagos.pagos-index',compact('pagos'));
    }
}
