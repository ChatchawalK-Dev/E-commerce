@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Header Image -->
<div class="relative">
    <img src="{{ asset('images/Rectangle 1.png') }}" alt="Scandinavian Interior" class="w-full h-auto">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-black p-2 text-center">
        <div class="text-5xl font-bold mb-4">Checkout</div>
        <a href="{{ url('/') }}" class="text-black font-bold hover:underline">Home</a> > 
        <a href="{{ url('/checkout') }}" class="text-black font-semibold hover:underline">Checkout</a>
    </div>
</div>

<!-- Checkout Section -->
<div class="container mx-auto p-8 mt-8">
    <div class="flex mb-4">
        <!-- Billing Details -->
        <div class="w-1/2 mr-4">
            <h2 class="text-2xl font-bold mb-4">Billing Details</h2>
            <form id="checkoutForm" action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <!-- Billing Details Form -->
                <div class="mb-4">
                    <label for="name" class="block font-bold mb-1">Full Name</label>
                    <input type="text" name="name" id="name" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-bold mb-1">Email Address</label>
                    <input type="email" name="email" id="email" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block font-bold mb-1">Address</label>
                    <input type="text" name="address" id="address" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label for="city" class="block font-bold mb-1">City</label>
                    <input type="text" name="city" id="city" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label for="zipcode" class="block font-bold mb-1">Zip Code</label>
                    <input type="text" name="zipcode" id="zipcode" class="w-full border rounded p-2" required>
                </div>
            </form>
        </div>
    
        <!-- Cart Summary -->
        <div class="w-1/2 ml-4 p-4">
            <h2 class="text-2xl font-bold mb-4">Product</h2>
            @php
            $subtotal = 0;
            @endphp
    
            <ul>
                @if(session('cart') && count(session('cart')) > 0)
                    @foreach(session('cart') as $id => $details)
                        @php
                            // คำนวณ subtotal
                            $subtotal += $details['price'] * $details['quantity'];
                        @endphp
                        <li class="flex justify-between mb-2">
                            <span>{{ $details['name'] }} (x{{ $details['quantity'] }})</span>
                            <span>${{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                        </li>
                    @endforeach
                @else
                    <li class="text-center">Your cart is empty.</li>
                @endif
            </ul>
    
            <hr class="my-4">
            <div class="flex justify-between font-bold text-xl">
                <span>Total:</span>
                <span>${{ number_format($subtotal, 2) }}</span>
            </div>
    
            <!-- ปุ่ม Place Order อยู่ตรงกลาง -->
            <div class="mt-4 flex justify-center">
                <button id="placeOrderButton" class="px-16 py-4 border border-black text-black font-bold rounded-md">
                    Place Order
                </button>
            </div>
        </div>
    </div>
    

    <!-- Popup ยืนยันคำสั่งซื้อ -->
    <div id="successModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded shadow-lg">
                <h2 class="text-xl font-bold mb-4">Order Placed Successfully!</h2>
                <p id="orderDetails"></p>
                <button id="closeModal" class="mt-4 px-4 py-2 bg-black text-white rounded">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('placeOrderButton').addEventListener('click', function() {
        const billingForm = document.getElementById('checkoutForm');
        
        // ส่งข้อมูลของฟอร์ม Billing
        let formData = new FormData(billingForm);

        fetch("{{ route('checkout.process') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // แสดงข้อมูลที่สั่งซื้อใน popup
                document.getElementById('orderDetails').innerText = `Thank you, ${data.order.name}. Total amount: $${data.order.total_amount.toFixed(2)}`;
                document.getElementById('successModal').classList.remove('hidden');
            } else {
                alert('There was an error processing your order.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // ปิด Popup
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('successModal').classList.add('hidden');
    });
</script>
@include('components.warranty')
@endsection
