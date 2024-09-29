@extends('layouts.app')
@vite('resources/css/app.css')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- ส่วนของ Banner -->
<div class="relative">
    <img src="{{ asset('images/Rectangle 1.png') }}" alt="Scandinavian Interior" class="w-full h-auto">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-black p-2 text-center">
        <div class="text-5xl font-bold mb-4">Product Comparison</div>
        <a href="{{ url('/') }}" class="text-black font-bold hover:underline">Home</a> > 
        <a href="{{ url('/comparison') }}" class="text-black font-semibold hover:underline">Comparison</a>
    </div>
</div>

<!-- ตารางสำหรับแสดงการเปรียบเทียบสินค้า -->
    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-bold text-center mb-8">Compare Products</h2>
        
            <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <img src="" alt="" class="w-16 h-16 object-cover">
                            </td>
                            <td class="px-4 py-2"></td>
                            <td class="px-4 py-2"></td>
                            <td class="px-4 py-2"></td>
                        </tr>
                </tbody>
            </table>
    </div>

    <div class="container mx-auto py-8">
        <p class="text-center text-lg">No products available for comparison.</p>
    </div>

<!-- แสดงข้อมูลอื่น ๆ เช่น warranty -->
@include('components.warranty')
@endsection
