<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Console\Command;

class cambiar_status_usuario extends Command
{
    
    protected $signature = 'desactivar_comision:users';

   
    protected $description = 'Command description';

    
    public function __construct()
    {
        parent::__construct();
    }

   
    public function handle()
    {
        $this->warn("Iniciando desactivar_comision..");

        $mes = date('m');
        $ano = date('Y');

        $fecha_inicio = $ano.'-'.$mes.'-01';
        $fecha_fin = $ano.'-'.$mes.'-28';

        $users=User::all();

        foreach ($users as $user){

            if($user->status == 'activo'){
                $points_total = Order::where('status','2')
                ->where('user_id',$user->id)
                ->whereBetween('created_at',[$fecha_inicio,$fecha_fin])
                ->sum('points_total'); // saco el total en categoria de bienestar

                if($points_total < 10){
                    $user->update([
                        'status' => 'inactivo_para_comisionar'
                    ]);

                    $partner = Partner::where('user_id',$user->id)->first();
         
                    $partner->update([
                        'status' => 'inactivo_para_comisionar',
                    ]);
                }
            }
        }

        print("\n");

        $this->info("Listo comando desactivar comisiones.");

        return 0;
    }
}
