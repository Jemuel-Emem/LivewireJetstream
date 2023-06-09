        <div>
        @include('flashmessage')
        <div class="container pt-4 flex justify-end items-center">
        <div class="">
        <input type="text" name="" id="" placeholder="search.." wire:model="search" class="w-56">

        </div>
        </div>
        <div class="container pt-3">
        <div class="row">
        @forelse($products as $post)
        <div class="col-md-3 pt-2">
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
        <a href="#">
        <img src="{{ Storage::url($post->image) }}" style="widows: 70px; height:150px" alt="none" class="border w-full" >
        </a>
        <div class="p-5 ">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->name }} {{ $post->price }}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->description}}</p>
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        style="text-decoration:none;" wire:click.prevent="addToCart({{ $post->id }})">
        Add to cart <i class="ri-shopping-cart-fill text-yellow-600"></i>
        </a>
        </div>
        <div class="flex justify-end items-center"><button class="p-2" ><a href="messages"><i class="ri-chat-3-fill text-yellow-500"></i></a></button></div>
        <div class="bg-blue-600 text-center text-light rounded"> <span class="p-2"> Stocks: {{ $post->stocks }}</span></div>
        </div>
        </div>
        @empty
        <div class="offset-lg-6"><p>No found item</p></div>
        @endforelse
        <div class="flex justify-center items-center pt-5">{{ $products->links() }}</div>
        </div>
        </div>


{{--
modal start here --}}
<div wire:ignore.self class="modal fade" id="message" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-blue-700">
          <h5 class="modal-title text-white font-bold" id="exampleModalLabel">COMMENTS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <div class="modal-body">
    <form class="" >
        <div class="form-group">

            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

          </div>

          @foreach ($products as $product)
          <div class="flex justify-start bg-blue-400 rounded mb-4 h-10">
            <h2 class=" text-light rounded w-full text-xl">{{ $product->comments }}</h2>
          </div>
         <div class="form-group flex justify-center">
         <input type="text" name="" id="" wire:model="comments" class="pt-2" >
        <button type="submit" class="bg-blue-700 text-light p-1 rounded ml-2" wire:click.prevent="sendComment({{ $product->id }})" >Send</button>
        @error('stocks') <span class="error text-danger">{{ $message }}</span>
          @enderror
         </div>
         @endforeach
      </form>

</div>

</div>
</div>
</div>
{{-- modal end here --}}

        </div>
