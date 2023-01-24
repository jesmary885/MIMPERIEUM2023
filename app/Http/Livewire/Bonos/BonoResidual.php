<?php

namespace App\Http\Livewire\Bonos;

use App\Models\GananciaBono;
use App\Models\Payment;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class BonoResidual extends Component
{
    use WithPagination;

    public $fecha_inicio,$fecha_fin,$vista_registros = 0;

    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function cobrados($value){

        $cobrados = GananciaBono::where('user_id',$value)
           ->where('bono','residual')
           ->sum('total');
           
           return $cobrados;
   }

    public function pendientes($value){

        $pendientes = GananciaBono::where('user_id',$value)
           ->where('bono','residual')
           ->sum('total');
           
           return $pendientes;
    }


    public function render()
    {

        if($this->fecha_inicio && $this->fecha_fin){

            $fecha_inicio = date("Y-m-d",strtotime($this->fecha_inicio));
            $fecha_fin = date("Y-m-d",strtotime($this->fecha_fin));

            $registros = GananciaBono::where('user_id',auth()->id())
            ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
            ->where('bono','residual')
            ->paginate(15);

        $registro_total_pagados = GananciaBono::where('user_id',auth()->id())
            ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
            ->where('bono','residual')
            ->count();

        }

        else{
            $registros = GananciaBono::where('user_id',auth()->id())
            ->where('bono','residual')
            ->paginate(15);

        $registro_total_pagados = GananciaBono::where('user_id',auth()->id())
            ->where('bono','residual')
            ->count();

        }

        
   
        return view('livewire.bonos.bono-residual',compact('registros','registro_total_pagados'));
    }
}
