@include('partials.header')

<div class="container pt-20">
    <div class="categories h-full md:h-screen flex-row sm:px-5" id="Categories">
        {{-- judul --}}
        <div class="judul">
            <h1 class=" text-center pt-14 font-bold text-2xl">Semua Buku</h1>
        </div>

        {{-- selengkapnya --}}
        {{-- <h1 class="text-end text-primary mr-28 md:mr-52"><i class="fa-solid fa-book"></i> Pinjam</h1> --}}

        {{-- card --}}
        <div class="card md:flex md:justify-center block justify-items-center gap-5 md:mt-0 mt-2">
            <!-- Buku Ilmu Komputer -->
            @foreach ($data as $item)
            <div class="card-item rounded-md bg-gray-200 w-64 p-3 mb-3 shadow-lg mt-5 hover:mt-2 hover:border-2 hover:border-primary" style="transition: 0.3s" data-aos="fade-up">
                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794" alt="">
                <h1 class="text-center font-semibold">{{ $item->judul_buku }}</h1>
                <h1 class="text-center">Pengarang : {{ $item->pengarang }}</h1>
                <h1 class="text-center">Tahun Terbit : {{ $item->tahun_terbit }}</h1>
                <div class="button w-full flex justify-center gap-2 mt-3">
                    <button class="btn-secondary bg-white text-primary border-primary border-2 hover:border-blue-500 hover:bg-blue-500"><i class="fa-solid fa-book"></i> Detail</button>
                    <a href="/pinjam">
                        <button class="btn-secondary border-primary border-2 hover:border-blue-500 hover:bg-blue-500"><i class="fa-solid fa-book"></i> Pinjam</button>
                    </a>
                </div>
            </div>
            @endforeach

        
        </div>
        
    </div>

    <div class="daftar-pinjaman mx-auto px-2 py-8">
        <h2 class="text-2xl font-semibold mb-4">Daftar Buku yang Dipinjam</h2>
        
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-200 shadow-sm rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">#</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nis Peminjam</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama Peminjam</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Pengarang</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Tanggal Peminjaman</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Tanggal Pengembalian</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Denda</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">S212116</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Surawal</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Algoritma Dan Pemrograman</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rinaldi Munir</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">11-04-2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">18-04-2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">55000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{-- <a href="/pengembalian">
                                <button class="px-3 py-2 bg-primary text-white hover:bg-blue-700 transition">
                                    <i class="fa-solid fa-hand-holding-heart"></i> Kembalikan
                                </button>
                            </a> --}}

                            <a href="/pengembalian">
                                <button class="px-3 py-2 bg-red-500 text-white hover:bg-blue-700 transition">
                                    <i class="fa-solid fa-wallet"></i> Bayar Denda
                                </button>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@include('partials.footer')