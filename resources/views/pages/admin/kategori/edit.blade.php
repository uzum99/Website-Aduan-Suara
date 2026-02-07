@extends('layouts.admin')

@section('judul', 'Edit Kategori')

@section('content')

    <div class="card card-primary card-outline mb-4">

        <!--begin::Form-->
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!--begin::Body-->
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" 
                        value="{{ old('nama', $kategori->nama) }}" required>
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                    <button class="btn btn-primary">Update</button>
                </div>
                <!--end::Footer-->
        </form>
        <!--end::Form-->
    </div>

@endsection
