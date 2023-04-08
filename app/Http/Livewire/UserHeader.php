<?php

namespace App\Http\Livewire;

use App\Models\cart;
use App\Models\cartlist;
use App\Models\Product;
use Livewire\Component;

class UserHeader extends Component
{
    protected $listeners = ['updateCartCount' => 'getCartItemCount' ];
    public $itemtotal = 0;
    public function render()
    {
        $this->getCartItemCount();
        return view('livewire.user-header');
    }

    public function getCartItemCount(){
        $this->itemtotal = cartlist::whereUserId(auth()->user()->id)->count();
    }
}
