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
        return "evaluaciones create";
    }
    public function edit($id){
        $evaluacion = EvaluacionPostulante::find($id);
        return "evaluaciones edit $evaluacion";
    }
    public function update(Request $request,$id){

        $evaluacion = EvaluacionPostulante::find($id);

        return "evaluaciones update $evaluacion";
    }
    public function destroy($id){
        $evaluacion = EvaluacionPostulante::find($id);
        $evaluacion->destroy();
        return redirect()->route('admin.evaluaciones.index')->with('info','Evaluacion Eliminada');
    }
}
