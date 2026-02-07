@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    {{-- FLASH MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- =========================
        DETAIL ADUAN
    ========================== --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Detail Aduan</h5>
        </div>

        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="200">Nomor Aduan</th>
                    <td>: {{ $aduan->nomor_aduan }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>: {{ $aduan->kategori->nama }}</td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td>: {{ $aduan->siswa->nama }} (NIS: {{ $aduan->siswa->NIS }})</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>: {{ $aduan->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge bg-{{ 
                            $aduan->status == 'menunggu' ? 'secondary' :
                            ($aduan->status == 'proses' ? 'warning' : 'success')
                        }}">
                            {{ ucfirst($aduan->status) }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    {{-- =========================
        PESAN & LAMPIRAN
    ========================== --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Isi Aduan</h5>
        </div>

        <div class="card-body">
            <p>{{ $aduan->pesan }}</p>

            @if($aduan->lampiran)
                <a href="{{ asset('storage/'.$aduan->lampiran) }}" 
                   target="_blank" 
                   class="btn btn-sm btn-outline-primary">
                    Lihat Lampiran
                </a>
            @endif
        </div>
    </div>

    {{-- =========================
        UPDATE STATUS
    ========================== --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Update Status Aduan</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.status', $aduan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4">
                        <select name="status" class="form-control" required>
                            <option value="menunggu" {{ $aduan->status=='menunggu'?'selected':'' }}>Menunggu</option>
                            <option value="proses" {{ $aduan->status=='proses'?'selected':'' }}>Proses</option>
                            <option value="selesai" {{ $aduan->status=='selesai'?'selected':'' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-warning">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- =========================
        FORM FEEDBACK ADMIN
    ========================== --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Feedback Admin</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.feedback', $aduan->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <textarea name="feedback"
                              class="form-control"
                              rows="4"
                              placeholder="Tulis feedback untuk siswa..."
                              required></textarea>
                </div>

                <button class="btn btn-success">
                    Kirim Feedback
                </button>
            </form>
        </div>
    </div>

    {{-- =========================
        RIWAYAT FEEDBACK
    ========================== --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Riwayat Feedback</h5>
        </div>

        <div class="card-body">
            @forelse ($aduan->umpanBalik as $fb)
                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $fb->user->name }}</strong>
                        <small class="text-muted">
                            {{ $fb->created_at->format('d-m-Y H:i') }}
                        </small>
                    </div>
                    <p class="mb-0 mt-2">{{ $fb->feedback }}</p>
                </div>
            @empty
                <p class="text-muted">Belum ada feedback.</p>
            @endforelse
        </div>
    </div>

</div>
@endsection
