<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PorcentajesController extends Controller
{
    public function index(){
        return view('admin.porcentajes');
    }
}
