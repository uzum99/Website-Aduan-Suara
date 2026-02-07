                                                                                                                                                                            @extends('layouts.main')

@section('content')
<!-- Corousel/Foto slide -->
<div id="carouselExampleCaptions" class="carousel slide">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/foto1.jpg') }}" class="d-block w-100" alt="foto slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h3>Aplikasi Aduan Suara</h3>
                <p>Platform aduan dan aspirasi yang disediakan untuk siswa SMK MUGA.</p>
               <a href="{{ route('aduan.index') }}" class="btn btn-primary">
          Aduan Suara
        </a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/foto2.jpg') }}" class="d-block w-100" alt="foto slide 2">
            <div class="carousel-caption d-none d-md-block">
                <h3>Satu Aduan, Satu Perubahan</h3>
                <p>Semua aspirasi yang masuk berkumpul dalam satu platform.</p>
                <a href="{{ route('aduan.index') }}" class="btn btn-primary">
          Aduan Suara
        </a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Main -->
<main class="container">
    <section id="home">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                    <svg class="bi" width="1em" height="1em" aria-hidden="true">
                        <use xlink:href="#collection"></use>
                    </svg>
                </div>
                <h6 class="fs-2 text-body-emphasis">Layanan Pengaduan Sarana dan Prasarana</h6>
                <p>Menyediakan fasilitas bagi siswa untuk melaporkan kerusakan atau permasalahan sarana dan prasarana sekolah secara digital, disertai deskripsi dan dokumentasi pendukung. Setiap aduan tercatat dan dapat dipantau status tindak lanjutnya secara transparan.</p>
            </div>
            <div class="feature col">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3"> <svg class="bi" width="1em" height="1em" aria-hidden="true">
                        <use xlink:href="#people-circle"></use>
                    </svg> </div>
                <h6 class="fs-2 text-body-emphasis">Layanan Aspirasi dan Usulan Pengembangan</h6>
                <p>Menjadi wadah bagi siswa untuk menyampaikan aspirasi, saran, atau usulan pengembangan sarana dan prasarana sekolah guna mendukung kenyamanan dan kualitas proses pembelajaran.</p>
            </div>
            <div class="feature col">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3"> <svg class="bi" width="1em" height="1em" aria-hidden="true">
                        <use xlink:href="#toggles2"></use>
                    </svg> </div>
                <h6 class="fs-2 text-body-emphasis">Layanan Monitoring dan Tindak Lanjut</h6>
                <p>Memfasilitasi pihak sekolah (admin) dalam mengelola aduan dan aspirasi, memberikan umpan balik, serta memperbarui status penanganan sehingga siswa dapat mengetahui progres penyelesaian secara akuntabel.</p>
            </div>
        </div>
    </section>

</main>

@endsection