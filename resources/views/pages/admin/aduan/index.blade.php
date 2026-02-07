@extends('layouts.admin')

@section('judul', 'Data Aduan')

@section('content')
    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="example1_filter" class="dataTables_filter breadcrumb float-sm-end"><label>Search:<input type="search"
                                    class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                        <form method="GET" class="row g-2 mb-3">

    {{-- FILTER TANGGAL --}}
    <div class="col-md-2">
        <input type="date" name="tanggal"
               value="{{ request('tanggal') }}"
               class="form-control">
    </div>

    {{-- FILTER BULAN --}}
    <div class="col-md-2">
        <select name="bulan" class="form-control">
            <option value="">-- Bulan --</option>
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}"
                    {{ request('bulan') == $i ? 'selected' : '' }}>
                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                </option>
            @endfor
        </select>
    </div>

    {{-- FILTER SISWA --}}
    <div class="col-md-3">
        <select name="siswa" class="form-control">
            <option value="">-- Siswa --</option>
            @foreach ($siswa as $s)
                <option value="{{ $s->id }}"
                    {{ request('siswa') == $s->id ? 'selected' : '' }}>
                    {{ $s->nama }} ({{ $s->NIS }})
                </option>
            @endforeach
        </select>
    </div>

    {{-- FILTER KATEGORI --}}
    <div class="col-md-3">
        <select name="kategori" class="form-control">
            <option value="">-- Kategori --</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->id }}"
                    {{ request('kategori') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- TOMBOL --}}
    <div class="col-md-2">
        <button class="btn btn-primary w-100">Filter</button>
    </div>

</form>


                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed"
                            aria-describedby="example1_info">
                            
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">No.
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Tanggal</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Nomor Aduan</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Nama Pengirim</th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">NIS
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Subjek</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aduan as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->nomor_aduan }}</td>
                                        <td>{{ $item->kategori->nama }}</td>
                                        <td>{{ $item->siswa->nama }}</td>
                                        <td>{{ $item->siswa->NIS }}</td>
                                        <td>{{ $item->subjek }}</td>
                                        <td> <span
                                                class="badge bg-{{ $item->status == 'menunggu' ? 'secondary' : ($item->status == 'proses' ? 'warning' : 'success') }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td> <a href="{{ route('admin.show', $item->id) }}" class="btn btn-sm btn-warning">
                                                Detail
                                            </a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to
                            10 of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination breadcrumb float-sm-end">
                                <li class="paginate_button page-item previous disabled" id="example1_previous"><a
                                        href="#" aria-controls="example1" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example1"
                                        data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                        data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                        data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                        aria-controls="example1" data-dt-idx="7" tabindex="0"
                                        class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
