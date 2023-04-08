<div >
   <div class="flex justify-center">
    {{-- @foreach ($cartitems as $cart ) --}}
       <li class="mr-2">
        <a href="cart" class="block  text-yellow-500 text-xl no-underline mb-3" style="text-decoration: none;"><i class="ri-shopping-cart-2-fill ">
        <span class="text-light"><span class="text-red-400 text-sm rounded-xl bg-red-400 text-light p-1">{{ $itemtotal }}</span></span>
       </i></a>
       </li>
        <li>
        <a href="order" class="block  mr-8 text-yellow-500 text-xl " style="text-decoration: none;"><i class="ri-store-line"><span class="text-light">Order</span></i></a>
        </li>
    {{-- @endforeach --}}
 </div>

</div>
