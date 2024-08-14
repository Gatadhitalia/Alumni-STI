@extends('admin.layouts.main')
@section('title', 'kerja Populer')
@section('content')
    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand">
        <a class="navbar-brand" href="/admin" >
            <img src="{{ asset('images/logo-sti.png') }}" alt="Logo TI" width="250">
            <img src="{{ asset('images/logo-udinus.png') }}" alt="Logo udinus" width="55">
            <img src="{{ asset('images/logo-unggul.png') }}" alt="Logo udinus" width="40">
        </a>
        <form action="/lokeradmin" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search here..." aria-label="Search for..." name="search"
                    aria-describedby="btnNavbarSearch"/>
                <button class="btn" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            </li>
        </ul>
    </nav>
    <div class="container-border">
        <div class="d-flex flex-column mb-6 ml-5" style="width: 100%;">
            @php
            if (count($lokerAdmin) == 0) {
                echo '<div class="alert alert-warning" role="alert" style="text-align: left; width: 100%;">
                        No Lowongan Found. Silahkan isi lowongan.
                    </div>';
            }
            @endphp
            <div class="mb-2 d-flex justify-content-end" style="width: 100%;">
                <a href="{{ route('lokeradmin.manage') }}" class="btn btn-primary">
                    <i class="fas fa-cog"></i> Manage Lowongan
                </a>
            </div> 
        </div>

        <h4><b>Pekerjaan</b></h4>

        <div style="display: flex; justify-content: space-between;">
            <!-- Tabel Lowongan -->
            <div style="width: 60%;">
                <div class="p-2.5">
                    @unless(count($lokerAdmin) == 0)
                        @foreach($lokerAdmin as $listing)
                            <x-listingadmin-card :listing="$listing" />
                        @endforeach
                    @else
                        <p>No Lowongan Found. Silahkan isi lowongan.</p>
                    @endunless
                </div>
            </div>
        </div>
        <div class="mt-6 p-4">
            {{$lokerAdmin->links()}}
        </div>
    </div>
@endsection
