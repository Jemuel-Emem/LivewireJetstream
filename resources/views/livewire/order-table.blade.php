
<div>
    <body class="bg-gray-100">
      @include('flashmessage')
      <div class="container mx-auto mt-10 ">
        <div class="flex shadow-md my-10 ">
          <div class="w-full bg-white px-10 py-10 ">
            <div class="flex justify-between border-b pb-8 ">
              <h1 class="font-semibold text-2xl text-blue-700">My Order</h1>

            </div>
            <div class="flex mt-10 mb-5 ">
              <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5 ">Product Details</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Name</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
              <h3 class="font-semibold text-center text-green-600 text-xs uppercase w-1/5 ">Status</h3>
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
              <span class="text-center w-1/5 font-semibold text-sm">{{ $order->total_fee}}</span>
              <span class="text-center w-1/5 font-semibold text-sm">{{ $order->status }}</span>
            </div>
            @endforeach

            <a href="dashboard" class="flex font-semibold text-indigo-600 text-sm mt-10">

              <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
              Continue Shopping
            </a>
          </div>

        </div>
      </div>

    </body>
  </div>
