<?php

namespace App\Http\Livewire;

use App\Models\cart;
use App\Models\cartlist;
use App\Models\order;
use Livewire\Component;

class CartTable extends Component
{
    public $cartitems, $sub_total = 0, $total = 0, $shipping = 0, $name,$price,$image=null, $quantity , $stocks;

    public function render()
    {
        $this->cartitems = cartlist::with('product')
        ->where(['user_id'=>auth()->user()->id])->get();

        $this->total = 0; $this->sub_total = 0; $this->shipping = 100;
        foreach($this->cartitems as $cart){
            $this->sub_total += $cart->product->price *$cart->quantity;
        }
        $this->total = $this->sub_total + $this->shipping;
        return view('livewire.cart-table');
    }

    public function incrementQty($id){
        $cart = cartlist::whereId($id)->first();
        $cart->quantity +=1;
        $cart->save();
    }

    public function decrementQty($id){
        $cart = cartlist::whereId($id)->first();
        $cart->quantity -=1;
        $cart->save();
    }

    public function deleteItem($id){
        $cart = cartlist::whereId($id)->first();
        $cart->delete();
        $this->emit('updateCartCount');
        session()->flash('success', 'Product remove successfully');
    }

    public function deleteCart($id){
        $cart = cartlist::whereId($id)->first();
        $cart->delete();
        $this->emit('updateCartCount');

    }


    public function checkOut($id){

        $this->cartitems = cartlist::with('product')
        ->where(['user_id'=>auth()->user()->id])->get();
        foreach($this->cartitems as $cart){
            $this->name = $cart->product->name;
            $this->price = $cart->product->price;
            $this->image = $cart->product->image;
            $this->quantity =$cart->quantity;
            $this->stocks = $cart->product->stocks ;
        }
        $data = [
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name,
            'product_id'=>auth()->user()->id,
            'product_name'=>$this->name,
            'item_price' =>$this->price,
            'item_quantity' =>$this->quantity,
            'item_stocks' =>$this->stocks,
            'total_fee' =>$this->total,
            'item_image' => $this->image,

           ];

           order::updateOrCreate($data);
           $this->emit('updateCartCounts');
           $this->deleteCart($id);
           session()->flash('success', 'Processing your order');

        }
    }

