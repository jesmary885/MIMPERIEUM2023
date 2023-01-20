<?php

namespace App\Http\Livewire\Bonos;

use App\Models\GananciaBono;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class BonoCompra extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $fecha_inicio,$fecha_fin,$vista_registros = 0;

    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function cobrados($value){

        $cobrados = GananciaBono::where('user_id',$value)
           ->where('status','pagado')
           ->where('bono','compra')
           ->sum('total');
           
           return $cobrados;
   }

    public function pendientes($value){

        $pendientes = GananciaBono::where('user_id',$value)
           ->where('status','pendiente')
           ->where('bono','compra')
           ->sum('total');
           
           return $pendientes;
    }

    public function render()
    {
        if($this->fecha_inicio && $this->fecha_fin){
            $fecha_inicio = date("Y-m-d",strtotime($this->fecha_inicio));
            $fecha_fin = date("Y-m-d",strtotime($this->fecha_fin));

            $registros = GananciaBono::where('user_id',auth()->id())
            ->where('status','pagado')
            ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
            ->where('bono','compra')
            ->paginate(15);

            $registro_total_pagados = GananciaBono::where('user_id',auth()->id())
            ->where('status','pagado')
            ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
            ->where('bono','compra')
            ->where('created_at',$fecha_inicio)
            ->count();
        }

        else{

            $registros = GananciaBono::where('user_id',auth()->id())
            ->where('status','pagado')
            ->where('bono','compra')
            ->paginate(15);

            $registro_total_pagados = GananciaBono::where('user_id',auth()->id())
            ->where('status','pagado')
            ->where('bono','compra')
            ->count();
        }
        

       
     
        return view('livewire.bonos.bono-compra',compact('registros','registro_total_pagados'));
    }
}
