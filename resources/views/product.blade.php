@extends('Layouts.master')


@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>

                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/product"><img src="{{ url($item->imagepath) }}"
                                        style="max-height:400px;min-height:400px" alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price"><span>{{ $item->quantity }}</span> {{ $item->price }} $</p>
                            <a href="/cart.html" class="btn btn-outline-primary"><i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </a>
                            <a href="/editproduct/{{ $item->id }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-pencil-square"></i>


                                Edit
                            </a>
                            <a href="/removeproduct/{{ $item->id }}" class="btn btn-outline-danger"><i
                                    class="fas fa-trash"></i>
                                Delete
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
