<?php

namespace App\Http\Livewire;

use App\Models\cartlist;
use App\Models\comments;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
class UserTable extends Component
{
    public $product, $cartItem, $name,$description, $comments,$price, $stocks,$image, $cartitems ,$sub_id;
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


    public function sendMessage($id){
     Product::where('id',$id)->first();

    }

    public function sendComment($id){

        $data = [
            'id' => $this->$id,
            'comments' =>$this->comments,

           ];
           comments::updateOrCreate($data);
           $this->resetF();
    }

    public function resetF(){
    $this->comments='';
    }
    public function close(){
        $this->dispatchBrowserEvent('close-modal');
    }

}
