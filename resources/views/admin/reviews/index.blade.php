@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Customer Reviews & Feedback</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Product</th>
                <th>User</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->type == 'experience' ? 'Feedback' : 'Product Review' }}</td>
                <td>
                    @if($review->type == 'product' && $review->product)
                        {{ $review->product->name }}
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $review->user->name ?? 'Guest' }}</td>
                <td>
                    @if($review->rating)
                        {{ $review->rating }}/5
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $review->comment }}</td>
                <td>{{ $review->created_at->format('Y-m-d') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection