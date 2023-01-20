<?php

namespace App\Http\Livewire\Admin;

use App\Models\GananciaBono;
use App\Models\GananciaBonoPayments;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Pagos extends Component
{

    public $fecha_inicio,$select=1,$search,$vista_registros = 0,$buscador, $pagados, $pagados_soles, $pendientes, $pendientes_soles, $total_registros;

    public $createForm = [
        'registros_pendientes' => [],
    ];
    
    protected $listeners = ['render' => 'render'];

    public function render()
    {
      
        $this->pendientes = Payment::where('status','pendiente')->count();
        $this->pendientes_soles  = Payment::where('status','pendiente')->sum('total');
        $this->pagados = Payment::where('status','pagado')->count();
        $this->pagados_soles  = Payment::where('status','pagado')->sum('total');
      

        if($this->vista_registros == 0){
            $registros_pendientes = Payment::whereHas('user',function(Builder $query){
                $query->where('name','LIKE', '%' . $this->search . '%')
                    ->orwhere('code','LIKE', '%' . $this->search . '%');
            })
            ->where('status','pendiente')
            ->paginate(15);
            $registros = [];

            if($this->createForm['registros_pendientes'] == []) $this->select = 1;

            $this->total_registros = Payment::whereHas('user',function(Builder $query){
                $query->where('name','LIKE', '%' . $this->search . '%')
                    ->orwhere('code','LIKE', '%' . $this->search . '%');
            })
            ->where('status','pendiente')
            ->count();

        }

        if($this->vista_registros == 1){

            $registros = Payment::whereHas('user',function(Builder $query){
                $query->where('name','LIKE', '%' . $this->search . '%')
                    ->orwhere('code','LIKE', '%' . $this->search . '%');
            })
            ->where('status','pagado')
            ->paginate(15);

            $this->total_registros = Payment::whereHas('user',function(Builder $query){
                $query->where('name','LIKE', '%' . $this->search . '%')
                    ->orwhere('code','LIKE', '%' . $this->search . '%');
            })
            ->where('status','pagado')->count();

            $registros_pendientes=[];
        }

        return view('livewire.admin.pagos',compact('registros','registros_pendientes'));
    }

    public function select_select(){
       
        $registros_pendientes_get = Payment::where('status','pendiente')->get();

        $i = 0;
        foreach($registros_pendientes_get as $rpg){
            $this->createForm['registros_pendientes'][$i] = $rpg->id;
            $i++;
        }

        $this->select = 2;
    }

    public function no_select_select(){
        $this->createForm['registros_pendientes'] = [];
        $this->select = 1;
    }

    public function save(){

        foreach($this->createForm['registros_pendientes'] as $registro_pagar){
            $r_p =  Payment::where('id',$registro_pagar)->first();

            $r_p->update([
                'status' => 'pagado'
            ]);

            $r_g_b = GananciaBono::where('user_id',$r_p->user_id)
                ->where('status','solicitado')
                ->get();
            
            foreach($r_g_b as $r){
                $r->update([
                    'status' => 'pagado'
                ]);

                $ganancia_bono_payment= new GananciaBonoPayments();
                $ganancia_bono_payment->ganancia_bono_id= $r->id;
                $ganancia_bono_payment->payment_id = $r_p->id;
                $ganancia_bono_payment->bono = $r->bono;
                $ganancia_bono_payment->save();
                
            }
        }

        $this->createForm['registros_pendientes'] = [];
        $this->emitTo('admin.pagos','render');
    }

    public function download($value){
        $url = storage_path('app/public/'.str_replace('-', '/', $value));
        return response()->download($url);
    }
}
