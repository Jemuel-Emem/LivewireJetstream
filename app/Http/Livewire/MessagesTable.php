<?php

namespace App\Http\Livewire;

use App\Models\cartlist;
use App\Models\comments;
use App\Models\User;
use App\Models\Product;
use League\CommonMark\Extension\CommonMark\Parser\Block\ThematicBreakStartParser;
use Livewire\Component;


class MessagesTable extends Component
{
    public $messagee, $commentss;
    public function render()
    {

        //  $this->messagee = comments::with('user')
        //  ->where(['id'=>auth()->user()->name])->get();
         $this->messagee = comments::with('user')->latest()->take(10)->get()->sortBy('id');
        return view('livewire.messages-table');
    }

    public function sendMessage(){
        comments::create([
            'user_id' =>auth()->user()->id,
            'comments' =>$this->commentss,

        ]);

         $this->reset('commentss');
    }

}

