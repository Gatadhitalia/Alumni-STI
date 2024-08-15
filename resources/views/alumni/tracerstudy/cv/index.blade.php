@extends('alumni.layouts.main')
@section('title', 'CV')
@section('content')
    <!-- Tambahkan CSS untuk efek hover -->
    <style>
        a:hover i {
            transform: scale(1.2);
            color: #2980b9;
        }
        .card:hover {
        transform: translateY(-10px) scale(1.05); /* Memindahkan ke atas dan memperbesar */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Menambahkan efek bayangan */
    }
    </style>
    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand">
        <a class="navbar-brand" href="/admin" >
            <img src="{{ asset('images/logo-sti.png') }}" alt="Logo TI" width="250">
            <img src="{{ asset('images/logo-udinus.png') }}" alt="Logo udinus" width="55">
            <img src="{{ asset('images/logo-unggul.png') }}" alt="Logo udinus" width="40">
        </a>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search here..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch"/>
                <button class="btn" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            </li>
        </ul>
    </nav>
    <main class="container-border">
        <div class="row">    
            <!-- academic -->
            <div class="container">
                <div class="card" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <!-- Teks dan Ikon Berdampingan -->
                            <h1 class="me-2 mb-0">Akademik</h1>
                            <a href="{{ route('academic.index') }}">
                                <i class="lni lni-pencil-alt text-primary" style="font-size: 1.5rem;"></i> <!-- text-primary menggunakan warna primer Bootstrap -->
                            </a>
                        </div>
                        <hr class="my-3" style="border-width: 3px; border-color: #000;">
                        <div class="form" style="overflow-x: auto">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">IPK</th>
                                        <th scope="col">Judul Skripsi</th>
                                        <th scope="col">Dosen Wali</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($academics as $academic)
                                        <tr>
                                            <td>{{ $academic->nim }}</td>
                                            <td>{{ $academic->nama_mhs }}</td>
                                            <td>{{ $academic->email }}</td>
                                            <td>{{ $academic->ipk }}</td>
                                            <td>{{ $academic->judul_skripsi }}</td>
                                            <td>{{ $academic->dosen_wali }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center alert alert-warning">Data belum Tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $academics->links() }}   
                        </div>             
                    </div>            
                </div>
            </div>

            <!-- job -->
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <!-- Teks dan Ikon Berdampingan -->
                            <h1 class="me-2 mb-0">Akademik</h1>
                            <a href="{{ route('academic.index') }}">
                                <i class="lni lni-pencil-alt text-primary" style="font-size: 1.5rem;"></i> <!-- text-primary menggunakan warna primer Bootstrap -->
                            </a>
                        </div>
                        <hr class="my-3" style="border-width: 3px; border-color: #000;">
                        <div class="form" style="overflow-x: auto">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Periode Masuk</th>
                                    <th scope="col">Periode Keluar</th>
                                    <th scope="col">Alamat Instansi</th>                             
                                    <th scope="col">Website</th>
                                    <th scope="col">Jenis Pekerjaan</th>
                                    <th scope="col">Jabatan</th>    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobs as $job)
                                    <tr>
                                        <td>{{ $job->nama_job }}</td>
                                        <td>{{ $job->periode_masuk_job }}</td>
                                        <td>{{ $job->periode_keluar_job }}</td>
                                        <td>{{ $job->alamat_job }}</td>
                                        <td>{{ $job->link_job }}</td>
                                        <td>{{ $job->jns_job }}</td>
                                        <td>{{ $job->jabatan_job }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center alert alert-warning">Data belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $jobs->links() }} 
                        </div>               
                    </div>
                    
                </div>
            </div>

            <!-- internship -->    
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <!-- Teks dan Ikon Berdampingan -->
                            <h1 class="me-2 mb-0">Akademik</h1>
                            <a href="{{ route('academic.index') }}">
                                <i class="lni lni-pencil-alt text-primary" style="font-size: 1.5rem;"></i> <!-- text-primary menggunakan warna primer Bootstrap -->
                            </a>
                        </div>
                        <div class="form" style="overflow-x: auto">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Alamat Instansi</th>                               
                                    <th scope="col">Website</th>
                                    <th scope="col">Jenis Pekerjaan</th>
                                    <th scope="col">Jabatan</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($internships as $internship)
                                    <tr>
                                        <td>{{ $internship->nama_intern }}</td>
                                        <td>{{ $internship->periode_masuk_intern }} / {{ $internship->periode_keluar_intern }}</td>
                                        <td>{{ $internship->alamat_intern }}</td>
                                        <td>{{ $internship->link_intern }}</td>
                                        <td>{{ $internship->jns_intern }}</td>
                                        <td>{{ $internship->jabatan_intern }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center alert alert-warning">Data belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $internships->links() }}     
                        </div>           
                    </div>
                    
                </div>
            </div>

            <!-- organization -->
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h1 class="me-2 mb-0">Akademik</h1>
                            <a href="{{ route('academic.index') }}">
                                <i class="lni lni-pencil-alt text-primary" style="font-size: 1.5rem;"></i> <!-- text-primary menggunakan warna primer Bootstrap -->
                            </a>
                        </div>
                        <div class="form" style="overflow-x: auto">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Organisasi</th>
                                    <th scope="col">Periode Organisasi</th>                
                                    <th scope="col">Website Organisasi</th>
                                    <th scope="col">Tingkat Organisasi</th>
                                    <th scope="col">Jenis Organisasi</th>
                                    <th scope="col">Jabatan Organisasi</th>  
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($organizations as $organization)
                                    <tr>
                                        <td>{{ $organization->nama_org }}</td>
                                        <td>{{ $organization->periode_org }}</td>
                                        <td>{{ $organization->link_org }}</td>
                                        <td>{{ $organization->tingkat_org }}</td>
                                        <td>{{ $organization->jns_org }}</td>
                                        <td>{{ $organization->jabatan_org }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center alert alert-warning">Data belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $organizations->links() }}    
                        </div>            
                    </div>
                    
                </div>
            </div>

            <!-- award -->
            <div class="container">
                <div class="card">
                    <div class="card-body" style="overflow-x: auto">
                        <div class="d-flex align-items-center">
                            <h1 class="me-2 mb-0">Akademik</h1>
                            <a href="{{ route('academic.index') }}">
                                <i class="lni lni-pencil-alt text-primary" style="font-size: 1.5rem;"></i> <!-- text-primary menggunakan warna primer Bootstrap -->
                            </a>
                        </div>
                        <div class="form">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Award</th>
                                    <th scope="col">Nama Institusi Award</th>
                                    <th scope="col">Tingkat Award</th>
                                    <th scope="col">Tahun Award</th>
                                    <th scope="col">Deskripsi Award</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($awards as $award)
                                <tr>
                                    <td>{{ $award->nama_award }}</td>
                                    <td>{{ $award->institusi_award }}</td>
                                    <td>{{ $award->tingkat_award }}</td>
                                    <td>{{ $award->tahun_award }}</td>
                                    <td>{{ $award->deskripsi_award }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center alert alert-warning">Data belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $awards->links() }}      
                        </div>          
                    </div>
                    
                </div>
            </div>
            
            <!-- course -->
            <div class="container">
                <div class="card">
                <div class="card-body" style="overflow-x: auto">
                        <div class="d-flex align-items-center">
                            <h1 class="me-2 mb-0">Akademik</h1>
                            <a href="{{ route('academic.index') }}">
                                <i class="lni lni-pencil-alt text-primary" style="font-size: 1.5rem;"></i> <!-- text-primary menggunakan warna primer Bootstrap -->
                            </a>
                        </div>
                        <div class="form" style="overflow-x: auto">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Course</th>
                                    <th scope="col">Nama Institusi Course</th>
                                    <th scope="col">Tingkat Course</th>
                                    <th scope="col">Tahun Course</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr>
                                        <td>{{ $course->nama_course }}</td>
                                        <td>{{ $course->institusi_course }}</td>
                                        <td>{{ $course->tingkat_course }}</td>
                                        <td>{{ $course->tahun_course }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center alert alert-warning">Data belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $courses->links() }}  
                        </div>              
                    </div>
                </div>
            </div>

            <!-- skill -->
            <div class="container">
                <div class="card">
                    <div class="card-body" style="overflow-x: auto">
                        <div class="d-flex align-items-center">
                            <h1 class="me-2 mb-0">Akademik</h1>
                            <a href="{{ route('academic.index') }}">
                                <i class="lni lni-pencil-alt text-primary" style="font-size: 1.5rem;"></i> <!-- text-primary menggunakan warna primer Bootstrap -->
                            </a>
                        </div>
                        <div class="form" style="overflow-x: auto">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Kerjasama Tim</th>
                                        <th scope="col">Keahlian di Bidang IT</th>
                                        <th scope="col">Kemampuan Berbahasa Inggris</th>
                                        <th scope="col">Kemampuan Berkomunikasi</th>
                                        <th scope="col">Pengembangan Diri</th>
                                        <th scope="col">Kepemimpinan</th>
                                        <th scope="col">Etos Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($skills as $skill)
                                    <tr>
                                        <td>{{ $skill->kerjasama_skill }}</td>
                                        <td>{{ $skill->ahli_skill }}</td>
                                        <td>{{ $skill->inggris_skill }}</td>
                                        <td>{{ $skill->komunikasi_skill }}</td>
                                        <td>{{ $skill->pengembangan_skill }}</td>
                                        <td>{{ $skill->kepemimpinan_skill }}</td>
                                        <td>{{ $skill->etoskerja_skill }}</td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center alert alert-warning">Data belum Tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $skills->links() }}                
                    </div>
                    
                </div>
            </div>
        </div>
        <script>
            // Message with toastr
            document.addEventListener('DOMContentLoaded', function() {
                var successMessage = "{{ session('success') }}";
                var errorMessage = "{{ session('error') }}";

                if (successMessage) {
                    toastr.success(successMessage, 'BERHASIL!');
                } else if (errorMessage) {
                    toastr.error(errorMessage, 'GAGAL!');
                }
            });
        </script>
    </main>

    <footer class="py-4 mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Alumni</div>
                <div>
                    <a href="#" class="text-secondary">Privacy Policy</a>
                    &middot;
                    <a href="#" class="text-secondary">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>

@endsection