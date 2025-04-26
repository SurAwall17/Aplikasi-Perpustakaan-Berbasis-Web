@include('partials.header')

<div class="container pt-20">
  <form action="/pinjam" method="POST" class="bg-white p-10 rounded-lg shadow-md">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      {{-- Kolom Kiri --}}
      <div class="space-y-4">
        <div>
          <label for="peminjam" class="block text-sm font-medium text-gray-700">Nis</label>
          <input type="text" id="nis" value="{{ auth()->user()->nis }}" readonly name="peminjam" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        <div>
          <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
          <input type="text" id="kelas" name="kelas" value="{{ auth()->user()->kelas }}" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        <div>
          <label for="buku" class="block text-sm font-medium text-gray-700">Buku</label>
          <select name="id_buku" class="w-full mt-1 p-2 border rounded-md focus:outline-primary" id="daftar_buku">
            <option selected disabled>--Pilih Buku--</option>
            @foreach ($data as $item)
              <option value="{{ $item->id }}" data-pengarang="{{ $item->pengarang }}" data-stok="{{ $item->stok }}">{{ $item->judul_buku}}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
          <input type="number" disabled id="stok" name="stok" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
      </div>

      {{-- Kolom Kanan --}}
      <div class="space-y-4">
        <div>
          <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ auth()->user()->name }}" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        <div>
          <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700">Tanggal Peminjaman</label>
          <input type="date" id="tgl_peminjaman" name="tgl_peminjaman" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        <div>
          <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
          <input type="text" id="pengarang" disabled name="pengarang" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
        <div>
          <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
          <input type="date" id="tanggal_pengembalian" name="tgl_pengembalian" class="w-full mt-1 p-2 border rounded-md focus:outline-primary">
        </div>
      </div>
    </div>

    <div class="mt-6 flex justify-end">
      <button type="submit" class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">Simpan</button>
    </div>
  </form>
 

</div>

<script>
  const select = document.getElementById('daftar_buku')
  
  select.addEventListener('change', ()=> {
    const selectedOption = select.options[select.selectedIndex]
    const pengarang = selectedOption.getAttribute('data-pengarang')
    const stok = selectedOption.getAttribute('data-stok')
    document.getElementById('pengarang').value = pengarang
    document.getElementById('stok').value = stok
  })
</script>

@include('partials.footer')
