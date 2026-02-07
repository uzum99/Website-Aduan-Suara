@extends('layouts.main')

@section('content')

<div class="container py-3">
  <div class="card w-50 mx-auto">
    <div class="card-body">
      <h4 class="card-title">Kirim Aduan Suara</h4>

      <form action="{{ route('aduan.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="nama">
          <div id="namaHelp" class="form-text">Isikan nama lengkap sesuai identitas siswa.</div>
        </div>

        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <input type="text" class="form-control" name="kelas">
          <div id="kelas" class="form-text">Isikan kelas yang sesuai.</div>
        </div>

        <div class="mb-3">
          <label for="NIS" class="form-label">NIS</label>
          <input type="text" class="form-control" name="NIS">
          <div id="NIS" class="form-text">Isikan nama lengkap sesuai Nomer Induk Siswa.</div>
        </div>
        
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <select class="form-select" name="id_kategori">
            @foreach ($kategori as $item)
            <option value="{{ $item->id }}"
                {{ old('id_kategori') == $item->id ? 'selected' : '' }}>
                {{ $item->nama }}
            </option>
            @endforeach
          </select>
          <div id="kategori" class="form-text">Pilih tipe aduan.</div>
        </div>

        <div class="mb-3">
          <label for="subjek" class="form-label">Subjek</label>
          <input type="text" class="form-control" name="subjek">
          <div id="NIS" class="form-text">Isikan subjek/judul aduan.</div>
        </div>

        <div class="mb-3">
          <label for="pesan" class="form-label">Pesan</label>
          <textarea type="text" class="form-control" name="pesan"></textarea>
          <div id="pesan" class="form-text">Deskripsikan aduan secara ringkas dan jelas.</div>
        </div>

        <div class="mb-3">
          <label for="lampiran" class="form-label">Lampiran</label>
           <input type="file" name="lampiran" class="form-control mt-2">
          <div name="lampiran" class="form-text">File laporan / bukti aduan pendukung yang relevan.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>

    </div>
  </div>
</div>
@endsection