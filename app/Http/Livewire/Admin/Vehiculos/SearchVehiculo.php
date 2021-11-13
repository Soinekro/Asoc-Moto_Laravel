<?php

namespace App\Http\Livewire\Admin\Vehiculos;

use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class SearchVehiculo extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $socios = Socio::where('users.name', 'like', '%'.$this->search.'%')->orwhere('users.email', 'like', '%'.$this->search.'%')
        ->join('users', 'socios.user_id', '=', 'users.id')
            ->select('socios.*', 'users.name as name','users.email as email')
            ->orderBy('socios.id', 'desc')->Paginate(10);
        return view('livewire.admin.vehiculos.search-vehiculo',compact('socios'));
    }
}
