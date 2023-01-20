<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GananciaBonoPayments extends Model
{
    use HasFactory;

    protected $table = "ganancia_bono_payments";
    
    protected $guarded = ['id','created_at','updated_at'];

    //Relacion uno a mucos inversa

    public function ganancia_bono(){
        return $this->belongsTo(GananciaBono::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

}
