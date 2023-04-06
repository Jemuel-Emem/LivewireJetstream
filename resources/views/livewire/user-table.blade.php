        <div>
        <div class="container pt-4 flex justify-start items-center">
        <div class="">
        <input type="text" name="" id="" placeholder="search.." wire:model="search" class="w-56">
        <button class="bg-blue-700 text-white h-10 p-2 mx-auto rounded hover:bg-blue-500" wire:model="search">Search</button>
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
        style="text-decoration:none;">
        Add to cart <i class="ri-shopping-cart-fill text-yellow-600"></i>

        </a>
        </div>
        <div class="bg-blue-600 text-center text-light rounded"> <span class="p-2"> Stocks: {{ $post->stocks }}</span></div>
        </div>
        </div>
        @empty
        <div class="offset-lg-6"><p>No found item</p></div>
        @endforelse
        <div class="flex justify-center items-center pt-5">{{ $products->links() }}</div>
        </div>
        </div>
        </div>
