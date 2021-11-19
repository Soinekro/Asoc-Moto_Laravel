<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justificacion extends Model
{
    protected $guarded =[
        'id',
        'created_at',
        'updated_at'
    ];
    use HasFactory;

    public function socio(){
        return $this->belongsTo(Socio::class);
    }
    public function evento(){
        return $this->belongsTo(EventoSocio::class,'evento_socios_id');
    }
}
