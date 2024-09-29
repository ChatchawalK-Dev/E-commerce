<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::create([
            'name' => 'Product 1',
            'description' => 'Description of product 1.',
            'image' => 'path/to/image1.jpg',
            'price' => 100.00,
            'size' => 'M', // ขนาด
            'color' => 'Red', // สี
            'sku' => 'SKU001', // SKU
            'category' => 'Electronics', // หมวดหมู่
            'tags' => 'tag1,tag2', // แท็ก
        ]);

        Shop::create([
            'name' => 'Product 2',
            'description' => 'Description of product 2.',
            'image' => 'path/to/image2.jpg',
            'price' => 200.00,
            'size' => 'L',
            'color' => 'Blue',
            'sku' => 'SKU002',
            'category' => 'Clothing',
            'tags' => 'tag3,tag4',
        ]);

        Shop::create([
            'name' => 'Product 3',
            'description' => 'Description of product 3.',
            'image' => 'path/to/image3.jpg',
            'price' => 150.00,
            'size' => 'S',
            'color' => 'Green',
            'sku' => 'SKU003',
            'category' => 'Home',
            'tags' => 'tag5,tag6',
        ]);

        Shop::create([
            'name' => 'Product 4',
            'description' => 'Description of product 4.',
            'image' => 'path/to/image4.jpg',
            'price' => 250.00,
            'size' => 'XL',
            'color' => 'Black',
            'sku' => 'SKU004',
            'category' => 'Sports',
            'tags' => 'tag7,tag8',
        ]);

        Shop::create([
            'name' => 'Product 5',
            'description' => 'Description of product 5.',
            'image' => 'path/to/image5.jpg',
            'price' => 300.00,
            'size' => 'XXL',
            'color' => 'White',
            'sku' => 'SKU005',
            'category' => 'Accessories',
            'tags' => 'tag9,tag10',
        ]);

        // เพิ่มสินค้าได้ตามต้องการ
    }
}
