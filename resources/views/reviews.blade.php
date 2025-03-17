@extends('Layouts.master')


@section('content')



















    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Customer Testimonials</h2>

        <!-- Display All Reviews -->
        <div class="card p-4 shadow-sm">
            <h4 class="text-secondary">What Our Customers Say</h4>
            @if ($reviews->count())
                @foreach ($reviews as $item)
                    <div class="border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/myimg.jpg') }}" class="rounded-circle me-" style=""
                                width="50" alt="Avatar">
                            <div>
                                <h5 class="text-dark mb-1">{{ $item->name }}</h5>
                                <small class="text-muted">{{ $item->subject }}</small>
                            </div>
                        </div>
                        <p class="text-muted mt-2">{{ $item->message }}</p>
                        <div class="text-end">
                            <i class="fas fa-quote-right text-warning"></i>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-muted">No reviews yet. Be the first to share your experience!</p>
            @endif

        </div>






        <!-- Submit a Review -->
        <div class="card mt-4 p-4 shadow-sm">
            <h4 class="text-secondary">Write a Review</h4>
            <form method="post" action="/storeReview">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Your Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject:</label>
                    <input type="text" name="subject" id="subject" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Your Review:</label>
                    <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Review</button>










            </form>






        </div>





    </div>





@endsection
