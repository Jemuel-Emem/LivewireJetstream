
<div>
    <body class="bg-gray-100">
      @include('flashmessage')
      <div class="container mx-auto mt-10 ">
        <div class="flex shadow-md my-10 ">
          <div class="w-full bg-white px-10 py-10 ">
            <div class="flex justify-between border-b pb-8 ">
              <h1 class="font-semibold text-2xl text-blue-700">Order Details</h1>

            </div>
            <div class="flex mt-10 mb-5 ">
              <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5 ">Product Details</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Name</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Stocks</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
              <h3 class="font-semibold text-center text-green-600 text-xs uppercase w-1/5 ">Status</h3>
              <h3 class="font-semibold text-center text-green-600 text-xs uppercase w-1/5 ">Modify</h3>
            </div>
            @foreach ($orderitems as  $order)
            <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5 border mb-2 ">
              <div class="flex w-2/5"> <!-- product -->
                <div class="w-20">
                  <img class="" src="{{ Storage::url($order->item_image) }}" alt="">
                </div>
                <div class="flex flex-col justify-between ml-4 flex-grow">
                  <span class="font-bold text-sm">{{ $order->product_name }}</span>
                </div>
              </div>
              <div class="flex justify-center w-1/5">
             <span class="font-bold">{{ $order->user_name }}</span>
              </div>
              <span class="text-center w-1/5 font-semibold text-sm">{{ $order->item_price }}</span>
              <span class="text-center w-1/5 font-semibold text-sm">{{ $order->item_quantity }}</span>
              <span class="text-center w-1/5 font-semibold text-sm">{{ $order->item_stocks }}</span>
              <span class="text-center w-1/5 font-semibold text-sm">{{ $order->total_fee}}</span>
              <span class="text-center w-1/5 font-semibold text-sm">{{ $order->status }}</span>
              <span class="text-center w-1/5 font-semibold text-sm">
                <button class="bg-green-700 text-light rounded-lg p-2" wire:click.prevent="modify({{ $order->id }})" data-toggle="modal" data-target="#update">EDIT</button>
            </span>
            </div>
            @endforeach

        </div>
      </div>

{{--
modal start here --}}
      <div wire:ignore.self class="modal fade" id="update" tabindex="-1">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-blue-700">
              <h5 class="modal-title text-white font-bold" id="exampleModalLabel">MODIFY STATUS</h5>
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

                {{-- //preview image --}}
                {{-- @if ($image)
                <img src="{{ $image->temporaryUrl() }}" width="100" alt="">
                @endif --}}

              </div>

             <div class="form-group">
                <label for="exampleInputPassword1">Modify order:</label>

                <select id="underline_select" wire:model="status" required class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option selected >In progress</option>
                    <option >On Delivery</option>
                    <option >Ship Out</option>
                    <option >Dilevered</option>

                </select>
                @error('stocks') <span class="error text-danger">{{ $message }}</span>
              @enderror
             </div>
           <div class="text-center pt-2"> <button type="submit" class="bg-blue-700 text-light p-2" wire:click.prevent="update" >Modify</button></div>
          </form>

    </div>

    </div>
    </div>
    </div>
{{-- modal end here --}}

    </body>
  </div>

