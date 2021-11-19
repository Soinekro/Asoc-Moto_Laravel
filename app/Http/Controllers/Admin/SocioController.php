<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostulanteRequest;
use App\Models\Document;
use App\Models\Postulante;
use App\Models\Socio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.socios.index')->only('index');
        $this->middleware('can:admin.socios.create')->only('create', 'store');
        $this->middleware('can:admin.socios.edit')->only('update', 'edit');
        $this->middleware('can:admin.socios.inactivos')->only('inactivos');
    }
    public function index()
    {
        $socios = DB::table('socios')->join('users', 'socios.user_id', '=', 'users.id')
            ->select('socios.*', 'users.name')
            ->orderBy('socios.id', 'desc')->Paginate(10);
        return view('admin.socios.index', compact('socios'));
    }
    public function inactivos()
    {
        $sociosIna = Socio::where('status', '==', 2)
            ->join('users', 'socios.user_id', '=', 'users.id')
            ->select('socios.*', 'users.name as name', 'users.email as email')
            ->orderBy('socios.id', 'desc')->Paginate(10);
        $socios = Socio::where('status', '=', 2)
            ->join('users', 'socios.user_id', '=', 'users.id')
            ->select('socios.*', 'users.name as name', 'users.email as email')
            ->orderBy('socios.id', 'desc')->Paginate(10);;
        return view('admin.socios.inactive', compact('socios', 'sociosIna'));
    }

    public function edit(Socio $socio)
    {
        $type_documents = Document::all();
        return view('admin.socios.edit', compact('socio', 'type_documents'));
    }

    public function update(Request $request, Socio $socio)
    {
        $socio->update($request->all());
        return redirect()->route('admin.socios.index')->with('info', $socio->user->name . " Actualizado con exito");
    }

    public function destroy(Socio $socio)
    {
        $socio->delete();
        return redirect()->route('admin.socios.index')->with('info', 'Eliminado con exito');
    }
}
