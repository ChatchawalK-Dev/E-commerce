@extends('layouts.app')
@vite('resources/css/app.css')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="relative">
    <img src="{{ asset('images/Rectangle 1.png') }}" alt="Scandinavian Interior" class="w-full h-auto">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-black p-2 text-center">
        <div class="text-5xl font-bold mb-4">Shop</div>
        <a href="{{ url('/') }}" class="text-black font-bold hover:underline">Home</a> > 
        <a href="{{ url('/shop') }}" class="text-black font-semibold hover:underline">Shop</a>
    </div>
</div>     

<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8 p-16">
        @foreach($shops as $shop)
        <a href="{{ route('show', $shop->id) }}">
            <div class="bg-gray-100 overflow-hidden relative group">
                <img src="{{ asset($shop->image) }}" alt="{{ $shop->name }}" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $shop->name }}</h3>
                    <p class="text-gray-700">{{ $shop->description }}</p>
                    <p class="text-gray-900 font-bold">{{ $shop->price }} ฿</p>
                </div>
                <!-- การแสดงปุ่มเมื่อเลื่อนเมาส์ -->
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="space-y-4 text-center font-bold">
                        <form action="{{ route('cart.add', $shop->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-white text-xl text-orange-500 py-2 px-8 mb-2 rounded">Add to cart</button>
                        </form>
                        <div class="flex justify-center space-x-2">
                            <button class=" text-white text-sm px-3 py-2 rounded flex items-center">
                                <i class="fas fa-share mr-1"></i> Share
                            </button>
                            <button class="text-white text-sm px-3 py-2 rounded flex items-center">
                                <i class="fas fa-exchange-alt mr-1"></i> Compare
                            </button>
                            <button class="text-white text-sm px-3 py-2 rounded flex items-center">
                                <i class="fas fa-heart mr-1"></i> Like
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    
    <!-- Pagination Links -->
    <div class="mb-6">
        <nav aria-label="Page navigation">
            <ul class="flex justify-center space-x-2">
                {{-- ปุ่ม Previous --}}
                @if ($shops->onFirstPage())
                    <li>
                        <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a class="px-4 py-2 bg-orange-500 text-white rounded" href="{{ $shops->previousPageUrl() }}">
                            Previous
                        </a>
                    </li>
                @endif
    
                {{-- ตัวเลขหน้า --}}
                @for ($i = 1; $i <= $shops->lastPage(); $i++)
                    <li>
                        <a class="px-4 py-2 {{ $i == $shops->currentPage() ? 'bg-orange-500 text-white' : 'bg-gray-200 text-black' }} rounded" href="{{ $shops->url($i) }}">
                            {{ $i }}
                        </a>
                    </li>
                @endfor
    
                {{-- ปุ่ม Next --}}
                @if ($shops->hasMorePages())
                    <li>
                        <a class="px-4 py-2 bg-orange-500 text-white rounded" href="{{ $shops->nextPageUrl() }}">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">
                            Next
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@include('components.warranty')
@endsection
