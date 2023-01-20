<?php

namespace App\Console\Commands;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Console\Command;

class cambiar_rango extends Command
{
   
    protected $signature = 'cambiar:rango';

    protected $description = 'Cambiar rango de usuario';

   
    public function __construct()
    {
        parent::__construct();
    }

   
    public function handle()
    {
        $this->warn("Iniciando cambio de rango...");

        $users=User::all();

        foreach ($users as $user){

            if($user->rango_id == 1 && $user->acum_points >= 20000){
                
                $refers_direct = Partner::where('refer_id',$user->id)
                    ->where('status','activo')
                    ->count(); 

             
    
                if($refers_direct >= 6){
                    $user->update([
                        'rango_id' => 2,
                        'acum_points' => $user->acum_points - 20000
                    ]);
                }
            }
    
            if($user->rango_id == 2 && $user->acum_points >= 50000){
                $refers_direct = Partner::where('refer_id',$user->id)
                    ->where('status','activo')
                    ->where('rango_id','2')
                    ->count(); 
    
                if($refers_direct >= 6){
                    $user->update([
                        'rango_id' => 3,
                        'acum_points' => $user->acum_points - 50000
                    ]);
                }
            }
    
            if($user->rango_id == 3 && $user->acum_points >= 200000){
                $refers_direct = Partner::where('refer_id',$user->id)
                    ->where('status','activo')
                    ->where('rango_id','3')
                    ->count(); 
    
                if($refers_direct >= 6){
                    $user->update([
                        'rango_id' => 4,
                        'acum_points' => $user->acum_points - 200000
                    ]);
                }
            }
    
            if($user->rango_id == 4 && $user->acum_points >= 500000){
                $refers_direct = Partner::where('refer_id',$user->id)
                    ->where('status','activo')
                    ->where('rango_id','4')
                    ->count(); 
    
                if($refers_direct >= 6){
                    $user->update([
                        'rango_id' => 5,
                        'acum_points' => $user->acum_points - 500000
                    ]);
                }
            }
        }

        print("\n");

        $this->info("Listo cambio de rango.");
        return 0;
    }
}
