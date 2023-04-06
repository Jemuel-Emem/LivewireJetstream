<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
class UserTable extends Component
{
    public $product;
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
            'products' => Product::where('name', 'like', $search)->paginate(20),
        ]);

        //  return view('livewire.user-table', [
        //      'product' => Product::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        //  ]);

        // $product = Product::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->get();
        // //  dd($product);
        //  return view('livewire.user-table', ['product' => $product]);
    }
}
