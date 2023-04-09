


<div>
  <body class="bg-gray-100">

    @include('flashmessage')
    <div class="container mx-auto mt-10">
      <div class="flex shadow-md my-10">
        <div class="w-full bg-white px-10 py-10">
          <div class="flex justify-between border-b pb-8">
            <h1 class="font-semibold text-2xl text-blue-700">My Cart</h1>

          </div>
          <div class="flex mt-10 mb-5">
            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Shipping Fee</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total Cost</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Remove</h3>


          </div>
          @forelse ($cartitems as $cart)
          <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
            <div class="flex w-2/5"> <!-- product -->
              <div class="w-20">
                <img class="" src="{{ Storage::url($cart->product->image) }}" alt="">
              </div>
              <div class="flex flex-col justify-between ml-4 flex-grow">
                <span class="font-bold text-sm">{{ $cart->product->name }}</span>
              </div>
            </div>
            <div class="flex justify-center w-1/5">
             <button class="p-2 hover:bg-gray-200" wire:click.prevent="decrementQty({{ $cart->id }})">-</button>

              <input class="mx-2 border text-center w-10" type="text" value="{{ $cart->quantity }}">

              <button class=" p-2 hover:bg-gray-200" wire:click.prevent="incrementQty({{ $cart->id }})">+</button>
            </div>
            <span class="text-center w-1/5 font-semibold text-sm">{{$cart->product->price }}</span>
            <span class="text-center w-1/5 font-semibold text-sm">{{$cart->product->price * $cart->quantity}}</span>
            <span class="text-center w-1/5 font-semibold text-sm">{{$shipping }}</span>
            <span class="text-center w-1/5 font-semibold text-sm">{{$total }}</span>
            <span class="text-center w-1/5 font-semibold text-sm flex justify-center gap-1 ">
            <button class="bg-red-500 text-light p-2 rounded-lg" wire:click.prevent="deleteItem({{ $cart->id }})">Delete</button>
            <button class="bg-blue-700  hover:bg-indigo-600 py-3 text-sm text-white rounded-lg p-2" wire:click.prevent="checkOut({{ $cart->id }})">Checkout</button>
           </span>

        </div>
          @empty
          <div class="flex justify-center">No item added</div>
         @endforelse
          <a href="dashboard" class="flex font-semibold text-indigo-600 text-sm mt-10">

            <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
            Continue Shopping
          </a>
        </div>


        {{-- <div id="summary" class="w-1/4 px-8 py-10 bg-blue-400">
          <h1 class="font-semibold text-2xl border-b pb-8 text-light text-center">Order Summary</h1>
          <div class="flex justify-between mt-10 mb-5">
            <span class="font-semibold text-sm uppercase">Items</span>
            <span class="font-semibold text-sm">{{ $sub_total }}</span>
          </div>
          <div>
            <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
            <select class="block p-2 text-gray-600 w-full text-sm">
              <option>{{ $shipping }}</option>
            </select>
          </div>
        <div class="border-t mt-8">
            <div class="flex font-semibold justify-between py-6 text-sm uppercase">
              <span>Sub total</span>
              <span>{{ $sub_total }}</span>
            </div>
            <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                <span>Shipping Fee</span>
                <span>{{ $shipping }}</span>
              </div>
            <div class="flex font-semibold justify-between py-6 text-sm uppercase bg-light p-3 mb-3">
                <span>Total cost</span>
                <span>{{ $total }}</span>
              </div>

              </span>
        </div>
        </div> --}}


      </div>
    </div>

  </body>
</div>
