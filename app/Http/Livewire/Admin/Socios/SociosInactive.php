<?php

namespace App\Http\Livewire\Admin\Socios;

use App\Models\Socio;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SociosInactive extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $socios = Socio::where('users.name', 'like', '%' . $this->search . '%')->orwhere('users.email', 'like', '%' . $this->search . '%')
            ->join('users', 'socios.user_id', '=', 'users.id')
            ->select('socios.*', 'users.name as name', 'users.email as email')
            ->orderBy('socios.id', 'desc')->Paginate(25);
        return view('livewire.admin.socios.socios-inactive', compact('socios'));
    }
}
