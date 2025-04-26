
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
            <h1 class="text-gray-400 text-sm">Copyright © 2025 BookNest | Made By Me</h1>
        </div>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
</body>
</html>