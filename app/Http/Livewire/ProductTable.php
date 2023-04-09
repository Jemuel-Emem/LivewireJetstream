<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $deleteId = '';
    protected $listeners = ['deleteConfirmed' => 'deleteItem'];

    public $search, $product, $sub_id;
    public $image, $name,$description,$price,$stocks;
    public function render()
    {
        // $search = '%' .$this->search. '%';
        // $this->product=Product::where('name', 'like', $search)->get();
        // return view('livewire.product-table');
        //  return view('livewire.product-table',[
        //     'product' => Product::search('name','like', $this->search)->paginate(10),
        // ]);

        $search = '%' .$this->search. '%';
        return view('livewire.product-table',[
            'products' => Product::where('name', 'like', $search)->paginate(10),
        ]);
    }

    public function storeProduct(){

        $this->validate([
            'image' =>'required',
            'name' => 'required', //students = table name
            'price' => 'required|integer',
            'description' => 'required|max:30',
            'stocks' => 'required|integer'

        ]);


        $product = new Product();
        //   $product->image = $this-> image;
        $product->image=$this->image->store('photos','public');
        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->stocks = $this->stocks;
        $product->save();
        session()->flash('message', 'Data was added successfully!');
        $this->resetFields();

    }

    public function edit($id)
    {

        $product = Product::where('id',$id)->first();
        $this->sub_id = $product->id; //we need this for updating the id
        $this->id = $id;
        $this->image = $product->image;
        $this->name = $product->name;
        $this->price= $product->price;
        $this->description= $product->description;
        $this->stocks = $product->stocks;


    }

    public function update()
   {
       $this->validate([

        'image' =>'required|mimes:jpeg,png,jpg,gif',
        'name' => 'required', //students = table name
        'price' => 'required|integer',
        'description' => 'required|max:30',
        'stocks' => 'required|integer'

       ]);
       $product =Product::where('id', $this->sub_id)->first();
       $product->image =$this->image->store('photos','public');
       $product->name = $this->name;
       $product->price = $this->price;
       $product->description = $this->description;
       $product->stocks = $this->stocks;
       $product->save();
    //    session()->flash('message', 'Data was update successfully!');
       return redirect('dashboard');
       //For hide modal after add student success


   }

    public function close(){
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetFields(){
        $this->image=null;
        $this->name='';
        $this->price='';
        $this->description='';
        $this->stocks='';

    }

    public function deleteConfirmation ($id)
    {
        $this->deleteId= $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteItem(){
        $product = product::where('id', $this->deleteId)->first();
        $product->delete() ;
        $this->dispatchBrowserEvent('product-deleted');
    }



}
