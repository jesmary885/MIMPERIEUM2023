<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Partner;
use App\Models\User;
use DateTime;
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

        $date = new DateTime();
        $fecha_actual = date("Y-m-d H:i:s");
        $fecha_actual= new DateTime($fecha_actual);

        $users=User::all();

        foreach ($users as $user){

            if($user->status == 'activo'){

             
                $proxima_fecha= new DateTime($user->last_activate);

                if($fecha_actual > $proxima_fecha){

                    $fecha_sumada_2 = $proxima_fecha->modify('+2 days');

                    if($fecha_sumada_2 > $fecha_actual) {
                        $user->update([
                            'status' => 'activo_dia_gracia'
                        ]);

                    }
                    else{

                        $user->update([
                            'status' => 'inactivo'
                        ]);

                        $partner = Partner::where('user_id',$user->id)->first();
         
                        $partner->update([
                            'status' => 'inactivo',
                        ]);

                        }
                    

                    
                }
            }
        }

        print("\n");

        $this->info("Listo comando desactivar comisiones.");

        return 0;
    }
}
