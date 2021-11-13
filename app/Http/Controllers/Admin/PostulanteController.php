<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostulanteRequest;
use App\Http\Requests\Admin\StorePostulanteRequest;
use App\Models\Document;
use App\Models\Postulante;
use App\Models\Socio;
use App\Models\User;

class PostulanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.postulantes.index')->only('index');
        $this->middleware('can:admin.postulantes.destroy')->only('destroy');
        $this->middleware('can:admin.postulantes.create')->only('create', 'store');
        $this->middleware('can:admin.postulantes.edit')->only('update','edit','show');
    }
    public function index()
    {
        $postulantes = Postulante::where('status', '=', 1)
            ->join('users', 'postulantes.user_id', '=', 'users.id')
            ->select('postulantes.*', 'users.name')
            ->orderBy('postulantes.id', 'desc')->get();
        return view('admin.postulantes.index', compact('postulantes'));
    }

    public function create()
    {
        $type_documents = Document::all();
        return view('admin.postulantes.create', compact('type_documents'));
    }

    public function store(PostulanteRequest $request)
    {
        $user = User::where('name', '=', $request->user)->first();
        $postulante = Postulante::where('user_id', '=', $user->id)->first();
        if (isset($postulante)) {
            return back()->withInput($request->all())->with('info', 'El usuario'.$user->name.' ya se Ecuentra Registrado como Postulante');
        } else {
            if ($request->status == 1) {
                $postulante = Postulante::create([
                    'user_id' => $user->id,
                    'document_id' => $request->document_id,
                    'numero' => $request->numero,
                    'celular' => $request->celular,
                    'distrito' => $request->distrito,
                    'direccion' => $request->direccion,
                    'status' => 1,
                ]);
            } else {
                $postulante = Postulante::create([
                    'user_id' => $user->id,
                    'document_id' => $request->document_id,
                    'numero' => $request->numero,
                    'celular' => $request->celular,
                    'distrito' => $request->distrito,
                    'direccion' => $request->direccion,
                    'status' => 2,
                ]);
                $socio = Socio::create([
                    'user_id' => $user->id,
                    'document_id' => $request->document_id,
                    'numero' => $request->numero,
                    'celular' => $request->celular,
                    'distrito' => $request->distrito,
                    'direccion' => $request->direccion,
                ]);
                return redirect()->route('admin.postulantes.index')->with('info', $socio->user->name. 'Creado con exito');
            }
        }
    }

    public function edit(Postulante $postulante)
    {
        $type_documents = Document::all();
        return view('admin.postulantes.edit', compact('postulante', 'type_documents'));
    }

    public function update(StorePostulanteRequest $request, Postulante $postulante)
    {
        $postulante = Postulante::where('id', '=', $postulante->id)->first();
        $postulante->update([
            'document_id' => $request->document_id,
            'numero' => $request->numero,
            'celular' => $request->celular,
            'distrito' => $request->distrito,
            'direccion' => $request->direccion,
            'status' => $request->status
        ]);
        return redirect()->route('admin.postulantes.index')->with('info', $postulante->user->name . " Actualizado con exito");
    }

    public function destroy(Postulante $postulante)
    {
        $postulante->delete();
        return redirect()->route('admin.postulante.index')->with('info', 'Eliminado con exito');
    }
}
