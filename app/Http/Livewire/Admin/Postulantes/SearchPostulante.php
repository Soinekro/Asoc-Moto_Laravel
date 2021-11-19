<?php

namespace App\Http\Livewire\Admin\Postulantes;

use App\Models\Postulante;
use App\Models\User;
use Livewire\Component;

class SearchPostulante extends Component
{
    public $search;

    public function render()
    {
        $postulantes = User::where('name', 'like', '%'.$this->search.'%')->paginate(4);
        return view('livewire.admin.postulantes.search-postulante',compact('postulantes'));
    }
}
