<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RangoController extends Controller
{
    public function index(){
        return view('admin.rangos.index');
    }

    public function genealogia_residual(){
        return view('admin.genealogia_residual');
    }

    public function genealogia_directo(){
        return view('admin.genealogia_directo');
    }

    //bonos

    public function bono_compra(){
        return view('admin.bono_compra');
    }

    public function bono_residual(){
        return view('admin.bono_residual');
    }

    public function bono_global(){
        return view('admin.bono_global');
    }

    //financiero

    public function balance(){
        return view('admin.balance');
    }

    public function retiro(){
        return view('admin.retiros');
    }

    public function cuentas(){
        return view('admin.cuentas');
    }

    public function solicitud(){
    
        $isopen = 'true';
        return view('admin.solicitud',compact('isopen'));
    }
    //admin

    public function pagos(){
        return view('admin.pagos');
    }

    //contenido de la web

    public function contenido_web(){
        return view('admin.contenido_web');
    }

    //pagos de membresia

    public function pago_membresia(){
        return view('admin.pago_membresia');
    }

}
