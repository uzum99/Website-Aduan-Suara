@extends('layouts.main')

@section('content')

<!-- Main -->
<main class="container justify-content-center">
  <section id="cek-tiket">
    <img src="{{ asset('img/hero-1.png') }}" class="img-fluid mx-auto d-block" alt="Gambar Tiket Aduan" style="max-width: 500px;">
    <h1>Lacak Tiket Aduan</h1>
    <p class="tiket">Silahkan masukkan nomer tiket anda untuk melihat proses tiket aduan.</p>

    <form action="{{ route('aduan.lacak') }}" class="banner_search_form" method="POST">
      @csrf
      <div class="input-group input-group-lg w-50 mx-auto">
        <input class="form-control form-control-lg w-50 mx-auto" 
        type="text" placeholder="Tiket Aduan" name="nomor_aduan" >
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </section>

  <section id="lapor" class="text-center">
    <p>Kirim aduan insiden atau aspirasi suara ke tim 
      <strong>SMKS Muhammadiyah 3 Tegaldlimo</strong></p>
    <a href="{{ route('aduan.create')}}" class="btn btn-warning mt-3">Kirim Aduan</a>
  </section>
</main>

@endsection