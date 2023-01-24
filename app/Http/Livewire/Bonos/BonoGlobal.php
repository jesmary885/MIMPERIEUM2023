<?php

namespace App\Http\Livewire\Bonos;

use App\Models\GananciaBono;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class BonoGlobal extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public $points_total,$no_rango,$rango_name,$cant_rango,$cobrados,$pendiente ;

    public function mount(){
        $mes = date('m');
        $ano = date('Y');

        if($mes == '01' || $mes == '02' || $mes == '03'){
            $fecha_inicio = $ano.'-01-01';
            $fecha_fin = $ano.'-03-31';
            $this->points_total = Order::where('status','2')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('points_total');
        }

        if($mes == '04' || $mes == '05' || $mes == '06'){
            $fecha_inicio = $ano.'-04-01';
            $fecha_fin = $ano.'-06-30';
            $this->points_total = Order::where('status','2')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('points_total');
        }

        if($mes == '07' || $mes == '08' || $mes == '09'){
            $fecha_inicio = $ano.'-07-01';
            $fecha_fin = $ano.'-09-30';
            $this->points_total = Order::where('status','2')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('points_total');
        }

        if($mes == '10' || $mes == '11' || $mes == '12'){
            $fecha_inicio = $ano.'-10-01';
            $fecha_fin = $ano.'-12-31';
            $this->points_total = Order::where('status','2')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('points_total');
        }

        $user_rango = User::where('id',auth()->id())->first()->rango_id;

        if($user_rango != 1){

            $this->no_rango = 1;
    
            if($user_rango == 2){
                $this->rango_name = 'Diamantes';
                $this->cant_rango = User::where('rango_id',2)->count();
            }

            if($user_rango == 3){
                $this->rango_name = 'Diamantes Corona';
                $this->cant_rango = User::where('rango_id',3)->count();
            }

            if($user_rango == 4){
                $this->rango_name = 'Diamantes Embajador';
                $this->cant_rango = User::where('rango_id',4)->count();
            }

            if($user_rango == 5){
                $this->rango_name = 'Diamantes Imperial';
                $this->cant_rango = User::where('rango_id',4)->count();
            }

            $this->cobrados = GananciaBono::where('user_id',auth()->id())
                ->where('bono','global')
                ->where('status','pagado')
                ->count('total');

            $this->pendiente = GananciaBono::where('user_id',auth()->id())
                ->where('bono','global')
                ->where('status','pendiente')
                ->count('total');
        }

        else{
            $this->no_rango = 0;
        }

    }



    public function render()
    {

        $registros = GananciaBono::where('user_id',auth()->id())
        ->where('bono','global')
        ->paginate(15);



        return view('livewire.bonos.bono-global',compact('registros'));
    }
}
