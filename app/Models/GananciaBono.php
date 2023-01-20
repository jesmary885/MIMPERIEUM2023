<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GananciaBono extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    //Relacion muchos a muchos
    public function ganancia_bono_payments(){
        return $this->belongsToMany(GananciaBonoPayments::class)->withPivot('bono');
    }
}
