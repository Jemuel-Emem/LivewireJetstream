<?php

namespace App\Http\Livewire;

use App\Models\cart;
use App\Models\cartlist;
use App\Models\order;
use App\Models\Product;
use Livewire\Component;

class UserHeader extends Component
{
      protected $listeners = ['updateCartCount' => 'getCartItemCount' ];
     protected $listener = ['updateCartCounts' => 'getCartItemCounts' ];

    public $itemtotal = 0;
     public $ordertotal = 0;
    public function render()
    {
        $this->getCartItemCount();
        $this->getCartItemCounts();
        return view('livewire.user-header');
    }

     public function getCartItemCount(){
         $this->itemtotal = cartlist::whereUserId(auth()->user()->id)->count();
     }
     public function getCartItemCounts(){
         $this->ordertotal = order::whereUserId(auth()->user()->id)->count();
     }


}
