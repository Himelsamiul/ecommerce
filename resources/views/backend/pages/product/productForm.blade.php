@extends('backend.master')

@section('content')

<div class="container mt-4">
    <div class="row">
        <!-- Product Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center mb-0" style="color: rgb(37, 28, 28)">Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if(session('success'))
                            <p class="alert alert-success">{{ session('success') }}</p>
                        @endif

                        <div class="row mt-4">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInputName1" class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" id="exampleInputName1" name="name" placeholder="Long Kurti.." style="border: 1px solid black;">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputCategory" class="form-label">Select Category</label>
                                <select name="category_id" class="form-control" style="border: 1px solid black;">
                                    <option value="">SELECT A CATEGORY</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->type }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputImage" class="form-label">Image</label>
                            <input type="file" class="form-control dropify" name="image" placeholder="Product Image.." style="border: 1px solid black;">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Stock</label>
                                <input type="number" class="form-control" value="{{ old('stock') }}" id="exampleInputInhouseStock" name="stock" placeholder="Enter Stock" style="border: 1px solid black;">
                                @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="exampleInputPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="exampleInputPrice" value="{{ old('price') }}" name="price" placeholder="Enter Price" style="border: 1px solid black;">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputStatus" class="form-label">Status</label>
                                <select name="status" id="exampleInputStatus" class="form-control" style="border: 1px solid black;">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea rows="5" name="product_information" id="editor2" class="form-control" placeholder="Write something here.." style="border: 1px solid black;">{{ old('product_information') }}</textarea>
                            @error('product_information')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">+ Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
