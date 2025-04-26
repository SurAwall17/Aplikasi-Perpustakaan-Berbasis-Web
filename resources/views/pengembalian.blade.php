@include('partials.header')

<div class="container pt-20">
  <form action="/pinjam" method="POST" class="bg-white p-10 rounded-lg shadow-md">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      {{-- Kolom Kiri --}}
      <div class="space-y-4">
        <div>
          <label for="peminjam" class="block text-sm font-medium text-gray-700">Peminjam</label>
          <input type="text" id="peminjam" name="peminjam" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        <div>
          <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
          <input type="text" id="kelas" name="kelas" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        <div>
          <label for="buku" class="block text-sm font-medium text-gray-700">Buku</label>
          <input type="text" id="buku" name="buku" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        <div>
          <label for="kondisi_buku" class="block text-sm font-medium text-gray-700">Kondisi Buku</label>
          <select id="kondisi_buku" name="kondisi_buku" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
            <option value="">-- Pilih Kondisi --</option>
            <option value="rusak ringan">Hilang</option>
            <option value="rusak ringan">Rusak Ringan</option>
            <option value="rusak berat">Rusak Berat</option>
          </select>
        </div>
        
      </div>

      {{-- Kolom Kanan --}}
      <div class="space-y-4">
        <div>
          <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input type="text" id="nama_lengkap" name="nama_lengkap" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        <div>
          <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700">Tanggal Peminjaman</label>
          <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        
        <div>
          <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
          <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>

        <div>
          <label for="pengarang" class="block text-sm font-medium text-gray-700">Denda</label>
          <input type="text" id="pengarang" name="pengarang" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
      </div>
    </div>

    <div class="mt-6 flex justify-end">
      <button type="submit" class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">Simpan</button>
    </div>
  </form>
 

</div>

@include('partials.footer')
