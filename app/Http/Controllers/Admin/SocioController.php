<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostulanteRequest;
use App\Models\Document;
use App\Models\Postulante;
use App\Models\Socio;
use Illuminate\Support\Facades\DB;

class SocioController extends Controller
{
    public function index()
    {
        $socios = DB::table('socios')->join('users', 'socios.user_id', '=', 'users.id')
        ->select('socios.*', 'users.name')
        ->orderBy('socios.id', 'desc')->Paginate(10);
        return view('admin.socios.index', compact('socios'));
    }

    public function edit(Socio $socio)
    {
        $type_documents = Document::all();
        return view('admin.socios.edit', compact('socio', 'type_documents'));
    }

    public function update(StorePostulanteRequest $request, Socio $socio)
    {

        return $request;/* if ($request->status == 1) {
            $postulante = Postulante::create([
                'user_id' => $socio->id,
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
        return redirect()->route('admin.postulante.index')->with('info',$socio->user->name." Actualizado con exito");
    */
    }

    public function destroy(Socio $socio)
    {
        $socio->delete();
        return redirect()->route('admin.postulante.index')->with('info', 'Eliminado con exito');
    }
}
