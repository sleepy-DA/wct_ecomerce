@if(count($cart) > 0)
    <ul>
        @foreach ($cart as $id => $item)
        <li>
            <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
            <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
        </li>
        @endforeach
    </ul>
    <div class="total">
        <span>Total:</span>
        <span>${{ number_format($total, 2) }}</span>
    </div>
    <a href="{{ route('checkout') }}" class="checkout-btn">Checkout</a>
@else
    <p>Your cart is empty</p>
@endif