@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <div class="bg-white shadow-md rounded-lg p-6">
        <!-- Product Details -->
        <h1 class="text-2xl font-semibold">{{ $product->name }}</h1>
        <p class="text-gray-600 mt-2">{{ $product->description }}</p>
        <p class="text-pink-600 text-xl font-bold mt-4">RM{{ number_format($product->price, 2) }}</p>

        <!-- Review Form -->
        @auth
        <div class="mt-10">
            <h2 class="text-xl font-semibold mb-2">Leave a Review</h2>
            <form method="POST" action="{{ route('reviews.store', $product->id) }}">
                @csrf
                <div class="mb-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                    <select name="rating" id="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="5">5 - Excellent</option>
                        <option value="4">4 - Very Good</option>
                        <option value="3">3 - Good</option>
                        <option value="2">2 - Fair</option>
                        <option value="1">1 - Poor</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                    <textarea name="comment" id="comment" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Your thoughts..."></textarea>
                </div>
                <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">
                    Submit Review
                </button>
            </form>
        </div>
        @endauth

        @guest
        <p class="mt-6 text-gray-600">Please <a href="{{ route('login') }}" class="text-pink-600 underline">log in</a> to leave a review.</p>
        @endguest

        <!-- Reviews List -->
        <div class="mt-10">
            <h2 class="text-xl font-semibold mb-4">Customer Reviews</h2>
            @if($product->reviews->count())
                @foreach($product->reviews as $review)
                    <div class="border-b border-gray-200 py-4">
                        <div class="flex justify-between items-center">
                            <strong>{{ $review->user->name }}</strong>
                            <span class="text-yellow-500">{{ str_repeat('★', $review->rating) }}</span>
                        </div>
                        <p class="mt-2 text-gray-700">{{ $review->comment }}</p>
                    </div>
                @endforeach
            @else
                <p class="text-gray-600">No reviews yet. Be the first to review this product!</p>
            @endif
        </div>
    </div>
</div>
@endsection
