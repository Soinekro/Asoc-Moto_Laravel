<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventoSocio;
use App\Models\Justificacion;
use App\Models\Socio;
use Illuminate\Http\Request;

class JustificacionController extends Controller
{
    public function index(){
        $justificaciones = Justificacion::all();
        return view('admin.justificaciones.index',compact("justificaciones"));
    }
    public function create(){
        $eventos = EventoSocio::where('fecha_hora','>=',date('Y-m-d'))->orderBy('fecha_hora','asc')->get();
        return view('admin.justificaciones.create',compact("eventos"));
    }
    public function store(Request $request){
        $socio = Socio::where('user_id','=',\Auth::user()->id)->first();

        if ($socio) {
            $justi = Justificacion::create([
                'socio_id'=>$socio,
                'justificacion'=> $request->justificacion,
                'evento_socios_id'=>$request->evento_socios_id
            ]);
        } else {
            return redirect()->route('admin.justificaciones.index')->with('info',"La justificacion no se puede crear, ya que usted debe estar presente como alto miembro");
        }


        return redirect()->route('admin.justificaciones.index')->with('info',"justificacion creada id : $justi->id");
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
