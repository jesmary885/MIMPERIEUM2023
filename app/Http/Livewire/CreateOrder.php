<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class CreateOrder extends Component
{

    public $envio_type = 1;

    public $contact, $phone, $address, $references, $shipping_cost = 0;

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
      //  'envio_type' => 'required'
    ];

    public function mount(){
        //$this->departments = Department::all();
    }

    public function updatedEnvioType($value){
      /*  if ($value == 1) {
            $this->resetValidation([
                'department_id', 'city_id', 'district_id', 'address', 'references'
            ]);
        }*/
    } 


  /*  public function updatedDepartmentId($value){
        $this->cities = City::where('department_id', $value)->get();

        $this->reset(['city_id', 'district_id']);
    }


    public function updatedCityId($value){

        $city = City::find($value);

        $this->shipping_cost = $city->cost;

        $this->districts = District::where('city_id', $value)->get();

        $this->reset('district_id');
    }*/


    public function create_order(){

       

        $rules = $this->rules;

      /*  if($this->envio_type == 2){
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['address'] = 'required';
            $rules['references'] = 'required';
        }*/

       /* $this->validate($rules);

        $puntos = 0;

        foreach (Cart::content() as $item) {
            
            $puntos = ($item->options['points'] *  $item->qty) + $puntos;
        }


        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        //$order->envio_type = $this->envio_type;
        $order->shipping_cost = 0;
        $order->total = $this->shipping_cost + Cart::subtotal();
        $order->points_total = $puntos;
        $order->content = Cart::content();
        $order->save();

        foreach (Cart::content() as $item) {
            discount($item);
        }

        Cart::destroy();

        return redirect()->route('orders.payment', $order);*/
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}

