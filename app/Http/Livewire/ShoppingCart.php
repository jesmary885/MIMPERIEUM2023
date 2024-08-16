<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Porcentaje;
use App\Models\User;
use Livewire\Component;
use PDF;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Component
{

    protected $listeners = ['render'];

    public function destroy(){
        Cart::destroy();

        $this->emitTo('dropdown-cart', 'render');
    }

    public function delete($rowID){
        Cart::remove($rowID);
        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }

    public function finish(){

        $user = User::where('id',Auth::id())->first();

        $soles_completos = 0;
        $caracter=",";
        $subtotal_t = (str_replace($caracter,"",Cart::subtotal()));

    
        $total_comisionar = 100;//Porcentaje::first()->monto_activacion;

        if($user->direction != null && $user->phone != null && $user->referencia != null && $user->departamento != null && $user->provincia != null && $user->distrito != null){
            
            if($user->soles_en_mes >= $total_comisionar) $soles_completos = 1;
            
            else{

                /*$puntos_calcular = 0;
        
                foreach (Cart::content() as $item2) {
                    $puntos_calcular = ($item2->options['points'] *  $item2->qty) + $puntos_calcular;
                }*/

                if($subtotal_t >= $total_comisionar) $soles_completos = 1;
            }

            if($soles_completos == 1){
                $fecha = date("d-m-Y");

                $puntos = 0;
                $puntos_category = 0;

                foreach (Cart::content() as $item) {
                    
                    $puntos = ($item->options['points'] *  $item->qty) + $puntos;

                    if($item->options['category'] == 1) $puntos_category = ($item->options['points'] *  $item->qty) + $puntos_category;
                }

                
               

                $order = new Order();
                $order->user_id = auth()->user()->id;
                $order->total = $subtotal_t;
                $order->content = Cart::content();
                $order->status = 1;
                $order->points_total = $puntos;
                $order->points_total_category = $puntos_category;
                $order->save();

                foreach (Cart::content() as $item) {
                    discount($item);
                }

                $data = [
                    'productos' => Cart::content(),
                    'total' => $subtotal_t,
                    'fecha' => $fecha,
                    'nro_orden' => $order->id,  
                    'cliente' =>  auth()->user()->name,
                    'cliente_code' =>  auth()->user()->code,
                ];
            
                $pdf = PDF::loadView('order.exportPdf',$data)->output();

                Cart::destroy();

                return response()->streamDownload(
                    fn () => print($pdf),
                    "Pedido de productos.pdf"
                );

            }

            else{
                $this->emit('errorSize', 'Su orden ha sumado '.$subtotal_t.' Soles, y debe tener un mínimo de '.$total_comisionar.' Soles para ser procesada');
            }
        }

        else{
            $this->emit('errorSize', 'Debe completar todos los datos de su dirección de domicio para procesar su compra');
        }

        
    }

    public function volver(){
        $this->emit('volver');
    }
}
