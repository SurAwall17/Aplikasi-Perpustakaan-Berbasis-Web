@include('partials.header')

<div class="container pt-20 bg-gray-500" >

    <div class="daftar-pinjaman mx-auto px-10 pb-8 ">
        <h2 class="text-2xl font-semibold mb-4 text-center">Daftar Buku yang Dipinjam</h2>
        
        <div class="overflow-x-auto ">
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
                    @foreach ($data as $item)
                        
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $no++ }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->user->nis }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->buku->judul_buku }}</td>
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
                                    <i class="fa-solid fa-wallet"></i> Bayar
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- @include('partials.footer') --}}