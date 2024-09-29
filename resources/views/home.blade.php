@vite('resources/css/app.css')
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <div class="relative">
        <!-- Image -->
        <img src="{{ asset('images/scandinavian-interior-mockup-wall-decal-background 1.png') }}" alt="Scandinavian Interior" class="w-full h-auto">

        <!-- Boardcard (Overlay) -->
        <div class="absolute inset-0 flex items-center justify-end pr-10">
            <div class="bg-orange-100 w-full md:w-1/2 lg:w-1/3 h-auto p-8 rounded-lg">
                <div class="font-bold text-start text-black">New Arrival</div>
                <div class="mt-2 text-6xl text-start text-orange-400 font-bold">Discover Our</div>
                <div class="mt-2 text-6xl font-bold text-orange-400 text-start">New Collection</div>
                <div class="mt-2 font-semibold text-start text-black">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</div>
                
                <a href="/shop" class="mt-8 inline-block bg-orange-400 text-white font-semibold py-4 px-16 text-start">
                    Buynow
                </a>
            </div>
        </div>
    </div>

    <!-- Additional Content -->
    <div class="flex flex-col items-center justify-center font-bold text-3xl mt-8">
        <h2>Browse The Range</h2>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-4 p-16">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg overflow-hidden">
                <img src="{{ asset('images/Dining.png') }}" alt="Card 1" class="w-full h-96 object-cover">
                <div class="p-4">
                    <h3 class="text-lg text-center font-semibold mb-2">Dining</h3>  
                </div>
            </div>
    
            <!-- Card 2 -->
            <div class="bg-white rounded-lg overflow-hidden">
                <img src="{{ asset('images/Image-living room.png') }}" alt="Card 2" class="w-full h-96 object-cover">
                <div class="p-4">
                    <h3 class="text-lg text-center font-semibold mb-2">Living</h3>     
                </div>
            </div>
    
            <!-- Card 3 -->
            <div class="bg-white rounded-lg overflow-hidden">
                <img src="{{ asset('images/Mask Group.png') }}" alt="Card 3" class="w-full h-96 object-cover">
                <div class="p-4">
                    <h3 class="text-lg text-center font-semibold mb-2">Bedroom</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center font-bold text-3xl mt-4">
        <h2>Our Products</h2>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8 p-16">
        @foreach($shops as $shop)
            <div class="bg-gray-100 overflow-hidden relative group">
                <img src="{{ asset($shop->image) }}" alt="{{ $shop->name }}" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $shop->name }}</h3>
                    <p class="text-gray-700">{{ $shop->description }}</p>
                    <p class="text-gray-900 font-bold">{{ $shop->price }} ฿</p>
                </div>
                
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
    
    <!-- Show More Button -->
    <div class="flex justify-center mb-4">
        <a href="/shop" class="border border-orange-400 text-orange-400 px-16 py-3 text-lg font-semibold">Show More</a>
    </div>

    <div class="flex bg-gray-100 p-8 mb-8">
        <div class="flex flex-col justify-center pl-8">
            <div class="text-3xl font-bold text-gray-700">50+ Beautiful rooms</div>
            <div class="text-3xl font-bold text-gray-700">inspiration</div>
            <div class="mt-2"> Our designer already made a lot of beautiful prototipe of rooms that inspire you</div>
            <a href="#" class="mt-8 self-start inline-block bg-orange-400 text-white font-semibold py-4 px-8">
                Explor More
            </a>
        </div>
        
        <div class="">    
            <!-- Card 1 -->
            <div class="item bg-white p-6 shadow-md rounded-lg">
                <h2 class="text-xl font-bold">Card 1</h2>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis hendrerit turpis. Integer ultricies nulla non purus cursus.</p>
            </div>
            <!-- Card 2 -->
            <div class="item bg-white p-6 shadow-md rounded-lg">
                <h2 class="text-xl font-bold">Card 2</h2>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis hendrerit turpis. Integer ultricies nulla non purus cursus.</p>
            </div>
            <!-- Card 3 -->
            <div class="item bg-white p-6 shadow-md rounded-lg">
                <h2 class="text-xl font-bold">Card 3</h2>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis hendrerit turpis. Integer ultricies nulla non purus cursus.</p>
            </div>
            <!-- Card 4 -->
            <div class="item bg-white p-6 shadow-md rounded-lg">
                <h2 class="text-xl font-bold">Card 4</h2>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis hendrerit turpis. Integer ultricies nulla non purus cursus.</p>
            </div>
        </div>
    
        <!-- Text Aligned to the Left Center -->
        
    </div>
    <div>
    <div class="flex flex-col justify-center items-center ">
        <p class="font-semibold"> Share your setup with</p>
        <p class="text-4xl font-bold"> #FuniroFurniture</p>
    </div>
        <img src="{{ asset('images/Images.png') }}" alt="Share Fur" class="w-full h-auto mb-8">
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
@endsection
