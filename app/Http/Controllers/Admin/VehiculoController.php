<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\vehiculo\UpdateVehiculoRequest;
use App\Http\Requests\Admin\vehiculo\VehiculoRequest;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.vehiculos.index')->only('index');
        $this->middleware('can:admin.vehiculos.destroy')->only('destroy');
        $this->middleware('can:admin.vehiculos.create')->only('create', 'store');
        $this->middleware('can:admin.vehiculos.edit')->only('update','edit','show');
    }

    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('admin.vehiculos.index',compact('vehiculos'));
    }


    public function create()
    {
        return view('admin.vehiculos.create');
    }

    public function store(VehiculoRequest $request)
    {
        Vehiculo::create($request->all());
        return redirect()->route('admin.vehiculos.index')->with('info','Vehiculo Creado con exito');
    }

    public function edit(Vehiculo $vehiculo)
    {
        return view('admin.vehiculos.edit',compact('vehiculo'));
    }

    public function update(UpdateVehiculoRequest $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->all());
        return redirect()->route('admin.vehiculos.index')->with('info','Vehiculo Actualizado con exito');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('admin.vehiculos.index')->with('info','Vehiculo Eliminado con exito');
    }
}
