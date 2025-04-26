
@include('partials.header')
<div class="header h-screen bg-[url('../../public/images/header/header.png')]">
    <div class="header-content flex w-full items-center justify-between h-screen ps-14 md:ps-20" >
        <div class="left align-middle flex-col" data-aos="fade-up">
            <h1 class="text-4xl md:w-[28rem] w-[24rem] font-bold">Halo, <span class="text-primary">Selamat Datang Di BookNest</span></h1>
            <h3 class="md:w-[28rem] w-[24rem] mt-2 text-justify">Anda dapat mengakses koleksi buku, jurnal, dan referensi lainnya, serta menikmati layanan peminjaman dan katalog online. Website ini dapat memudahkan Anda dalam menjelajahi dunia literasi. Selamat membaca!😊</h3>
            <button class="primary-btn mt-3">Get Started</button>
        </div>
        <div class="right md:block hidden" data-aos="fade-up" data-aos-delay="400">
            <img class="object-fill mt-48 me-10 w-[330px]" src="{{ asset('images/header/model2.png') }}" alt="">
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
            <a href="/buku">
                <h1 class="text-end text-primary mr-28 md:mr-52">Selengkapnya <i class="fa-solid fa-arrow-right"></i></h1>
            </a>

            {{-- card --}}
            <div class="card md:flex md:justify-center block justify-items-center gap-5 md:mt-0 mt-2">
                <div class="card-item rounded-md bg-gray-200 h-96 w-64 p-3 mb-3 shadow-lg mt-5 hover:mt-2 hover:border-2 hover:border-primary" style="transition: 0.3s" data-aos="fade-up">
                    <img src="{{ asset('images/categories/ilmukomputer2.png') }}" alt="">
                    <h1 class="text-center font-semibold">Ilmu Komputer</h1>
                    <h1 class="text-center">Buku tentang pemrograman, AI, keamanan siber, jaringan, dan teknologi digital.</h1>
                    <div class="button w-full flex justify-center mt-3">
                        <button class="btn-secondary">Readmore <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="card-item rounded-md bg-gray-200 h-90 w-64 p-[0.73rem] mb-3 shadow-lg mt-5 hover:mt-2 hover:border-2 hover:border-primary" style="transition: 0.3s;transition-delay: 100ms" data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('images/categories/kesehatan2.png') }}" alt="">
                    <h1 class="text-center font-semibold">Kesehatan</h1>
                    <h1 class="text-center">Buku tentang anatomi, penyakit, farmasi, kesehatan, dan medis klinis.</h1>
                    <div class="button w-full flex justify-center mt-3">
                        <button class="btn-secondary">Readmore <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="card-item rounded-md bg-gray-200 h-96 p-3 w-64 mb-3 shadow-lg mt-5 hover:mt-2 hover:border-2 hover:border-primary" style="transition: 0.3s;transition-delay: 200ms" data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('images/categories/memasak3.png') }}" alt="">
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
                <div class="card-item relative flex justify-center w-52 h-56 mt-4 hover:mt-2 shadow-2xl" style="transition: 0.3s;transition-delay:100ms; background-image: url('{{ asset('images/features/peminjaman2.png') }}');;background-size:cover;" data-aos="fade-up">
                    <h1 class="font-semibold text-white absolute bottom-1">Peminjaman</h1>
                </div>
                {{-- card item --}}
                <div class="card-item relative flex justify-center w-52 h-56 mt-4 hover:mt-2 shadow-2xl" style="transition: 0.3s;transition-delay:200ms; background-image: url('{{ asset('images/features/pengembalian2.png') }}');background-size:cover;" data-aos="fade-up">
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
@include('partials.footer')