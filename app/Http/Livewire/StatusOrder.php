<?php

namespace App\Http\Livewire;

use App\Models\GananciaBono;
use App\Models\Partner;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StatusOrder extends Component
{

    public $order, $status,$puntos_guardados,$puntos_acumulados,$user_refer1,$user_refer2,$user_refer3,$user_refer4,$user_refer5,$user_refer6;

    public function mount(){
        $this->status = $this->order->status;
        $user_select = User::where('id',$this->order->user_id)->first();
        $this->puntos_guardados = $user_select->points;
        $this->puntos_acumulados = $user_select->acum_points;
    }

    public function add_points_partners($value,$ptos_order,$order_id){
        $user_refer = Partner::where('user_id',$value)->first(); //ubico a la persona en tabla partner
        $cont = 0;

        do{
            if($cont == 0){//actualizando el primer nivel por encima mio el 5%

                $user1= User::where('id',$user_refer->refer_id)->first();
                
                $user1->update([
                    'points_residual' => ($ptos_order * 0.05) + $user1->points_residual,
                    'acum_points' =>  $user1->acum_points + $ptos_order
                ]);

                /*User::find($user_refer->refer_id)
                ->increment('points_residual',($ptos_order * 0.05));*/

                $ganancia_bono = new GananciaBono();
                $ganancia_bono->user_id = $user_refer->refer_id;
                $ganancia_bono->order_id = $order_id;
                $ganancia_bono->status= 'pendiente';
                $ganancia_bono->bono= 'residual';
                $ganancia_bono->total= ($ptos_order * 0.05);
                $ganancia_bono->description= 'Comisión del 5% por compra de '.$ptos_order.' puntos, de referido '.$user_refer->refer->name;
                $ganancia_bono->save();

                $cont=$cont+1;
            }
            elseif($cont == 1){ //nivel 2
                    //voy a buscar el patrocinador de su patrocinador
                    $this->user_refer1 = Partner::where('user_id',$user_refer->refer_id)->first();

                    if($this->user_refer1){

                      $user2= User::where('id',$this->user_refer1->refer_id)->first();
                
                      $user2->update([
                          'points_residual' => ($ptos_order * 0.05) + $user2->points_residual,
                          'acum_points' =>  $user2->acum_points + $ptos_order
                      ]);
                      
                      $cont=$cont+1;

                        $ganancia_bono = new GananciaBono();
                        $ganancia_bono->user_id = $this->user_refer1->refer_id;
                        $ganancia_bono->order_id = $order_id;
                        $ganancia_bono->status= 'pendiente';
                        $ganancia_bono->bono= 'residual';
                        $ganancia_bono->total= ($ptos_order * 0.06);
                        $ganancia_bono->description= 'Comisión del 6% por compra de '.$ptos_order.' puntos, de referido '.$user_refer->refer->name;
                        $ganancia_bono->save();
                    }
                    else $cont = 6;
            }

            elseif($cont == 2){
               //nivel 3
                    //voy a buscar el patrocinador de su patrocinador
                    $this->user_refer2 = Partner::where('user_id',$this->user_refer1->refer_id)->first();

                    if($this->user_refer2){
                        $user3= User::where('id',$this->user_refer2->refer_id)->first();
                
                        $user3->update([
                            'points_residual' => ($ptos_order * 0.05) + $user3->points_residual,
                            'acum_points' =>  $user3->acum_points + $ptos_order
                        ]);
                        
                        $cont=$cont+1;

                        $ganancia_bono = new GananciaBono();
                        $ganancia_bono->user_id = $this->user_refer2->refer_id;
                        $ganancia_bono->order_id = $order_id;
                        $ganancia_bono->status= 'pendiente';
                        $ganancia_bono->bono= 'residual';
                        $ganancia_bono->total= ($ptos_order * 0.07);
                        $ganancia_bono->description= 'Comisión del 7% por compra de '.$ptos_order.' puntos, de referido '.$user_refer->refer->name;
                        $ganancia_bono->save();
                    }
                    else $cont = 6;
            }

            elseif($cont == 3){ //nivel 4
               
                    //voy a buscar el patrocinador de su patrocinador
                    $this->user_refer3 = Partner::where('user_id',$this->user_refer2 ->refer_id)->first();

                    if($this->user_refer3 ){
                        $user4= User::where('id',$this->user_refer3->refer_id)->first();
                
                        $user4->update([
                            'points_residual' => ($ptos_order * 0.05) + $user4->points_residual,
                            'acum_points' =>  $user4->acum_points + $ptos_order
                        ]);
                        $cont=$cont+1;

                        $ganancia_bono = new GananciaBono();
                        $ganancia_bono->user_id = $this->user_refer3->refer_id;
                        $ganancia_bono->order_id = $order_id;
                        $ganancia_bono->status= 'pendiente';
                        $ganancia_bono->bono= 'residual';
                        $ganancia_bono->total= ($ptos_order * 0.08);
                        $ganancia_bono->description= 'Comisión del 8% por compra de '.$ptos_order.' puntos, de referido '.$user_refer->refer->name;
                        $ganancia_bono->save();
                    }
                    else $cont = 6;
            }

            elseif($cont == 4){ //nivel 5
             
                //voy a buscar el patrocinador de su patrocinador
                $this->user_refer4 = Partner::where('user_id',$this->user_refer3->refer_id)->first();

                if($this->user_refer4 ){
                        $user5= User::where('id',$this->user_refer4->refer_id)->first();
                
                        $user5->update([
                            'points_residual' => ($ptos_order * 0.05) + $user5->points_residual,
                            'acum_points' =>  $user5->acum_points + $ptos_order
                        ]);

                        $cont=$cont+1;

                        $ganancia_bono = new GananciaBono();
                        $ganancia_bono->user_id = $this->user_refer4->refer_id;
                        $ganancia_bono->order_id = $order_id;
                        $ganancia_bono->status= 'pendiente';
                        $ganancia_bono->bono= 'residual';
                        $ganancia_bono->total= ($ptos_order * 0.09);
                        $ganancia_bono->description= 'Comisión del 9% por compra de '.$ptos_order.' puntos, de referido '.$user_refer->refer->name;
                        $ganancia_bono->save();
                    }
                else $cont = 6;
            }

            else{ 
                
                //nivel 6
                    //voy a buscar el patrocinador de su patrocinador

                    $user6= User::where('id',$this->user_refer4->refer_id)->first();
                
                    $user6->update([
                            'points_residual' => ($ptos_order * 0.05) + $user6->points_residual,
                            'acum_points' =>  $user6->acum_points + $ptos_order
                        ]);

                    if($this->user_refer5){

                        User::find($this->user_refer5->refer_id)->increment('points_residual',($ptos_order * 0.10),'acum_points',$ptos_order);
                        $cont=$cont+1;

                        $ganancia_bono = new GananciaBono();
                        $ganancia_bono->user_id = $this->user_refer5->refer_id;
                        $ganancia_bono->order_id = $order_id;
                        $ganancia_bono->status= 'pendiente';
                        $ganancia_bono->bono= 'residual';
                        $ganancia_bono->description= 'Comisión del 10% por compra de '.$ptos_order.' puntos, de referido '.$user_refer->refer->name;
                        $ganancia_bono->total= ($ptos_order * 0.10);
                        $ganancia_bono->save();

                        $cont = 6;
                    }
                else $cont = 6;
            }
           /* else{ //nivel 7
         
                    //voy a buscar el patrocinador de su patrocinador
                    $this->user_refer6 = Partner::where('user_id',$this->user_refer5->refer_id)->first();

                    if($this->user_refer6){
                        
                       $user7= User::where('id',$this->user_refer6->refer_id)->first();
                
                        $user7->update([
                            'points_residual' => ($ptos_order * 0.05) + $user7->points_residual,
                            'acum_points' =>  $user7->acum_points + $ptos_order
                        ]);
                       
                       $cont=$cont+1;

                        $ganancia_bono = new GananciaBono();
                        $ganancia_bono->user_id = $this->user_refer6->refer_id;
                        $ganancia_bono->order_id = $order_id;
                        $ganancia_bono->status= 'pendiente';
                        $ganancia_bono->bono= 'residual';
                        $ganancia_bono->total= ($ptos_order * 0.11);
                        $ganancia_bono->description= 'Comisión del 11% por compra de '.$ptos_order.' puntos, de referido '.$user_refer->refer->name;
                        $ganancia_bono->save();
                    }

                    else $cont = 6;
            }*/
        }
        while($cont != 6);

    }

    public function update(){

        if($this->order->status != $this->status){
            $this->order->status = $this->status;
            $this->order->save();
    
            //Agregando puntos al usuario de la compra
            if($this->status == 2){
                $user = User::where('id',$this->order->user_id)->first();
                $this->add_points_partners($user->id,$this->order->points_total,$this->order->id);
    
                $puntos_totales = $this->puntos_guardados + $this->order->points_total;
                $puntos_acumu = $this->puntos_acumulados + $puntos_totales;
    
                if($user->status == 'inactivo_para_comisionar'){
                    $items = json_decode($this->order->content);
                    $count_points = 0;
    
                    foreach($items as $item){
                        if($item->options->category == 1){
                            $count_points = $count_points + $item->options->points;
                        }
                    }
    
                    if($count_points >= 10){
                        $user->update([
                            'status' => 'activo'
                        ]);
    
                        $partner = Partner::where('user_id',$user->id)->first();
                        $partner->update([
                            'status' => 'activo',
                        ]);
    
                    }
                }
    
                $user->update([
                    'points' => $puntos_totales,
                    'acum_points' => $puntos_acumu
                ]);
    
                $ganancia_bono = new GananciaBono();
                $ganancia_bono->user_id = $this->order->user_id;
                $ganancia_bono->order_id = $this->order->id;
                $ganancia_bono->status= 'pendiente';
                $ganancia_bono->bono= 'compra';
                $ganancia_bono->total= ($this->order->points_total * 0.40);
                $ganancia_bono->save();
    
                $payment = new Payment();
                $payment->user_id = $this->order->user_id;
                $payment->description = 'Compra de producto';
                $payment->status= 'pagado';
                $payment->total= $this->order->total;
                $payment->save();
            }
        
            if($this->status == 3){
                $items = json_decode($this->order->content);
    
                foreach($items as $item){
                    $producto = Product::where('id',$item->id)->first();
                    $new_quantity = $producto->quantity + $item->qty;
    
                    $producto->update([
                        'quantity' => $new_quantity,
                    ]);
                }
            }
    
            return redirect(route('admin.orders.index'));

        }
      
       
    }

    public function render()
    {

        //dd($this->order->content);

        $items = json_decode($this->order->content);
        $envio = json_decode($this->order->envio);

        return view('livewire.status-order', compact('items', 'envio'));
        
    }
}
