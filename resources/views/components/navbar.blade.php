@vite('resources/css/app.css')

<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200 p-4">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
        <!-- Logo -->
        <div class="flex-1 flex items-center">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/Meubel House_Logos-05.png') }}" alt="Logo" class="h-8 w-8">
                <div class="text-black text-3xl font-bold">Furniro</div>
            </a>
        </div>
        

        <!-- Navigation Links -->
        <div class="flex-1 hidden md:flex justify-center">
            <ul class="flex space-x-8 font-medium">
              <li>
                <a href="/" class="py-2 px-3 text-black rounded hover:text-orange-400">Home</a>
              </li>
              <li>
                <a href="/shop" class="py-2 px-3 text-black rounded hover:text-orange-400">Shop</a>
              </li>
              <li>
                <a href="#" class="py-2 px-3 text-black rounded hover:text-orange-400">About</a>
              </li>
              <li>
                <a href="/contact" class="py-2 px-3 text-black rounded hover:text-orange-400">Contact</a>
              </li>
            </ul>
        </div>

        <!-- Icons -->
        <div class="flex-1 flex justify-end">
            <ul class="flex space-x-8 font-medium">
                <li>
                    <!-- Account icon -->
                    <div class="text-black hover:text-orange-400">
                        <x-heroicon-o-user class="w-6 h-6" />
                    </div>
                </li>
                <li>
                    <!-- Search icon -->
                    <div class="text-black hover:text-orange-400">
                        <x-feathericon-search class="w-6 h-6" />
                    </div>
                </li>
                <li>
                    <!-- Wishlist icon -->
                    <div id="wishlist-icon" class="text-black hover:text-orange-400">
                        <x-heroicon-o-heart class="w-6 h-6" />
                    </div>
                </li>
                <li>
                    <!-- Cart Icon -->
                    <div id="cart-icon" class="text-black hover:text-orange-400">
                        <x-heroicon-o-shopping-cart class="w-6 h-6" />
                    </div>
                </li>
            </ul>

            <!-- Popup Wishlist -->
            <div id="wishlist-popup" class="hidden fixed inset-0 bg-black bg-opacity-50 items-start justify-end">
                <div class="bg-white p-6 rounded-md shadow-lg w-2/6">
                    <div class="border-b">
                        <div class="flex justify-between items-center mb-4">
                            <div class="text-3xl font-bold">Wishlist</div>
                            <button id="close-wishlist" class="text-gray-500 hover:text-orange-600">
                                <x-tabler-heart-x class="w-6 h-6"/>
                            </button>
                        </div>
                    </div>
                    <!-- Add wishlist items here -->
                </div>
            </div>
            
            <!-- Popup Cart -->
            <div id="cart-popup" class="hidden fixed inset-0 bg-black bg-opacity-50 items-start justify-end">
                <div class="bg-white p-6 rounded-md shadow-lg w-2/6">
                    <div class="border-b ">
                        <div class="flex justify-between items-center mb-4">
                            <div class="text-3xl font-bold">Shopping Cart</div>
                        <button id="close-cart" class="text-gray-500 hover:text-orange-600">
                            <x-bi-bag-x class="w-6 h-6"/>
                        </button>
                        </div>
                    </div>
                    
                    @if(session('cart'))
                    <ul>
                        @php $subtotal = 0; @endphp <!-- เริ่มต้น subtotal -->
                        @foreach(session('cart') as $id => $details)
                            @php $subtotal += $details['price'] * $details['quantity']; @endphp <!-- คำนวณ subtotal -->
                
                            <li class="flex items-center justify-between py-4">
                                <!-- รูปสินค้า -->
                                <div class="w-16 h-16">
                                    <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" class="w-full h-full object-cover rounded-md">
                                </div>
                
                                <!-- ชื่อและจำนวนสินค้า -->
                                <div class="flex-1 px-4">
                                    <div class="font-bold">{{ $details['name'] }}</div>
                                    <div class="text-sm text-gray-500">{{ $details['quantity'] }} x ${{ $details['price'] }}</div>
                                </div>
                
                                <!-- ปุ่มลบสินค้า -->
                                <div>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <x-heroicon-s-x-circle class="w-6 h-6" />
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                
                    <!-- แสดง Subtotal -->
                    <div class="text-left font-bold py-4 border-b">
                        Subtotal: ${{ number_format($subtotal, 2) }}
                    </div>
                
                    <!-- ปุ่ม Cart Checkout และ Comparison -->
                    
                @else
                    <p>No items in cart.</p>
                @endif
                    <div class="flex justify-between py-4">
                        <!-- ปุ่ม Cart -->
                        <a href="/cart" class="border text-black py-2 px-8 rounded-full hover:bg-orange-500">
                            Cart
                        </a>
                
                        <!-- ปุ่ม Checkout -->
                        <a href="/checkout" class="border text-black py-2 px-8 rounded-full hover:bg-orange-500">
                            Checkout
                        </a>
                
                        <!-- ปุ่ม Comparison -->
                        <a href="/comparison" class="border text-black py-2 px-8 rounded-full hover:bg-orange-500">
                            Comparison
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    document.getElementById('cart-icon').addEventListener('click', function(event) {
    event.preventDefault();
    var popup = document.getElementById('cart-popup');
    if (popup.classList.contains('hidden')) {
        popup.classList.remove('hidden');
        popup.classList.add('flex');
    } else {
        popup.classList.remove('flex');
        popup.classList.add('hidden');
    }
});

document.getElementById('close-cart').addEventListener('click', function() {
    var popup = document.getElementById('cart-popup');
    popup.classList.remove('flex');
    popup.classList.add('hidden');
});

document.getElementById('wishlist-icon').addEventListener('click', function(event) {
    event.preventDefault();
    var popup = document.getElementById('wishlist-popup');
    if (popup.classList.contains('hidden')) {
        popup.classList.remove('hidden');
        popup.classList.add('flex');
    } else {
        popup.classList.remove('flex');
        popup.classList.add('hidden');
    }
});

document.getElementById('close-wishlist').addEventListener('click', function() {
    var popup = document.getElementById('wishlist-popup');
    popup.classList.remove('flex');
    popup.classList.add('hidden');
});

</script>