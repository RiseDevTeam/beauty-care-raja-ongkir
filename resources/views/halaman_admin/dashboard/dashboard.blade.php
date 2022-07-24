@extends('master_layouts.admin')

@section('title', 'Dashboard')

@section('admin')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container">
            {{-- <h3 class="text-center">SISTEM INFORMASI PENJUALAN DAN PERSEDIAAN PADA TOKO TRIO BUANA 2</h3> --}}
            <img src="{{ asset('gambar/market1.jpg') }}" width="70%" class="rounded mx-auto d-block">
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
