<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EvaluacionPostulante;
use Illuminate\Http\Request;

class EvaluacionPostulanteController extends Controller
{
    public function index(){
        $evaluaciones = EvaluacionPostulante::paginate(10);
        return view('admin.evaluaciones.index',compact("evaluaciones"));
    }
    public function create(){
        $evaluaciones = EvaluacionPostulante::paginate(10);
        return "evaluaciones create";
    }
}
