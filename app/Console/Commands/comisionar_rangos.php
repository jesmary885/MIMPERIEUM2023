<?php

namespace App\Console\Commands;

use App\Models\GananciaBono;
use App\Models\Order;
use App\Models\User;
use Illuminate\Console\Command;

class comisionar_rangos extends Command
{

    protected $signature = 'comisionar:global';

    protected $description = 'Comisionar rango global';

  
    public function __construct()
    {
        parent::__construct();
    }

   
    public function handle()
    {

        $this->warn("Iniciando comision de rango global..");

        print("\n");

        $mes = date('m');
        $ano = date('Y');

        $comision_rango_2 = 0;
        $comision_rango_3 = 0;
        $comision_rango_4 = 0;
        $comision_rango_5 = 0;

        $users=User::all();

        if($mes == '01' || $mes == '02' || $mes == '03'){
            $fecha_inicio = $ano.'-01-01';
            $fecha_fin = $ano.'-03-31';
            $points_total = Order::where('status','2')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('points_total');
        }

        if($mes == '04' || $mes == '05' || $mes == '06'){
            $fecha_inicio = $ano.'-04-01';
            $fecha_fin = $ano.'-06-30';
            $points_total = Order::where('status','2')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('points_total');
        }

        if($mes == '07' || $mes == '08' || $mes == '09'){
            $fecha_inicio = $ano.'-07-01';
            $fecha_fin = $ano.'-09-30';
            $points_total = Order::where('status','2')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('points_total');
        }

        if($mes == '10' || $mes == '11' || $mes == '12'){
            $fecha_inicio = $ano.'-10-01';
            $fecha_fin = $ano.'-12-31';
            $points_total = Order::where('status','2')
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('points_total');
        }

        $cant_rango_2 = User::where('rango_id',2)->count();
        $cant_rango_3 = User::where('rango_id',3)->count();
        $cant_rango_4 = User::where('rango_id',4)->count();
        $cant_rango_5 = User::where('rango_id',5)->count();

        if($cant_rango_2 > 0) $comision_rango_2 = ($points_total * 0.025) / $cant_rango_2;
        if($cant_rango_3 > 0) $comision_rango_3 = ($points_total * 0.025) / $cant_rango_3;
        if($cant_rango_4 > 0) $comision_rango_4 = ($points_total * 0.025) / $cant_rango_4;
        if($cant_rango_5 > 0) $comision_rango_5 = ($points_total * 0.025) / $cant_rango_5;

        foreach ($users as $user){

            $ganancia_blono_global = GananciaBono::where('user_id',$user->id)
                ->where('status','solicitado')
                ->where('bono','global')
                ->first();

            $ganancia_blono_global_pendiente = GananciaBono::where('user_id',$user->id)
                ->where('status','pendiente')
                ->where('bono','global')
                ->first();
        
            if(!$ganancia_blono_global && !$ganancia_blono_global_pendiente){
                if($user->rango_id == 2){
                    $user->update([
                        'points_global' => $comision_rango_2,
                    ]);

                    $ganancia_blono_user = new GananciaBono;
                    $ganancia_blono_user->user_id = $user->id;
                    $ganancia_blono_user->status = 'pendiente';
                    $ganancia_blono_user->description = 'Comisión del 2.5% del valor en puntos de ventas de la compañia, entre'. $cant_rango_2 .' persona(s) del rango Diamante';
                    $ganancia_blono_user->bono = 'global';
                    $ganancia_blono_user->total = $comision_rango_2;
                    $ganancia_blono_user->save();
                }
                if($user->rango_id == 3  && !$ganancia_blono_global_pendiente){
                    $user->update([
                        'points_global' => $comision_rango_3,
                    ]);

                    $ganancia_blono_user = new GananciaBono;
                    $ganancia_blono_user->user_id = $user->id;
                    $ganancia_blono_user->status = 'pendiente';
                    $ganancia_blono_user->description = 'Comisión del 2.5% del valor en puntos de ventas de la compañia, entre'. $cant_rango_3 .' persona(s) del rango Corona';
                    $ganancia_blono_user->bono = 'global';
                    $ganancia_blono_user->total = $comision_rango_3;
                    $ganancia_blono_user->save();
                }
                if($user->rango_id == 4  && !$ganancia_blono_global_pendiente){
                    $user->update([
                        'points_global' => $comision_rango_4,
                    ]);

                    $ganancia_blono_user = new GananciaBono;
                    $ganancia_blono_user->user_id = $user->id;
                    $ganancia_blono_user->status = 'pendiente';
                    $ganancia_blono_user->description = 'Comisión del 2.5% del valor en puntos de ventas de la compañia, entre'. $cant_rango_4 .' persona(s) del rango Embajador';
                    $ganancia_blono_user->bono = 'global';
                    $ganancia_blono_user->total = $comision_rango_4;
                    $ganancia_blono_user->save();
                }
                if($user->rango_id == 5  && !$ganancia_blono_global_pendiente){
                    $user->update([
                        'points_global' => $comision_rango_5,
                    ]);

                    $ganancia_blono_user = new GananciaBono;
                    $ganancia_blono_user->user_id = $user->id;
                    $ganancia_blono_user->status = 'pendiente';
                    $ganancia_blono_user->description = 'Comisión del 2.5% del valor en puntos de ventas de la compañia, entre'. $cant_rango_5 .' persona(s) del rango Imperial';
                    $ganancia_blono_user->bono = 'global';
                    $ganancia_blono_user->total = $comision_rango_5;
                    $ganancia_blono_user->save();
                }
            }
        }

        $this->info("Listo comando de comision de rango global.");

        return 0;
    }
}
