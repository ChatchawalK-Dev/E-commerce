<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::paginate(16);
        return view('shop', compact('shops'));
    }

    public function home()
    {
        $shops = Shop::paginate(8);
        return view('home', compact('shops'));
    }

    public function show($id)
    {
        $shop = Shop::with('reviews')->findOrFail($id); // ค้นหาสินค้าหลักด้วย ID
       
        // ดึงสินค้าที่เกี่ยวข้อง โดยใช้ category_id หรือเงื่อนไขอื่นๆ เช่น tag
        $relatedshop = Shop::where('category_id', $shop->category_id)
                                ->where('id', '!=', $shop->id) // ไม่แสดงสินค้าหลัก
                                ->take(4) // จำกัดจำนวนสินค้าที่จะแสดง
                                ->get();

        // ส่งข้อมูลสินค้าและสินค้าที่เกี่ยวข้องไปยัง View
        return view('show', compact('shop', 'relatedshop'));
    }
}
