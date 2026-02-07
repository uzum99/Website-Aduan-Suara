@extends('layouts.main')

@section('content')
    <div class="container justify-content-center py-5">

    <img src="{{ asset('img/sukses.jpg') }}" 
         alt="Sukses" 
         width="300" 
         class="mb-4">

    <h2 class="fw-bold">Terima Kasih, Tiket Anda Terkirim</h2>

    <p class="mt-3 ">
        Terima kasih atas kiriman Anda, tim <strong>Sekolah-MUGA</strong>
        akan segera merespons aduan Anda.
    </p>

    <p class="mt-2">
        Nomor ID tiket aduan Anda yaitu:
    </p>

    <h4 class="fw-bold text-primary">
        {{ $aduan->nomor_aduan }}
    </h4>

    <div class="mt-4">
        <a href="{{ route('aduan.create') }}" class="btn btn-primary me-2">
            Kirim Aduan
        </a>

        <a href="{{ route('aduan.index') }}" class="btn btn-outline-primary">
            Lacak Tiket Aduan
        </a>
    </div>

</div>
@endsection