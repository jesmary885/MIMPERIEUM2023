<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithPagination;

class GenealogiaDirecto extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function partner_name ($value){

        $user_refer = Partner::where('user_id',$value)->first();

        if($user_refer) return $user_refer->user->name;
        else return '-';

    }

    public function partner_code ($value){

        $user_refer = Partner::where('user_id',$value)->first();

        if($user_refer) return $user_refer->user->code;
        else return '-';

    }

    public function refer_count($value){
        $refers_direct = Partner::where('refer_id',$value)->count(); 
        return $refers_direct;

    }

    public function render()
    {
        $refers_direct = Partner::with('refer')
            ->where('refer_id',auth()->id())
            ->paginate(6); 

        return view('livewire.admin.genealogia-directo',compact('refers_direct'));
    }
}
