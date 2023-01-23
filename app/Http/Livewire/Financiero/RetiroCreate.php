<?php

namespace App\Http\Livewire\Financiero;

use App\Models\GananciaBono;
use App\Models\Payment;
use App\Models\RetirementAccount;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class RetiroCreate extends Component
{
    use WithFileUploads;

    public $isopen = false,$pdf,$disponible;

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'pdf' => 'required'
    ];

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

    public function render()
    {

        $user_solicitante = User::where('id',auth()->id())->first();

        $this->disponible = ($user_solicitante->points * 0.40) + $user_solicitante->points_residual  + $user_solicitante->points_global;
        return view('livewire.financiero.retiro-create');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        $url = $this->pdf->store('pdfs');

        $solicitud= new Payment();
        $solicitud->user_id = auth()->id();
        $solicitud->description = 'Pago de comisión';
        $solicitud->total = $this->disponible;
        $solicitud->status = 'pendiente';
        $solicitud->pdf = $url;
        $solicitud->save();


        $user = User::where('id',auth()->id())->first();

        /*if($user->points_global > 0){
            $ganancia_bono_global = new GananciaBono();
            $ganancia_bono_global->user_id = $user->id;
            $ganancia_bono_global->status = 'pendiente';
            $ganancia_bono_global->description = 'Comisión por bono global';
            $ganancia_bono_global->bono = 'global';
            $ganancia_bono_global->total = $user->points_global;
            $ganancia_bono_global->save();
        }*/

        $user->update([
                'points' => 0,
                'points_residual' => 0,
                'points_global' => 0,
            ]);

        $ganancia_bonos = GananciaBono::where('user_id',auth()->id())
            ->where('status','pendiente')
            ->get();

        foreach($ganancia_bonos as $ganancia_bono){
            $ganancia_bono->update([
                'status'=>'solicitado',
            ]);
        }

        
                
        $this->reset(['isopen','pdf']);
        $this->emitTo('financiero.retiro','render');

    }
}
