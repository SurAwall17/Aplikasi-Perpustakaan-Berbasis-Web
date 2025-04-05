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
        <nav class="nav flex justify-between px-2 md:px-32 py-3 fixed w-full z-10 bg-transparent transition-all duration-300">
            <div class="logo flex select-none cursor-pointer">
                <img src="{{ asset('images/icons/logo.png') }}" class="w-8 h-8 my-auto me-1" alt="">
                <h1 class="text-3xl font-semibold">Book<span class="text-primary">Nest.</span></h1>
            </div>
            <div class="menu flex gap-5 select-none">
                <ul class="md:flex gap-5 my-auto hidden">
                    <li><a href="#" id="menu-home" class="nav-link active p-1">Home</a></li>
                    <li><a href="#Categories" id="menu-categories" class="nav-link p-1">Categories</a></li>
                    <li><a href="#Features" id="menu-features" class="nav-link p-1">Features</a></li>
                    <li><a href="#about" id="menu-about" class="nav-link p-1">About</a></li>
                </ul>
                <div class="button hidden md:flex">
                    <button class="bg-white border-primary border-2 font-bold hover:bg-gray-300 ease-in-out duration-300 text-primary p-1 w-20 me-3">Sign Up</button>
                    <button class="primary-btn font-bold hover:bg-gray-300 ease-in-out duration-300 text-white p-1 w-20">Login</button>
                </div>
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
        
        <div class="header h-screen bg-[url('../../public/images/header/header.png')]">
            <div class="header-content flex w-full items-center justify-between h-screen ps-14 md:ps-20" >
                <div class="left align-middle flex-col" data-aos="fade-up">
                    <h1 class="text-4xl md:w-[28rem] w-[24rem] font-bold">Halo, <span class="text-primary">Selamat Datang Di BookNest</span></h1>
                    <h3 class="md:w-[28rem] w-[24rem] mt-2 text-justify">Anda dapat mengakses koleksi buku, jurnal, dan referensi lainnya, serta menikmati layanan peminjaman dan katalog online. Website ini dapat memudahkan Anda dalam menjelajahi dunia literasi. Selamat membaca!😊</h3>
                    <button class="primary-btn mt-3">Get Started</button>
                </div>
                <div class="right md:block hidden" data-aos="fade-up" data-aos-delay="400">
                    <img class="object-fill" src="{{ asset('images/header/model.png') }}" alt="">
                </div>
            </div>
            
        </div>

        {{-- Categories section --}}
        <div class="categories h-full md:h-screen flex-row sm:px-5" id="Categories">
            {{-- judul --}}
            <div class="judul">
                <h1 class=" text-center pt-14 font-bold text-2xl">Kategori Buku</h1>
            </div>
            <div class="sub-judul">
                <h1 class="text-center mb-5">Berbagai Kategori Buku Yang Tersedia</h1>
            </div>

            {{-- selengkapnya --}}
            <h1 class="text-end text-primary mr-28 md:mr-52">Selengkapnya <i class="fa-solid fa-arrow-right"></i></h1>

            {{-- card --}}
            <div class="card md:flex md:justify-center block justify-items-center gap-5 md:mt-0 mt-2">
                <div class="card-item rounded-md bg-gray-200 h-96 w-64 p-3 mb-3 shadow-lg mt-5 hover:mt-2 hover:border-2 hover:border-primary" style="transition: 0.3s" data-aos="fade-up">
                    <img src="{{ asset('images/categories/ilmu_komputer.png') }}" alt="">
                    <h1 class="text-center font-semibold">Ilmu Komputer</h1>
                    <h1 class="text-center">Buku tentang pemrograman, AI, keamanan siber, jaringan, dan teknologi digital.</h1>
                    <div class="button w-full flex justify-center mt-3">
                        <button class="btn-secondary">Readmore <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="card-item rounded-md bg-gray-200 h-96 w-64 p-[0.73rem] mb-3 shadow-lg mt-5 hover:mt-2 hover:border-2 hover:border-primary" style="transition: 0.3s;transition-delay: 100ms" data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('images/categories/kesehatan.png') }}" alt="">
                    <h1 class="text-center font-semibold">Kesehatan</h1>
                    <h1 class="text-center">Buku tentang anatomi, penyakit, farmasi, kesehatan, dan medis klinis.</h1>
                    <div class="button w-full flex justify-center mt-3">
                        <button class="btn-secondary">Readmore <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="card-item rounded-md bg-gray-200 h-96 p-3 w-64 mb-3 shadow-lg mt-5 hover:mt-2 hover:border-2 hover:border-primary" style="transition: 0.3s;transition-delay: 200ms" data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('images/categories/memasak.png') }}" alt="">
                    <h1 class="text-center font-semibold">Memasak</h1>
                    <h1 class="text-center">Buku tentang resep makanan, teknik memasak, dan tips kuliner.</h1>
                    <div class="button w-full flex justify-center mt-3">
                        <button class="btn-secondary">Readmore <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>


        {{-- Features Section --}}
        <div id="Features" class="features bg-gray-100 pb-8 md:h-[70vh]">
            {{-- judul --}}
            <div class="judul pt-14 text-center text-2xl font-bold">Features</div>
            <div class="sub-judul">
                <h1 class="text-center mb-2">Berbagai Fitur Yang Tersedia</h1>
            </div>
            
            {{-- card --}}
            <div class="card md:flex md:justify-center block justify-items-center gap-16">
                {{-- card item --}}
                <div class="card-item relative flex justify-center w-52 h-56 mt-4 hover:mt-2 shadow-2xl" style="transition: 0.3s; background-image: url('{{ asset('images/features/books.png') }}');;background-size:cover;" data-aos="fade-up">
                    <h1 class="font-semibold text-white absolute bottom-1">Buku</h1>
                </div>
                {{-- card item --}}
                <div class="card-item relative flex justify-center w-52 h-56 mt-4 hover:mt-2 shadow-2xl" style="transition: 0.3s;transition-delay:100ms; background-image: url('{{ asset('images/features/peminjaman.png') }}');;background-size:cover;" data-aos="fade-up">
                    <h1 class="font-semibold text-white absolute bottom-1">Peminjaman</h1>
                </div>
                {{-- card item --}}
                <div class="card-item relative flex justify-center w-52 h-56 mt-4 hover:mt-2 shadow-2xl" style="transition: 0.3s;transition-delay:200ms; background-image: url('{{ asset('images/features/pengembalian.png') }}');background-size:cover;" data-aos="fade-up">
                    <h1 class="font-semibold text-white absolute bottom-1">Pengembalian</h1>
                </div>
            </div>
        </div>

        {{-- Data Count Section --}}
        <div class="data-count flex gap-14 justify-center p-5 h-[30vh]" style="background-image: url('{{ asset('images/header/header.png') }}');background-size: cover;">
            <div class="data-count-content block justify-items-center md:flex md:justify-center items-center gap-5 h-full">
                <img class="md:w-32 w-20" src="{{ asset('images/data-count/buku.png') }}" alt="">
                <div class="text-center">
                    <h1 class="md:text-4xl text-2xl font-bold">100+</h1>
                    <h1 class="md:text-xl text-lg">Buku</h1>
                </div>
            </div>
            <div class="data-count-content block md:flex md:justify-center items-center gap-5 h-full">
                <img class="md:w-32 w-20" src="{{ asset('images/data-count/peminjam.png') }}" alt="">
                <div class="text-center">
                    <h1 class="md:text-4xl text-2xl font-bold">200+</h1>
                    <h1 class="md:text-xl text-lg">Peminjam</h1>
                </div>
            </div>
            <div class="data-count-content block md:flex md:justify-center items-center gap-5 h-full">
                <img class="md:w-32 w-20" src="{{ asset('images/data-count/anggota.png') }}" alt="">
                <div class="text-center">
                    <h1 class="md:text-4xl text-2xl font-bold">80+</h1>
                    <h1 class="md:text-xl text-lg">Anggota</h1>
                </div>
            </div>
        </div>

        {{-- Message Us --}}
        <div class="message h-auto mb-5">
            {{-- judul --}}
            <div class="judul pt-14 text-center text-2xl font-bold">Message Us</div>

            {{-- Message Content --}}
            <div class="message-content block md:flex md:justify-between mt-5 md:px-28 px-10 h-full">
                {{-- form --}}
                <form action="" class="h-full block p-5">
                    <div class="name flex justify-between md:gap-2">
                        <div class="form-group">
                            <input type="text" class="border-2 p-2 mb-3 outline-none" name="first_name" id="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="border-2 p-2 outline-none" name="first_name" id="first_name" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="block">
                        <div class="form-group">
                            <input type="text" class="border-2 p-2 mb-3 w-full outline-none" name="subject" id="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <input type="text" class="border-2 p-2 mb-3 w-full outline-none" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" cols="30" rows="7" class="border-2 w-full p-2 outline-none" placeholder="Write a message here..."></textarea>
                        </div>
                        <button class="btn-secondary w-24 mt-2">Send</button>
                    </div>

                </form>
                {{-- Location --}}
                <div class="location md:mt-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90090.24480708606!2d119.6597351463103!3d-3.708463697419056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d9449d562f8d4c9%3A0x2b7290c94a529d59!2sSALSA%20COMPUTER!5e0!3m2!1sid!2sid!4v1743327420974!5m2!1sid!2sid" width="500" height="355" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        {{-- Footer-Section --}}
        <div class="footer bg-gray-100 h-[30vh] flex justify-center items-center border-b-[1px]">
            <div class="contact border-e-2 w-60 h-28">
                <div class="footer-content flex">
                    <img src="{{ asset('images/icons/logo.png') }}" class="w-8 h-8 my-auto me-1" alt="">
                    <h1 class="text-3xl font-semibold">Book<span class="text-primary">Nest.</span></h1>
                </div>
                <div class="footer-content flex flex-col gap-1 mt-2">
                    <div class="whatsapp-icon flex">
                        <img src="{{ asset('images/social-media/whatsapp.png') }}" class="w-5 h-5 my-auto me-1" alt="">
                        <h1 class="text-sm font-semibold">082393063712</h1>
                    </div>
                    <div class="email-icon flex">
                        <img src="{{ asset('images/social-media/email.png') }}" class="w-5 h-5 my-auto me-1" alt="">
                        <h1 class="text-sm font-semibold">surawalawal15@gmail.com</h1>
                    </div>
                </div>
            </div>
            <div class="contact text-center w-60  border-e-2 h-28">
                <h1 class="font-bold">Menu</h1>
                <div class="menu flex flex-col">
                    <a href="#" id="menu-home" class="text-sm">Home</a>
                    <a href="#Categories" id="menu-categories" class="text-sm">Categories</a>
                    <a href="#Features" id="menu-features" class="text-sm">Features</a>
                    <a href="#About" id="menu-about" class="text-sm">About</a>
                </div>
            </div>
            <div class="Features text-center w-60  border-e-2 h-28">
                <h1 class="font-bold">Features</h1>
                <div class="menu flex flex-col">
                    <a href="#" class="text-sm">Daftar Buku</a>
                    <a href="#Categories" class="text-sm">Peminjaman</a>
                    <a href="#Features" class="text-sm">Pengembalian</a>
                </div>
            </div>
            <div class="Connect text-center w-60 h-28">
                <h1 class="font-bold">Connect with us</h1>
                <div class="menu flex justify-center mt-2 gap-5">
                    <a href="#facebook"><img class="w-6" src="{{ asset('images/social-media/facebook.png') }}" alt=""></a>
                    <a href="#facebook"><img class="w-6" src="{{ asset('images/social-media/twitter.png') }}" alt=""></a>
                    <a href="#facebook"><img class="w-6" src="{{ asset('images/social-media/youtube.png') }}" alt=""></a>
                    <a href="#facebook"><img class="w-6" src="{{ asset('images/social-media/instagram.png') }}" alt=""></a>
                </div>
            </div>
        </div>

        <div class="copyright p-4 text-center">
            <h1 class="text-gray-400 text-sm">Copyright © 2025 BookNest | Made By Surawal</h1>
        </div>

    {{-- Script --}}
    <script>
        // burger menu
        const burger = document.querySelector('.burger');
        const closeBurger = document.querySelector('.close-burger');
        const mobileNav = document.querySelector('.mobile-nav');

        // navigasi
        const menuHome = document.querySelector('#menu-home');
        const menuCategories = document.querySelector('#menu-categories');
        const menuFeatures = document.querySelector('#menu-features');
        const menuAbout = document.querySelector('#menu-about');

        burger.addEventListener('click', () => {
            mobileNav.classList.toggle('hidden');
            burger.classList.toggle('hidden');
            closeBurger.classList.toggle('hidden');
        });

        closeBurger.addEventListener('click', () => {
            mobileNav.classList.toggle('hidden');
            burger.classList.toggle('hidden');
            closeBurger.classList.toggle('hidden');
        });

        const navbar = document.querySelector('.nav');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('bg-transparent', window.scrollY < 5);
            navbar.classList.toggle('bg-white', window.scrollY > 5);
        });

        menuHome.addEventListener('click',()=>{
            menuHome.classList.add('active')
            menuCategories.classList.remove('active')
            menuFeatures.classList.remove('active')
            menuAbout.classList.remove('active')
        })
        menuCategories.addEventListener('click',()=>{
            menuCategories.classList.add('active')
            menuHome.classList.remove('active')
            menuFeatures.classList.remove('active')
            menuAbout.classList.remove('active')
        })
        menuFeatures.addEventListener('click',()=>{
            menuFeatures.classList.add('active')
            menuHome.classList.remove('active')
            menuCategories.classList.remove('active')
            menuAbout.classList.remove('active')
        })
        
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
</body>
</html>