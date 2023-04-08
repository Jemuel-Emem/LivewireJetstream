{{-- <div>
    <div class="container  justify-center items-center">
        <div class="border p-4">
            <div class="font-bold text-blue-700" style="font-size: 30px;">My Cart</div>
            <hr class="text-blue-700 mt-2">
            <table class="  ">
                <thead class="text-xl text-center text-light bg-blue-700">
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($cartitems as $cart )

                  <tr class="border">
                    <td>{{ $cart->product->name }}</td>
                    <td>{{ $cart->product->price }}</td>
                    <td>
                        <div class="flex justify-between items-center">
                         <button class="border p-1 mt-1 mb-1 h-8 w-7">-</button>
                         <input type="text" name="" id="" class="border w-12 h-8" value="{{ $cart->quantity }}">
                         <button class="border p-1 mt-1 mb-1 h-8 w-7">+</button>
                        </div>
                    </td>
                    <td>{{ $cart->product->price * $cart->quantity }}</td>
                    <td>del</td>
                  </tr>
                </tbody>
              </table>
            @empty
            <div>No data</div>
            @endforelse

              <div class="flex justify-end items-center">
                <div class="title p-3 mr-5 text-xl font-bold">Total</div>
                <div class="mr-4">100</div>
              </div>
              <div class="flex justify-end items-center">
                <button class="mr-4 text-light bg-blue-700 rounded mb-3 p-2">Place order</button>
              </div>
        </div>
    </div>
</div> --}}
<div>
  <body class="bg-gray-100">

    @include('flashmessage')
    <div class="container mx-auto mt-10">
      <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
          <div class="flex justify-between border-b pb-8">
            <h1 class="font-semibold text-2xl text-blue-700">My Cart</h1>

          </div>
          <div class="flex mt-10 mb-5">
            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Remove</h3>
          </div>
          @forelse ($cartitems as  $cart)
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

              <input class="mx-2 border text-center w-8" type="text" value="{{ $cart->quantity }}">

              <button class=" p-2 hover:bg-gray-200" wire:click.prevent="incrementQty({{ $cart->id }})">+</button>
            </div>
            <span class="text-center w-1/5 font-semibold text-sm">{{$cart->product->price }}</span>
            <span class="text-center w-1/5 font-semibold text-sm">{{$cart->product->price * $cart->quantity}}</span>
            <span class="text-center w-1/5 font-semibold text-sm"><button class="bg-red-500 text-light p-2 rounded-lg" wire:click.prevent="deleteItem({{ $cart->id }})">Delete</button></span>
          </div>
          @empty
          <div class="flex justify-center">No item added</div>
         @endforelse
          <a href="dashboard" class="flex font-semibold text-indigo-600 text-sm mt-10">

            <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
            Continue Shopping
          </a>
        </div>


        <div id="summary" class="w-1/4 px-8 py-10 bg-blue-400">
          <h1 class="font-semibold text-2xl border-b pb-8 text-light text-center">Order Summary</h1>
          {{-- <div class="flex justify-between mt-10 mb-5">
            <span class="font-semibold text-sm uppercase">Items</span>
            <span class="font-semibold text-sm">{{ $sub_total }}</span>
          </div> --}}
          <div>
            <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
            <select class="block p-2 text-gray-600 w-full text-sm">
              <option>{{ $shipping }}</option>
            </select>
          </div>
          {{-- <div class="py-10">
            <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
            <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full">
          </div> --}}
          {{-- <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase mt-3 ">Apply</button> --}}
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
                <span wire:model.defer="total_fee">{{ $total }}</span>
              </div>

            <button class="bg-blue-700 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full" wire:click.prevent="checkOut({{ $cart->id }})">Checkout</button>

        </div>
        </div>
      </div>
    </div>

  </body>
</div>
