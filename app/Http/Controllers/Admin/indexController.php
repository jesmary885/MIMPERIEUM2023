<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GananciaBono;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){

        $user= User::where('id',auth()->id())->first();
        $rango_id = $user->rango_id;
        $rango_nombre = $user->rango->name;
        $directos =  Partner::where('refer_id',auth()->id())->count(); 

        $ganancia_compra = ($user->points * 0.40);
        $ganancia_residual = $user->points_residual;
        $ptos_residual_compra = $user->acum_points;

        $user_directos = Partner::where('refer_id',auth()->id())->get(); 
        $indirectos = 0;
        $cont = 0;
        $cont2 = 0;

        $saldo_disponible = $user->points + $user->points_residual + $user->points_global;

        $saldo_pagado = GananciaBono::where('user_id',auth()->id())
            ->where('status','pagado')
            ->sum('total');

        if($user->rango_id == 1){
            $puntos_faltantes = 20000 - $user->acum_points;
            $porcentaje_total = ($user->acum_points * 100) / 20000;

            $refers_direct = Partner::where('refer_id',auth()->id())
                ->where('status','activo')
                ->count(); 

            if($refers_direct < 6){
                if($porcentaje_total > 80) $porcentaje_total = $porcentaje_total - 10;
            }

            $width_barra = "width:". $porcentaje_total ."%";
        }

        if($user->rango_id == 2){
            $puntos_faltantes = 50000 - $user->acum_points;
            $porcentaje_total = ($user->acum_points * 100) / 50000;

            $refers_direct = Partner::where('refer_id',auth()->id())
                ->where('status','activo')
                ->where('rango_id','2')
                ->count(); 

            if($refers_direct < 6){
                if($porcentaje_total > 80) $porcentaje_total = $porcentaje_total - 10;
            }

            $width_barra = "width:". $porcentaje_total ."%";
        }

        if($user->rango_id == 3){
            $puntos_faltantes = 50000 - $user->acum_points;
            $porcentaje_total = ($user->acum_points * 100) / 200000;

            $refers_direct = Partner::where('refer_id',auth()->id())
                ->where('status','activo')
                ->where('rango_id','3')
                ->count(); 

            if($refers_direct < 6){
                if($porcentaje_total > 80) $porcentaje_total = $porcentaje_total - 10;
            }

            $width_barra = "width:". $porcentaje_total ."%";
        }

        if($user->rango_id == 4){
            $puntos_faltantes = 50000 - $user->acum_points;
            $porcentaje_total = ($user->acum_points * 100) / 500000;

            $refers_direct = Partner::where('refer_id',auth()->id())
                ->where('status','activo')
                ->where('rango_id','4')
                ->count(); 

            if($refers_direct < 6){
                if($porcentaje_total > 80) $porcentaje_total = $porcentaje_total - 10;
            }

            $width_barra = "width:". $porcentaje_total ."%";
        }

        $user_directos = Partner::where('refer_id',auth()->id())->get(); 
        if($user_directos){
            foreach ($user_directos as $user_directo){
                $user_ind0= Partner::where('refer_id',$user_directo->user_id)->get(); 
                if($user_ind0->count()){
                    $indirectos = $indirectos + Partner::where('refer_id',$user_directo->user_id)->count(); //nivel2
                    foreach($user_ind0 as $user_ind2){
                        $user_ind3= Partner::where('refer_id',$user_ind2->user_id)->get();
                        if($user_ind3->count()){
                            $indirectos = $indirectos + Partner::where('refer_id',$user_ind2->user_id)->count();//nivel3
                            foreach($user_ind3 as $user_ind4){
                                $user_ind5= Partner::where('refer_id',$user_ind4->user_id)->get();
                                if($user_ind5->count()){
                                    $indirectos = $indirectos + Partner::where('refer_id',$user_ind4->user_id)->count();//nivel4
                                    foreach($user_ind5 as $user_ind6){
                                        $user_ind7= Partner::where('refer_id',$user_ind6->user_id)->get();
                                        if($user_ind7->count()){
                                            $indirectos = $indirectos + Partner::where('refer_id',$user_ind6->user_id)->count();//nivel5
                                            foreach($user_ind7 as $user_ind8){
                                                $user_ind9= Partner::where('refer_id',$user_ind8->user_id)->get();
                                                if($user_ind9->count()){
                                                    $indirectos = $indirectos + Partner::where('refer_id',$user_ind8->user_id)->count();//nivel6
                                                    foreach($user_ind9 as $user_ind10){
                                                        $user_ind11= Partner::where('refer_id',$user_ind10->user_id)->get();
                                                        if($user_ind11->count()){
                                                            $indirectos = $indirectos + Partner::where('refer_id',$user_ind10->user_id)->count();//nivel7
                                                            foreach($user_ind11 as $user_ind12){
                                                                $user_ind13= Partner::where('refer_id',$user_ind12->user_id)->get();
                                                                if($user_ind13->count()){
                                                                    $indirectos = $indirectos + Partner::where('refer_id',$user_ind12->user_id)->count();//nivel8
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        

        return view('admin.index',compact('indirectos','rango_id','refers_direct','width_barra','porcentaje_total','puntos_faltantes','saldo_disponible','saldo_pagado','rango_nombre','ganancia_compra','ganancia_residual','ptos_residual_compra','directos'));
    }
}
