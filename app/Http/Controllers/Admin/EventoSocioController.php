<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InviteEvent;
use App\Mail\ContactoMaillable;
use App\Models\EventoSocio;
use App\Models\Socio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventoSocioController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('can:admin.eventos.index')->only('index');
        $this->middleware('can:admin.eventos.destroy')->only('destroy');
        $this->middleware('can:admin.eventos.create')->only('create', 'store');
        $this->middleware('can:admin.eventos.edit')->only('update','edit','show');
    } */
    public function index(){
        return view('admin.eventos.index');
    }
    public function create(){
        return view('admin.eventos.create');
    }
    public function store(Request $request){
        $request->validate([
            'name_evento'=>'required',
            'descripcion_evento'=>'required',
            'fecha_hora'=>'required',
        ]);
        $socios = Socio::where('status','=',1)
        ->join('users','socios.user_id','=','users.id')
        ->pluck('email');
        EventoSocio::create($request->all());
        $evento = new InviteEvent($request->all());
        Mail::to($socios)->send($evento);
        return redirect()->route('admin.eventos.index')->with('info','Evento Creado con Exito');
    }
}
