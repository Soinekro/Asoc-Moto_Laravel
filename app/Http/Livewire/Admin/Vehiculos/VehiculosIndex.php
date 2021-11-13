<?php

namespace App\Http\Livewire\Admin\Vehiculos;

use App\Models\Vehiculo;
use Livewire\Component;
use Livewire\WithPagination;

class VehiculosIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $vehiculos = Vehiculo::where('users.name', 'like', '%'.$this->search.'%')->orwhere('users.email', 'like', '%'.$this->search.'%')
        ->join('socios', 'vehiculos.socio_id', '=', 'socios.id')
        ->join('users','socios.user_id','=','users.id')
            ->select('vehiculos.*', 'users.name as name','users.email as email')
            ->orderBy('socios.id', 'desc')->Paginate(10);
        return view('livewire.admin.vehiculos.vehiculos-index',compact('vehiculos'));
    }
}
