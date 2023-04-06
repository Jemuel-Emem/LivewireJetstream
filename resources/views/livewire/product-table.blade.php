<div>
<div>

 <div class="container ">

<div class="">
<div class="flex justify-between items-center">
<button class="bg-blue-700 text-light p-2 rounded w-32" data-toggle="modal" data-target="#addProduct">Add product</button>

<input type="text" name="" id="" placeholder="search.." wire:model="search">
</div>
</div>
<div class="pt-2 row">
<div class="col-lg-12 ">
<table class="table table-hover border">
<thead class="bg-blue-700 text-white">
    <tr>
    <th scope="col">Id</th>
    <th scope="col">image</th>
    <th scope="col">Product name</th>
    <th scope="col">Discription</th>
    <th scope="col">Price</th>
    <th scope="col">Stocks</th>
    <th scope="col">Action</th>
    </tr>
</thead>
<tbody>

    @forelse ( $product as $data1)
    <tr>

        <td>{{ $data1->id }}</td>
        <td> <img src="{{ Storage::url($data1->image) }}" style="width:70px; height:70px" alt="none" class="border rounded"> </td>
        <td>{{ $data1->name }}</td>
        <td>{{ $data1->description }}</td>
        <td>{{$data1->price }}</td>
        <td>{{ $data1->stocks }}</td>
        <td style="">
            <i class="ri-pencil-line text-blue-700 hover:text-blue-500 text-xl"  data-toggle="modal" data-target="#update" wire:click.prevent="edit({{$data1->id}})" ></i>
            <a href="javascript::void(0)" style="text-decoration:none;"><i class="ri-delete-bin-7-line text-red-700 text-xl " wire:click.prevent='deleteConfirmation({{$data1->id}})'></i></a>

        </td>
        </tr>
    @empty
        <td colspan="7"> No data</td>
    @endforelse
</tbody>
</table>

</div>
</div>
</div>
{{-- <div class="flex justify-center mt-12"> {!! $data1->render() !!}</div> --}}
{{-- @include('livewire.jem-website.footer') --}}
</div>





<!-- Modal add data here -->

<div wire:ignore.self class="modal fade" id="addProduct" tabindex="-1" >
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-blue-700">
<h5 class="modal-title text-white font-bold" id="exampleModalLabel">ADD PRODUCT</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click.prevent="close">
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
<div wire:loading wirer:target="image" wire:key="image"><i class="fa fa-spinner fa-spin "></i></div>
{{-- //preview image --}}
{{-- @if ($image)
<img src="{{ $image->temporaryUrl() }}" width="100" alt="">

@endif --}}
<label for="image">Upload Image</label>
<input type="file" class="form-control p-1 border" id=""  placeholder="" wire:model.defer="image" required >
@error('image') <span class="error text-danger">{{ $message }}</span>
@enderror
</div>

<div class="form-group">
<label for="">Product Name:</label>
<input type="text" class="form-control" id=""  placeholder="" wire:model.defer="name" required>
@error('productname') <span class="error text-danger">{{ $message }}</span>
@enderror
</div>
<div class="form-group">
<label for="exampleInputPassword1">Product Discription:</label>
<input type="text" class="form-control" id="" placeholder="" wire:model.defer="description" required>
@error('discription') <span class="error text-danger">{{ $message }}</span>
@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword1">Product Price:</label>
<input type="text" class="form-control" id="" placeholder="" wire:model.defer="price" required>
@error('price') <span class="error text-danger">{{ $message }}</span>
@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword1">Product Stocks:</label>
<input type="text" class="form-control" id="" placeholder="" wire:model.defer="stocks" required>
@error('stocks') <span class="error text-danger">{{ $message }}</span>
@enderror
</div>
<div class="text-center pt-1"> <button type="submit" class="bg-blue-700 text-light p-2 " wire:click.prevent="storeProduct">Add Item</button></div>
</form>

</div>

</div>
</div>
</div>



{{-- <end> --}}


{{-- modal update hereee --}}

<div wire:ignore.self class="modal fade" id="update" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-blue-700">
          <h5 class="modal-title text-white font-bold" id="exampleModalLabel">UPDATE PRODUCT</h5>
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
            <label for="image">Upload Image</label>
            <input type="file" class="form-control p-1" id=""  placeholder="" wire:model="image"` required>
            @error('image') <span class="error text-danger">{{ $message }}</span>
            @enderror
          </div>

        <div class="form-group">
          <label for="">Product Name:</label>
          <input type="text" class="form-control" id=""  placeholder="" wire:model="name" required>
          @error('productname') <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Product Discription:</label>
          <input type="text" class="form-control" id="" placeholder="" wire:model="description" required>
          @error('discription') <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Product Price:</label>
            <input type="text" class="form-control" id="" placeholder="" wire:model="price" required>
            @error('price') <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>

         <div class="form-group">
            <label for="exampleInputPassword1">Product Stocks:</label>
            <input type="text" class="form-control" id="" placeholder="" wire:model="stocks" required>
            @error('stocks') <span class="error text-danger">{{ $message }}</span>
          @enderror
         </div>
       <div class="text-center pt-2"> <button type="submit" class="bg-blue-700 text-light p-2" wire:click.prevent="update" >Update Item</button></div>
      </form>

</div>

</div>
</div>
</div>
{{-- end modal update --}}

</div>
