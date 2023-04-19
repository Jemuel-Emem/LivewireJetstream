<?php

namespace App\Http\Livewire;
use App\Models\order;
use App\Models\Product;
use Livewire\Component;

class OrderlistTable extends Component
{
    public $orderitems, $sub_id, $status, $item_stocks, $item_quantity;
    public function render()
    {
        $this->orderitems = order::all();
        return view('livewire.orderlist-table');
    }

    public function modify($id){
        $product = order::where('id',$id)->first();
        $this->sub_id = $product->id; //we need this for updating the id
        $this->id = $id;
        $this->status = $product->status;
    }

    public function update(){

        $this->validate([
            'status' => 'required'

           ]);
           $product =order::where('id', $this->sub_id)->first();
           $product->status = $this->status;
        //    $product->item_stocks = $product->item_stocks - $product->item_quantity;
           $product->save();
         session()->flash('message', 'Data was update successfully!');
         $this->resetFields();


    }

    public function resetFields(){
    $this->status = '';
    }
        public function close(){
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
    }

}
