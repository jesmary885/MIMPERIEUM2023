<?php

namespace App\Http\Livewire\Financiero;

use App\Models\GananciaBono;
use App\Models\Payment;
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

        $this->disponible = $user->points + $user->points_residual + $user->points_global;
        $dia = date('m');

        if($this->disponible > 0){
            if($dia == 1 || $dia == 2 || $dia == 3 || $dia == 4 || $dia ==5) $this->activar = 1;
        }

        if($this->vista_registros == 0){
            if($this->fecha_inicio && $this->fecha_fin){

                $fecha_inicio = date("Y-m-d",strtotime($this->fecha_inicio));
                $fecha_fin = date("Y-m-d",strtotime($this->fecha_fin));

                $registros = Payment::where('user_id',auth()->id())
                ->where('status','pagado')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->where('description','Pago de comisión')
                ->paginate(15);
            }
            else{
                $registros = Payment::where('user_id',auth()->id())
                ->where('status','pagado')
                ->where('description','Pago de comisión')
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
                ->paginate(15);
            }

            else{
                $registros = Payment::where('user_id',auth()->id())
                ->where('status','pendiente')
                ->paginate(15);

            }

            
        }

        $this->pagado = GananciaBono::where('id',auth()->id())
            ->where('status','pagado')
            ->sum('total');

        

        return view('livewire.financiero.retiro',compact('registros'));
    }

}
