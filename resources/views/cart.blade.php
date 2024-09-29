@extends('layouts.app')
@vite('resources/css/app.css')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="relative">
    <img src="{{ asset('images/Rectangle 1.png') }}" alt="Scandinavian Interior" class="w-full h-auto">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-black p-2 text-center">
        <div class="text-5xl font-bold mb-4">Cart</div>
        <a href="{{ url('/') }}" class="text-black font-bold hover:underline">Home</a> > 
        <a href="{{ url('/comparison') }}" class="text-black font-semibold hover:underline">Cart</a>
    </div>
</div>  

<div class="container mx-auto p-4">
        <!-- Flexbox ที่แบ่งเป็นสองส่วน -->
    <div class="flex flex-col lg:flex-row lg:space-x-8">
        <!-- ตารางสินค้า -->
        <div class="w-full lg:w-3/4">
            <table class="table-auto w-full overflow-hidden bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Subtotal</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(session('cart') && count(session('cart')) > 0)
                        @php $subtotal = 0; @endphp <!-- ตัวแปร subtotal สำหรับคำนวณ -->
                        @foreach(session('cart') as $id => $details)
                            @php $subtotal += $details['price'] * $details['quantity']; @endphp <!-- คำนวณ Subtotal -->
                            <tr class="border-b">
                                <!-- รูปภาพสินค้า -->
                                <td class="px-4 py-2">
                                    <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" class="w-16 h-16 object-cover">
                                </td>

                                <!-- ชื่อสินค้า -->
                                <td class="px-4 py-2">{{ $details['name'] }}</td>

                                <!-- ราคา -->
                                <td class="px-4 py-2">${{ number_format($details['price'], 2) }}</td>

                                <!-- จำนวนสินค้า -->
                                <td class="px-4 py-2">
                                    <form action="{{ route('cart.update', $id) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-16 text-center border border-gray-500 rounded" onchange="this.form.submit()"> <!-- ฟอร์มจะส่งเมื่อมีการเปลี่ยนค่า -->
                                    </form>
                                </td>

                                <!-- Subtotal -->
                                <td class="px-4 py-2">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>

                                <!-- ปุ่มลบสินค้า -->
                                <td class="px-4 py-2 text-center">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <!-- ใช้ไอคอน Font Awesome สำหรับถังขยะ -->
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center py-4">Your cart is empty.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Cart Totals -->
        <div class="w-full lg:w-1/4 bg-gray-100 p-6 mt-6 lg:mt-0 rounded-lg shadow-md">
            <h2 class="text-2xl text-center font-bold mb-4">Cart Totals</h2>

            @if(session('cart') && count(session('cart')) > 0)
                <!-- Subtotal list -->
                <div class="mb-4">
                    <span class="font-bold text-lg">Subtotal</span>
                    <ul class="mt-2">
                        @foreach(session('cart') as $id => $details)
                            <li class="flex justify-between items-center mb-2">
                                <span>{{ $details['name'] }} (x{{ $details['quantity'] }})</span>
                                <span>${{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Total -->
                <div class="flex justify-between items-center mb-4">
                    <span class="font-bold text-lg">Total</span>
                    <span class="text-lg">${{ number_format($subtotal, 2) }}</span>
                </div>

                <!-- Checkout Button -->
                <a href="/checkout" class="block bg-orange-500 text-white text-center py-2 px-4 rounded-lg hover:bg-orange-600 transition-colors">
                    Checkout
                </a>
            @endif
        </div>
    </div>
</div>

@include('components.warranty')
@endsection