<nav class="navbar sticky-top navbar-expand-lg"
     style="background-color: #e3f2fd;" data-bs-theme="light">
  <div class="container">

    <!-- KIRI: Brand + Logo -->
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <img src="{{ asset('img/logo_icon.png') }}" alt="Logo Icon" width="32">
      <span>BinaSarana</span>
    </a>

    <!-- Toggle (mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- TENGAH: Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto gap-3">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('aduan.index') }}" class="btn btn-primary">
          Aduan Suara
        </a>
        </li>
      </ul>

      <!-- KANAN: Tombol -->
      <div class="d-flex gap-2">
            <a href="{{ route('login') }}" class="btn btn-outline-dark">
          Login Admin
        </a>
      </div>
    </div>

  </div>
</nav>
