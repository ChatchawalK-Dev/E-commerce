import './bootstrap';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop: true,              // ทำให้ Carousel เลื่อนวนรอบ
        margin: 10,
        nav: true,               // แสดงปุ่มถัดไปและกลับ
        autoplay: true,         // เปิดใช้งานการเล่นอัตโนมัติ
        autoplayTimeout: 3000,  // ระยะเวลาในการเปลี่ยนสไลด์ (3 วินาที)
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
});

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