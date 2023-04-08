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
        $this->orderitems = order::all();
        return view('livewire.order-table');
    }


}
