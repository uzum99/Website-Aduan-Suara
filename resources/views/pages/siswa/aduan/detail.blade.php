@extends('layouts.main')

@section('content')
    <!-- Main -->
    <main class="container">
        <section>
            <img src="{{ asset('img/hero-1.png') }}" class="img-fluid mx-auto d-block" alt="Gambar Tiket Aduan"
                style="max-width: 500px;">
        </section>

        <section id="cek-tiket" class="text-center">
            <h4>#{{ $aduan->nomor_aduan }} - {{ $aduan->subjek }}</h4>
            <div class="row justify-content-center py-3">
                <div class="col-auto">{{ $aduan->siswa->nama }}</div>
                <div class="col-auto">NIS : {{ $aduan->siswa->NIS }}</div>
                <div class="col-auto">Tanggal : {{ $aduan->created_at->format('d M Y') }}</div>
                <div class="col-auto"> <span class=" badge bg-info"> {{ ucfirst($aduan->status) }} </span></div>
            </div>
        </section>
    </main>

    <div class="timeline w-50 mx-auto center">
        <!-- timeline time label -->
        <div class="time-label">
            <span class="bg-red">{{ $aduan->created_at->format('d M Y H:i') }}</span>
        </div>
        <!-- /.timeline-label -->
        <!-- timeline item -->
        <div>
            <i class="fas fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                <h3 class="timeline-header"><a href="#">Tiket Masuk</a></h3>

                <div class="timeline-body">
                    Tiket laporan dikirim oleh {{ $aduan->siswa->nama }}
                    dengan nomor tiket {{ $aduan->nomor_aduan }}
                    <p>Isi aduan "{{ $aduan->pesan }}"</p>
                </div>
            </div>
        </div>
        <!-- END timeline item -->


        @foreach ($aduan->umpanBalik as $fb)
            <!-- timeline time label -->
            <div class="time-label">
                <span class="bg-green">
                    {{ $fb->created_at->format('d M Y H:i') }}
                </span>
            </div>

            <!-- timeline item -->
            <div>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                    <span class="time">
                        <i class="fas fa-clock"></i>
                        {{ $fb->created_at->diffForHumans() }}
                    </span>

                    <h3 class="timeline-header">
                        <a href="#">Admin Feedback</a>
                    </h3>

                    <div class="timeline-body">
                        {{ $fb->feedback }}
                    </div>
                </div>
            </div>
        @endforeach

        <div>
            <i class="fas fa-clock bg-gray"></i>
        </div>
    </div>
@endsection
