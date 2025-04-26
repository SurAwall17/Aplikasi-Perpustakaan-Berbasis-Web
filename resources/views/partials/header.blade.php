<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @vite('resources/css/app.css')
    <title>BookNest</title>
</head>
<body>
    <div class="container flex-row max-w-full ">
        {{-- Header Section --}}
        {{-- Navbar for Desktop Mode --}}
        <nav class="nav flex justify-between px-2 md:px-32 py-3 fixed w-full z-10 bg-white transition-all duration-300">
            <div class="logo flex select-none cursor-pointer">
                <img src="{{ asset('images/icons/logo.png') }}" class="w-8 h-8 my-auto me-1" alt="">
                <h1 class="text-3xl font-semibold">Book<span class="text-primary">Nest.</span></h1>
            </div>
            <div class="menu flex gap-5 select-none">
                <ul class="md:flex gap-5 my-auto hidden">
                    <li><a href="#" id="menu-home" class="nav-link active p-1">Home</a></li>
                    <li><a href="#Categories" id="menu-categories" class="nav-link p-1">Categories</a></li>
                    <li class="relative group">
                        <a href="#Features" id="menu-features" class="nav-link flex items-center gap-1">
                            Features
                            <i class="fa-solid fa-chevron-down text-xs"></i> <!-- Icon kecil -->
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="absolute opacity-0 invisible group-hover:opacity-100 group-hover:visible bg-white shadow-lg mt-2 rounded transition-all duration-300 delay-200">
                            <li><a href="/peminjaman" class="block px-4 py-2 hover:bg-gray-100">Peminjaman</a></li>
                            <li><a href="/pengembalian" class="block px-4 py-2 hover:bg-gray-100">Pengembalian</a></li>
                        </ul>
                    </li>
                    
                    
                    
                    <li><a href="#about" id="menu-about" class="nav-link p-1">About</a></li>
                </ul>
                @if (Auth()->user())
                <form action="/logout" method="post">
                    @csrf
                    <div class="button hidden md:flex">
                        <button class="primary-btn font-bold hover:bg-gray-300 ease-in-out duration-300 text-white p-1 w-20">Logout</button>
                    </div>
                </form>
                @else
                    <div class="button hidden md:flex">
                        <a href="/register">
                            <button class="bg-white border-primary border-2 font-bold hover:bg-gray-300 ease-in-out duration-300 text-primary p-1 w-20 me-3">Sign Up</button>
                        </a>
                        <a href="/login">
                            <button class="primary-btn font-bold hover:bg-gray-300 ease-in-out duration-300 text-white p-[6px] w-20">Login</button>
                        </a>
                    </div>
                @endif
                <div class="burger md:hidden">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </div>
                <div class="close-burger hidden md:hidden">
                    <i class="fa-solid fa-close text-2xl"></i>
                </div>
        </nav>

        {{-- Navbar For Mobile Mode --}}
        <div class="mobile-nav mt-[3.7rem] hidden w-full z-10 fixed bg-white md:hidden">
            <ul class="block text-center">
                <li class="p-2"><a href="#home" class="#">Home</a></li>
                <li class="p-2"><a href="#buku" class="">Buku</a></li>
                <li class="p-2"><a href="#peminjam" class="">Peminjam</a></li>
                <li class="p-2"><a href="#about" class="">About</a></li>
            </ul>
        </div>
        
        