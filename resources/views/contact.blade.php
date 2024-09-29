@extends('layouts.app')
@vite('resources/css/app.css')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="relative">
    <img src="{{ asset('images/Rectangle 1.png') }}" alt="Scandinavian Interior" class="w-full h-auto">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-black p-2 text-center">
        <div class="text-5xl font-bold mb-4">Contact</div>
        <a href="{{ url('/') }}" class="text-black font-bold hover:underline">Home</a> > 
        <a href="{{ url('/contact') }}" class="text-black font-semibold hover:underline">Contact</a>
    </div>
</div>    
<div class="flex flex-col items-center mt-16 px-72">
    <div class="font-bold text-3xl text-center">
        Get In Touch With Us
    </div>
    <div class="text-center mt-4">
        For More Information About Our Product & Services. Please Feel Free To Drop Us An Email. Our Staff Always Be There To Help You Out. Do Not Hesitate!
    </div>
</div>

<div class="flex flex-col md:flex-row p-8 mt-16">

    <div class="flex-1 mb-8 md:mb-0 pl-48 flex flex-col items-start">
        <div class="mb-8 flex items-start w-full"> 
            <x-fas-location-dot class="w-6 h-6 mr-2 text-black"/>
            <div>
                <div class="font-bold">Address:</div>
                <div>123 Main Street, City, Country</div> 
            </div>
        </div>
        <div class="mb-8 flex items-start w-full">
            <x-heroicon-o-phone class="w-6 h-6 mr-2 text-black"/>
            <div>
                <div class="font-bold">Phone:</div>
                <div>(123) 456-7890</div>
            </div>
        </div>
        <div class="flex items-start w-full"> 
            <x-heroicon-o-clock class="w-6 h-6 mr-2 text-black"/> 
            <div>
                <div class="font-bold">Working Time:</div> 
                <div>Mon - Fri: 9am - 5pm</div>
            </div>
        </div>
    </div>
    
    
    <div class="flex-1 flex justify-start">
        <form action="#" method="POST" class="w-full max-w-md">
            <div class="mb-4">
                <label for="name" class="block mb-4 text-sm font-medium">Your Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-4 text-sm font-medium">Email Address</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="subject" class="block mb-4 text-sm font-medium">Subject</label>
                <input type="text" id="subject" name="subject" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block mb-4 text-sm font-medium">Message</label>
                <textarea id="message" name="message" rows="4" class="w-full p-2 border border-gray-300 rounded" required></textarea>
            </div>
            <button type="submit" class="px-16 bg-orange-400 text-white font-semibold py-2 rounded">
                Submit
            </button>
        </form>
    </div>
</div>

@include('components.warranty')
@endsection
