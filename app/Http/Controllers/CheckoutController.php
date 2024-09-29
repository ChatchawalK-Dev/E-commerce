<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CheckoutController extends Controller {
    public function showCheckout()
    {
        // ดึงข้อมูล cart จาก session
        $cart = session('cart', []);
        $subtotal = 0;

        // คำนวณ Subtotal
        foreach ($cart as $details) {
            $subtotal += $details['price'] * $details['quantity'];
        }

        // ส่งข้อมูล cart และ subtotal ไปยัง View
        return view('checkout', ['cart' => $cart, 'subtotal' => $subtotal]);
    }
    public function processCheckout(Request $request)
    {
        // ดึงข้อมูลจากแบบฟอร์ม Billing Details
        $billingDetails = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zipcode' => 'required|string|max:20',
        ]);

        // ดึงข้อมูล Cart จาก session
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // คำนวณยอดรวมทั้งหมด
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // บันทึกข้อมูลคำสั่งซื้อในตาราง orders
        $order = Order::create([
            'name' => $billingDetails['name'],
            'email' => $billingDetails['email'],
            'address' => $billingDetails['address'],
            'city' => $billingDetails['city'],
            'zipcode' => $billingDetails['zipcode'],
            'total_amount' => $totalAmount,
        ]);

        // บันทึกสินค้าแต่ละรายการในตาราง order_items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        // ลบ Cart จาก Session เมื่อสั่งซื้อเสร็จแล้ว
        session()->forget('cart');

        return response()->json([
            'success' => true,
            'order' => [
                'name' => $billingDetails['name'],
                'total_amount' => $totalAmount,
            ],
            'cart' => $cart,
        ]);
    }
}