@extends('backend.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Edit Product Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center mb-0" style="color: black">Edit Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if(session('success'))
                            <p class="alert alert-success">{{ session('success') }}</p>
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputName1" class="form-label">Product Name</label>
                                <input type="text" class="form-control" value="{{ $edit->name }}" id="exampleInputName1" name="name" placeholder="Product Name.." style="border: 1px solid black;">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="exampleInputCategory" class="form-label">Select Category</label>
                                <select name="category_id" class="form-control" style="border: 1px solid black;">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputImage" class="form-label">Product Image</label>
                                <input type="file" class="form-control dropify" name="image" placeholder="Product Image.." style="border: 1px solid black;">
                                @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputStock" class="form-label">Stock</label>
                                <input type="number" class="form-control" value="{{ $edit->stock }}" id="exampleInputStock" name="stock" placeholder="500.." style="border: 1px solid black;">
                                @error('stock')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="exampleInputStatus" class="form-label">Status</label>
                                <select name="status" class="form-control" style="border: 1px solid black;">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                @error('status')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" value="{{ $edit->price }}" id="exampleInputPrice" name="price" placeholder="500.." style="border: 1px solid black;">
                                @error('price')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputDescription" class="form-label">Product Description</label>
                                <textarea class="form-control" id="editor2" name="product_information" placeholder="Write more details about your product here.." style="height: 150px; border: 1px solid black;">{{ $edit->product_information }}</textarea>
                                @error('product_information')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
