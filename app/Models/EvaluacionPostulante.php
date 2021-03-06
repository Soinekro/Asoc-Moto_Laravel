<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionPostulante extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function postulante(){
        return $this->belongsTo(Postulante::class);
    }

    public function socio(){
        return $this->belongsTo(Socio::class);
    }
}
