<?php

namespace App\Http\Livewire;
use App\Models\cartlist;
use App\Models\order;
use Livewire\Component;

class OrderTable extends Component
{

    public $orderitems;
    public function render()
    {
        $this->orderitems = order::with('product')
        ->where(['user_id'=>auth()->user()->id])->get();
        return view('livewire.order-table');
    }


}
