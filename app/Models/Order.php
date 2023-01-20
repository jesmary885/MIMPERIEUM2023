<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    const PENDIENTE = 1;
    const RECIBIDO = 2;
    const ANULADO = 3;

    //Relacion uno a muchos inversa
  /*  public function department(){
        return $this->belongsTo(Department::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }*/

    public function user(){
        return $this->belongsTo(User::class);
    }

}
