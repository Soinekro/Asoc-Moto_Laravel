<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index(){
        return view('admin.pagos.index');
    }
    public function destroy(Pago $pago){
        return $pago;
        return view('admin.pagos.index');
    }
}
