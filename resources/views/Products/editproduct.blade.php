@extends('Layouts.master')
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Edit</span> Product</h3>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="form-title">


                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="post" enctype="multipart/form-data" action="{{ url('/storeproduct') }}">
                            @csrf()
                            <input type="hidden" style="width:100%" required placeholder="" name="id" id="id"
                                value=" {{ $product->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" required class="form-control" placeholder="Enter product name"
                                    name="name" id="name" value="{{ $product->name }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" required class="form-control" placeholder="Enter price"
                                        name="price" id="price" value="{{ $product->price }}">
                                    <span class="text-danger">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" required class="form-control" placeholder="Enter quantity"
                                        name="quantity" id="quantity" value="{{ $product->quantity }}">
                                    <span class="text-danger">
                                        @error('quantity')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" required class="form-control" name="image" id="image"
                                    accept="image/*" value="{{ $product->image }}">

                            </div>

                            <p><img src="{{ asset($product->imagepath) }}" width="300" height="400" alt="">
                            </p>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" required id="description" class="form-control" rows="4"
                                    placeholder="Enter product description" value="{{ $product->description }}">
                                    
                                </textarea>
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="mb-3">
                                <label for="category" class="form-label fw-bold text-primary">Choose a Category</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                    <select class="form-select border-primary shadow-sm" required name="category_id"
                                        id="category_id">
                                        <option value="" disabled selected>-- Select a category --</option>

                                        @foreach ($allcategories as $item)
                                            <option value="{{ $item->id }}"
                                                @if (isset($product) && $item->id == $product->category_id) selected @endif>
                                                {{ ucfirst($item->name) }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <span class="text-danger">
                                        @error('category_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>





                            <input type="hidden" name="token" value="FsWga4&amp;@f6aw">

                            <div class="text-center">
                                <button type="submit" class="btn btn-warning px-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
