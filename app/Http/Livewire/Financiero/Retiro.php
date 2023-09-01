<?php

namespace App\Http\Livewire\Financiero;

use App\Models\GananciaBono;
use App\Models\Payment;
use App\Models\Porcentaje;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Retiro extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $disponible,$pagado,$vista_registros = 1,$activar=0,$fecha_inicio,$fecha_fin;


    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $user = User::where('id',auth()->id())->first();

        $porcentaje_bono_compra = (Porcentaje::first()->bono_compra) / 100;

        $this->disponible = ($user->points*$porcentaje_bono_compra) + $user->points_residual + $user->points_global;
        
        $dia = date('l');

        if($this->disponible > 0){
            
            //if($dia == 'Sunday') 
            if($dia == 'Friday') 
            {
                $this->activar = 1;
            }
        }
        else{
            $this->activar = 0;
        }

        if($this->vista_registros == 0){
            if($this->fecha_inicio && $this->fecha_fin){

                $fecha_inicio = date("Y-m-d",strtotime($this->fecha_inicio));
                $fecha_fin = date("Y-m-d",strtotime($this->fecha_fin));

                $registros = Payment::where('user_id',auth()->id())
                ->where('status','pagado')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->where('description','Pago de comisión')
                ->latest('id')
                ->paginate(15);
            }
            else{
                $registros = Payment::where('user_id',auth()->id())
                ->where('status','pagado')
                ->where('description','Pago de comisión')
                ->latest('id')
                ->paginate(15);
            }
        }
        else{

            if($this->fecha_inicio && $this->fecha_fin){
                
                $fecha_inicio = date("Y-m-d",strtotime($this->fecha_inicio));
                $fecha_fin = date("Y-m-d",strtotime($this->fecha_fin));

                $registros = Payment::where('user_id',auth()->id())
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->where('status','pendiente')
                ->latest('id')
                ->paginate(15);
            }

            else{
                $registros = Payment::where('user_id',auth()->id())
                ->where('status','pendiente')
                ->latest('id')
                ->paginate(15);

            }

            
        }

        $this->pagado = GananciaBono::where('id',auth()->id())
            ->where('status','pagado')
            ->sum('total');

        

        return view('livewire.financiero.retiro',compact('registros'));
    }

}
