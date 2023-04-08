<?php

namespace App\Http\Livewire;

use App\Models\cartlist;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
class UserTable extends Component
{
    public $product, $cartItem;
    public $search ='';
    use WithPagination;

    public function render()
    {
        //  $this->product=Product::get();
        //  return view('livewire.user-table');
        // return view('livewire.user-table', [
        //     'posts' => Product::paginate(10),
        // ]);
        $search = '%' .$this->search. '%';
        return view('livewire.user-table',[
            'products' => Product::where('name', 'like', $search)->paginate(12),
        ]);

        //  return view('livewire.user-table', [
        //      'product' => Product::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        //  ]);

        // $product = Product::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->get();
        // //  dd($product);
        //  return view('livewire.user-table', ['product' => $product]);
    }

    public function addToCart($id){

        // if(auth()->user()){
        //     //function start

        // }else{
        //     return redirect(route('login'));
        // }

       $data = [
        'user_id' => auth()->user()->id,
        'product_id'=>$id,
       ];
       cartlist::updateOrCreate($data);
       $this->emit('updateCartCount');
       session()->flash('success', 'Product added to cart successfully');
    }
}
