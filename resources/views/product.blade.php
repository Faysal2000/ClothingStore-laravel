@extends('Layouts.master')

@section('content')
    <style>
        svg {
            height: 50px !important;
        }
    </style>

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
                                <a href="/products">
                                    <img src="{{ asset($item->imagepath) }}" style="max-height:400px;min-height:400px" alt="">
                                </a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price"><span>{{ $item->quantity }}</span> {{ $item->price }} $</p>

                            <a href="/cart/add/{{ $item->id }}" class="btn btn-outline-primary">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a>

                            @if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'salesman'))
                                <a href="/editproduct/{{ $item->id }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-danger delete-product"
                                    data-id="{{ $item->id }}">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>

            <div style="text-align:center; margin:0px auto">
                <!-- Pagination Links -->
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.delete-product').forEach(button => {
                button.addEventListener('click', function() {
                    let productId = this.getAttribute('data-id');

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/removeproduct/" + productId;
                        }
                    });
                });
            });
        });
    </script>
@endsection
