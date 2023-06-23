<?php

namespace App\Http\Livewire\Financiero;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class Balance extends Component
{
    use WithPagination;

    public $fecha_inicio,$fecha_fin;

    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        if($this->fecha_inicio && $this->fecha_fin){



            $fecha_inicio = date("Y-m-d",strtotime($this->fecha_inicio));
            $fecha_fin = date("Y-m-d",strtotime($this->fecha_fin));

            $registros = Payment::where('user_id',auth()->id())
            ->where('status','pagado')
            ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
            ->latest('id')
            ->paginate(15);

            $registro_total = Payment::where('user_id',auth()->id())
            ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
            ->where('status','pagado')
            ->count();

            $total_efectivo = Payment::where('user_id',auth()->id())
            ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
            ->where('description','Pago de comisión')
            ->sum('total');

        }

        else{

            $registros = Payment::where('user_id',auth()->id())
            ->where('status','pagado')
            ->latest('id')
            ->paginate(15);

            $registro_total = Payment::where('user_id',auth()->id())
            ->where('status','pagado')
            ->count();

            $total_efectivo = Payment::where('user_id',auth()->id())
            ->where('description','Pago de comisión')
            ->sum('total');
        }
            
      

        return view('livewire.financiero.balance',compact('registros','registro_total','total_efectivo'));
    }
}
