@vite('resources/css/app.css')
<div class="mx-auto flex w-full flex-col md:flex-row justify-center items-center bg-gray-100 p-16">
    <!-- WARRANTY ICONS -->
    <div class="flex space-x-32 justify-center">
        <!-- High Quality -->
        <div class="flex items-center text-black">
            <x-heroicon-o-star class="w-16 h-16" /> <!-- High Quality Icon -->
            <span class="ml-2 text-lg font-bold">High Quality</span>
        </div>
        <!-- Warranty Protection -->
        <div class="flex items-center text-black">
            <x-heroicon-o-shield-check class="w-16 h-16" /> <!-- Warranty Protection Icon -->
            <span class="ml-2 text-lg font-bold">Warranty Protection</span>
        </div>
        <!-- Free Shipping -->
        <div class="flex items-center text-black">
            <x-heroicon-o-truck class="w-16 h-16" /> <!-- Free Shipping Icon -->
            <span class="ml-2 text-lg font-bold">Free Shipping</span>
        </div>
        <!-- 24/7 Support -->
        <div class="flex items-center text-black">
            <x-bi-headset class="w-16 h-16" /> <!-- 24/7 Support Icon -->
            <span class="ml-2 text-lg font-bold">24/7 Support</span>
        </div>
    </div>
</div>
