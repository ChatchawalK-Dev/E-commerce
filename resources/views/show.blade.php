@extends('layouts.app')
@vite('resources/css/app.css')
@section('content')
<div class="container mx-auto p-4 mt-16">
    <div class="mx-auto bg-white overflow-hidden flex flex-col md:flex-row border-b">
        <!-- รูปภาพ -->
        <div class="w-full md:w-3/6 p-4">
            <img src="{{ asset($shop->image) }}" alt="{{ $shop->name }}" class="w-full h-full object-cover">
        </div>

        <!-- รายละเอียด -->
        <div class="w-full md:w-3/6 p-6">
            <h2 class="text-2xl font-bold mb-4">{{ $shop->name }}</h2>
            <p class="text-gray-900 font-bold text-xl mb-4">{{ $shop->price }} ฿</p>
            
            <!-- Star Rating -->
            <div class="flex items-center mb-4">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $shop->rating)
                        <svg class="star-rating w-6 h-6 text-yellow-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24 14.81 8.63 12 2 9.19 8.63 2 9.24 7.46 13.97 5.82 21z"/>
                        </svg>
                    @else
                        <svg class="star-rating w-6 h-6 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21 16.54 13.97 22 9.24 14.81 8.63 12 2 9.19 8.63 2 9.24 7.46 13.97 5.82 21z"/>
                        </svg>
                    @endif
                @endfor
                <p class="text-gray-700 ml-2">({{ $shop->rating }} / 5)</p>
            </div>

            <p class="text-gray-700 mb-4">{{ $shop->description }}</p>

            <!-- Size Selection -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Size</label>
                <div class="flex space-x-4">
                    <button type="button" data-size="S" class="size-button border rounded-lg py-2 px-4 text-gray-700 hover:bg-gray-200 focus:outline-none">S</button>
                    <button type="button" data-size="M" class="size-button border rounded-lg py-2 px-4 text-gray-700 hover:bg-gray-200 focus:outline-none">M</button>
                    <button type="button" data-size="L" class="size-button border rounded-lg py-2 px-4 text-gray-700 hover:bg-gray-200 focus:outline-none">L</button>
                    <button type="button" data-size="XL" class="size-button border rounded-lg py-2 px-4 text-gray-700 hover:bg-gray-200 focus:outline-none">XL</button>
                </div>
            </div>

            <!-- Color Selection -->
            <div class="mb-4">
                <label for="color" class="block text-gray-700 font-semibold mb-2">Color</label>
                <div class="flex space-x-2">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="color" value="red" class="form-radio h-4 w-4 text-red-500">
                        <span class="ml-2">Red</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="color" value="blue" class="form-radio h-4 w-4 text-blue-500">
                        <span class="ml-2">Blue</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="color" value="green" class="form-radio h-4 w-4 text-green-500">
                        <span class="ml-2">Green</span>
                    </label>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="flex flex-col md:flex-row md:space-x-4 md:mb-4 items-center">
                <!-- Form สำหรับเพิ่มสินค้าในตะกร้า -->
                <form action="{{ route('cart.add', $shop->id) }}" method="POST" class="flex space-x-4 items-center">
                    @csrf
                    <!-- ปุ่มเพิ่ม/ลดจำนวนสินค้า -->
                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                        <button type="button" class="quantity-button px-3 py-2 w-10" data-action="decrement">-</button>
                        <input type="number" name="quantity" value="1" min="1" class="quantity-input w-16 text-center py-2 px-2">
                        <button type="button" class="quantity-button px-3 py-2 w-10" data-action="increment">+</button>
                    </div>
                    <!-- ปุ่ม Add to Cart -->
                    <button type="submit" class="w-32 text-black border rounded-lg border-black py-2 px-4 text-center">Add to Cart</button>
                </form>
                <!-- ปุ่ม Compare -->
                    <button class="w-32 text-black border rounded-lg border-black py-2 px-4 text-center md:ml-4 mt-4 md:mt-0">+ Compare</button>
            </div>
        </div>
    </div>

    <!-- Additional Section -->
    <div class="w-full md:w-1/3 p-6 mt-6 md:mt-0 border-b">
        <div class="mb-4 flex items-center">
            <h3 class="text-gray-400 font-semibold w-24 mr-4 text-right">SKU :</h3>
            <p class="py-2 px-4 flex-1">{{ $shop->sku }}</p>
        </div>
        <div class="mb-4 flex items-center">
            <h3 class="text-gray-400 font-semibold w-24 mr-4 text-right">Category :</h3>
            <p class="py-2 px-4 flex-1">{{ $shop->category }}</p>
        </div>
        <div class="mb-4 flex items-center">
            <h3 class="text-gray-400 font-semibold w-24 mr-4 text-right">Tags :</h3>
            <p class="py-2 px-4 flex-1">{{ $shop->tags }}</p>
        </div>
        <div class="mb-4 flex items-center">
            <h3 class="text-gray-400 font-semibold w-24 mr-4 text-right">Share :</h3>
            <p class="py-2 px-4 flex-1">{{ $shop->share }}</p>
        </div>
    </div>

    <div class="flex space-x-8 border-b-2 mt-4 justify-center">
        <button id="tab-description" class="tab-btn text-lg font-semibold pb-2 border-orange-400">Description</button>
        <button id="tab-additional-info" class="tab-btn text-lg font-semibold pb-2">Additional Information</button>
        <button id="tab-review" class="tab-btn text-lg font-semibold pb-2">Review [{{ $shop->reviews->count() ?? 0 }}]</button>

    </div>
    
    <!-- เนื้อหาที่แสดง -->
    <div id="content-description" class="tab-content mt-4 px-8">
        <p>This is the description of the product.</p>
    </div>
    <div id="content-additional-info" class="tab-content mt-4 px-8 hidden">
        <p>This is the additional information of the product.</p>
    </div>
    <div id="content-review" class="tab-content mt-4 px-8 hidden">
        <div class="mt-4">
            @foreach($shop->reviews as $review)
                <div class="border-b pb-4 mb-4">
                    <div class="font-bold">Rating: {{ $review->rating }}</div>
                    <p>{{ $review->comment }}</p>
                    <small class="text-gray-500">Reviewed on: {{ $review->created_at->format('Y-m-d') }}</small>
                </div>
            @endforeach
        
            @if($shop->reviews->isEmpty())
                <p>No reviews yet.</p>
            @endif
        </div>
    </div>
    <div class="flex justify-center mb-8">
        <h2 class="text-3xl font-semibold mb-6">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedshop as $shop)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md group">
                    <img src="{{ cdn($shop->image) }}" alt="{{ $shop->name }}" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $shop->name }}</h3>
                        <p class="text-gray-700">{{ $shop->description }}</p>
                        <p class="text-gray-900 font-bold">{{ $shop->price }} ฿</p>
                        <form action="{{ route('cart.add', $shop->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="bg-orange-400 text-white py-2 px-4 w-full rounded">Add to Cart</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Show More Button -->
    <div class="flex justify-center mb-4">
        <a href="/shop" class="border border-orange-400 text-orange-400 px-16 py-3 text-lg font-semibold">Show More</a>
    </div>
</div>
<script>
    // ฟังก์ชันเปลี่ยนแท็บ
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', () => {
            // ซ่อนเนื้อหาทั้งหมด
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));

            // ลบเส้นใต้จากปุ่มแท็บทั้งหมด
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('border-orange-400', 'text-orange-400'));

            // แสดงเนื้อหาตามแท็บที่คลิก
            const contentId = button.id.replace('tab-', 'content-');
            document.getElementById(contentId).classList.remove('hidden');

            // เพิ่มเส้นใต้และสีส้มให้แท็บที่คลิก
            button.classList.add('border-orange-400', 'text-orange-400');
        });
    });
</script>
@endsection