<?php

namespace App\Http\Livewire\Admin;

use App\Models\PagosMembresia;
use App\Models\Partner;
use App\Models\User;
use Livewire\Component;

class PagoMembresia extends Component
{
    public $registroSelect;

    public $vista_registros = 0,$buscador, $procesados, $pendientes, $total_registros;

    public $createForm = [
        'registros_pendientes' => [],
    ];

    protected $listeners = ['render' => 'render', 'confirmacion' => 'confirmacion'];

    public function render()
    {

        if($this->vista_registros == 0){

            $registros = PagosMembresia::where('status','pendiente')
            ->paginate(15);

        }
        else{

            $registros = PagosMembresia::where('status','procesado')
            ->paginate(15);
        }


        return view('livewire.admin.pago-membresia',compact('registros'));
    }

    public function download($value){
        $url = storage_path('app/public/'.str_replace('-', '/', $value));
        return response()->download($url);
    }

    public function comment($comentario){
        $this->emit('comment',$comentario);
    }

    public function confirmar($registroId){

        $this->registroSelect = PagosMembresia::where('id',$registroId)->first();
        
        $this->emit('confirm', 'Esta seguro de confirmar la recepción del pago de membresía de ' .$this->registroSelect->user->name. '?' ,'admin.pago-membresia','confirmacion','Se ha procesado correctamente');
    }

    public function confirmacion(){

        $this->registroSelect->update([
            'status' => 'procesado'
        ]);

        $fecha_actual = date("Y-m-d H:i:s");

        $user = User::where('id',$this->registroSelect->user_id)->first();

        $proxima_fecha = date("Y-m-d H:i:s",strtotime($fecha_actual."+ 1 month"));

        $user->update([
            'status' => 'activo',
            'last_activate' =>  $proxima_fecha,
        ]);

        $partner = Partner::where('user_id',$user->id)->first();

        $partner->update([
            'status' => 'activo',
        ]);

    }

}
