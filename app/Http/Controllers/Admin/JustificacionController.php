<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Justificacion;
use Illuminate\Http\Request;

class JustificacionController extends Controller
{
    public function index(){
        $justificaciones = Justificacion::all();
        return view('admin.justificaciones.index',compact("justificaciones"));
    }
    public function create(){
        return "justi create";
    }
    public function store(){
        return "justi store";
    }
    public function edit(){
        return "justi create";
    }
    public function update(){
        return "justi create";
    }
    public function destroy(){
        return "justi destroy";
    }
}
