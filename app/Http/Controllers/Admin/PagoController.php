<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.pagos.index')->only('index');
        $this->middleware('can:admin.pagos.destroy')->only('destroy');
        $this->middleware('can:admin.pagos.create')->only('create', 'store');
        $this->middleware('can:admin.pagos.edit')->only('update','edit','show');
    }
    public function index(){
        return view('admin.pagos.index');
    }
    public function destroy(Pago $pago){
        return $pago;
        return view('admin.pagos.index');
    }
}
