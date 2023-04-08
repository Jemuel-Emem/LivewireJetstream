<div class="max-w-lg mx-auto mt-2">
    @if (session()->has('success'))
    <div class="flex bg-blue-100 rounded-lg p-4 text-sm text-blue-700">
        {{ session('success') }}
    </div>

    @endif

</div>
