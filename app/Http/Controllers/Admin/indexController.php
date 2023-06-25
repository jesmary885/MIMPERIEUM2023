<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GananciaBono;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Payment;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){

        $user= User::where('id',auth()->id())->first();
        $rol_user = $user->roles->first()->id;


        if($user->status == "activo"){

            $date = new DateTime();
            $fecha_actual = date("Y-m-d H:i:s");

            $fecha_actual= new DateTime($fecha_actual);

            $proxima_fecha = strtotime($user->last_activate);

            $mes_restantes = date("m",$proxima_fecha);
            $dias_restantes = date("d",$proxima_fecha);
            $horas_restantes = date("H",$proxima_fecha);
            $minutos_restantes = date("I",$proxima_fecha);
            $ano_restantes = date("Y",$proxima_fecha);
        }

        else{

            $mes_restantes = 0;
            $dias_restantes = 0;
            $horas_restantes = 0;
            $minutos_restantes = 0;
            $ano_restantes = 0;
        }

        // ------------ DASHBOARD DEL ADMINISTRADOR

        $mes= date('m');
        $ano= date('Y');
        $dia= date('d');

        $ptos_diarios = Order::where('status','2')
        ->whereDay('created_at', $dia)
        ->whereMonth('created_at', $mes)
        ->whereYear('created_at', $ano)
        ->sum('points_total');

        if($mes == '1' || $mes == '2' || $mes == '3'){
            $mes1 = '1';
            $mes2 = '2';
            $mes3 = '3';
        }

        if($mes == '4' || $mes == '5' || $mes == '6'){
            $mes1 = '4';
            $mes2 = '5';
            $mes3 = '6';
        }

        if($mes == '7' || $mes == '8' || $mes == '9'){
            $mes1 = '7';
            $mes2 = '8';
            $mes3 = '9';
        }

        if($mes == '10' || $mes == '11' || $mes == '12'){
            $mes1 = '10';
            $mes2 = '11';
            $mes3 = '12';
        }

            $ptos_mes_1 = Order::where('status','2')
            ->whereMonth('created_at', $mes1)
            ->whereYear('created_at', $ano)
            ->sum('points_total');

            $ptos_mes_2 = Order::where('status','2')
            ->whereMonth('created_at', $mes2)
            ->whereYear('created_at', $ano)
            ->sum('points_total');

            $ptos_mes_3 = Order::where('status','2')
            ->whereMonth('created_at', $mes3)
            ->whereYear('created_at', $ano)
            ->sum('points_total');

        $ptos_trimestre = $ptos_mes_1 + $ptos_mes_2  + $ptos_mes_3;

        $ptos_anual = Order::where('status','2')
        ->whereYear('created_at', $ano)
        ->sum('points_total');

        $ptos_total = Order::where('status','2')
        ->sum('points_total');

        $af_mes= User::whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->count();

        $af_act_mes=User::where('status','activo')
            ->count();

        $af_total=User::count();

        $af_rango=User::where('status','activo')
        ->where('rango_id','!=','1')
        ->count();

        $c_pagar_mes= GananciaBono::where('status','!=','pagado')
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->sum('total');

        $c_pendientes_cobrar= GananciaBono::where('status','!=','pagado')
            ->sum('total');

        $c_pagadas_mes= Payment::where('status','pagado')
            ->where('description','Pago de comisión')
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->sum('total');

        $c_pagadas_ano= Payment::where('status','pagado')
            ->where('description','Pago de comisión')
            ->whereYear('created_at', $ano)
            ->sum('total');

        $c_pagadas_total=Payment::where('status','pagado')
            ->where('description','Pago de comisión')
            ->sum('total');

        $facturacion_dia = Order::where('status','2')
            ->whereDay('created_at', $dia)
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->sum('total');

        $facturacion_mes = Order::where('status','2')
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->sum('total');

        $facturacion_ano=Order::where('status','2')
            ->whereYear('created_at', $ano)
            ->sum('total');

        $facturacion_total= Order::where('status','2')
            ->sum('total');

        for($it=0; $it<=12; $it++){

            if($it==0){
                $y_enero = Order::where('status','2')
                    ->whereMonth('created_at', '01')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Enero', 'y' => $y_enero];
            }
            if($it==1){
                $y_feb = Order::where('status','2')
                    ->whereMonth('created_at', '02')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Febrero', 'y' => $y_feb ];
            }
            if($it==2){
                $y_mar = Order::where('status','2')
                    ->whereMonth('created_at', '03')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Marzo', 'y' => $y_mar];
            }
            if($it==3){

                $y_abril = Order::where('status','2')
                    ->whereMonth('created_at', '04')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Abril', 'y' => $y_abril];
            }
            if($it==4){

                $y_mayo = Order::where('status','2')
                    ->whereMonth('created_at', '05')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Mayo', 'y' => $y_mayo];
            }
            if($it==5){

                $y_jun = Order::where('status','2')
                    ->whereMonth('created_at', '06')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Junio', 'y' => $y_jun];
            }
            if($it==6){

                $y_jul = Order::where('status','2')
                    ->whereMonth('created_at', '07')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Julio', 'y' => $y_jul];
            }
            if($it==7){

                $y_agosto = Order::where('status','2')
                    ->whereMonth('created_at', '08')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Agosto', 'y' => $y_agosto];
            }
            if($it==8){

                $y_sep = Order::where('status','2')
                    ->whereMonth('created_at', '09')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Septiembre', 'y' => $y_sep];
            }
            if($it==9){

                $y_oct = Order::where('status','2')
                    ->whereMonth('created_at', '10')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Octubre', 'y' => $y_oct];
            }
            if($it==10){

                $y_nov = Order::where('status','2')
                    ->whereMonth('created_at', '11')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Noviembre', 'y' => $y_nov];
            }
            if($it==11){

                $y_dic = Order::where('status','2')
                    ->whereMonth('created_at', '12')
                    ->whereYear('created_at', $ano)
                    ->sum('total');

                $puntos[]=['name' => 'Diciembre', 'y' => $y_dic];
            }
        }

        $data2 = json_encode($puntos);


        //-------------FIN DEL ADMINISTRADOR

        $code_user = $user->code;
        $rango_id = $user->rango_id;
        $rango_nombre = $user->rango->name;
        $directos =  Partner::where('refer_id',auth()->id())->count(); 

        $ganancia_compra = ($user->points * 0.10);
        $ganancia_global = $user->points_global;
        $ganancia_residual = $user->points_residual;
        $ptos_residual_compra = $user->acum_points;

        $users_diamantes = User::where('rango_id','2')->count();
        $users_corona = User::where('rango_id','3')->count();
        $users_embajador = User::where('rango_id','4')->count();
        $users_imprerial = User::where('rango_id','5')->count();

        $user_directos = Partner::where('refer_id',auth()->id())->get(); 
        $indirectos = 0;
        $cont = 0;
        $cont2 = 0;

        $saldo_disponible = ($user->points * 0.10) + $user->points_residual + $user->points_global;

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


        return view('admin.index',compact('ano_restantes','minutos_restantes','mes_restantes','dias_restantes','horas_restantes','user','users_diamantes','users_corona','users_embajador','users_imprerial','c_pendientes_cobrar','ptos_diarios','ptos_trimestre','ptos_anual','ptos_total','facturacion_dia','facturacion_mes','facturacion_ano','facturacion_total','data2','rol_user','ganancia_global','code_user','indirectos','rango_id','refers_direct','width_barra','porcentaje_total','puntos_faltantes','saldo_disponible','saldo_pagado','rango_nombre','ganancia_compra','ganancia_residual','ptos_residual_compra','directos','c_pagar_mes','c_pagadas_mes','c_pagadas_ano','c_pagadas_total','af_mes','af_act_mes','af_total','af_rango'));
    }
}
