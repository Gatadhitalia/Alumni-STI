<div class="modal fade" id="dialogTambahJob" tabindex="-1" aria-labelledby="dialogTambahJobLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dialogTambahJobLabel">Tambah Pekerjaaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Nama Instansi</label>
                            <div class="col-sm-9">        
                                <input type="text" class="form-control @error('nama_job') is-invalid @enderror" name="nama_job" value="{{ old('nama_job') }}" placeholder="Masukkan Nama Instansi">
                            </div>  
                        </div> 
                        <!-- error message untuk nim -->
                        @error('nama_job')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Periode<br>(ex : Januari 2000)</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('periode_masuk_job') is-invalid @enderror" name="periode_masuk_job" value="{{ old('periode_masuk_job') }}" placeholder="Periode Masuk"> 
                            </div>  
                            <label class="col-sm-2 col-form-label">Sampai</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control @error('periode_keluar_job') is-invalid @enderror" name="periode_keluar_job" value="{{ old('periode_keluar_job') }}" placeholder="Periode Keluar">
                            </div>                                     
                        </div>                       
                        <!-- error message untuk periode_masuk_intern -->
                        @error('periode_masuk_job')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- error message untuk periode_keluar_intern -->
                        @error('periode_keluar_job')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Jabatan Pekerjaan</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control @error('jabatan_job') is-invalid @enderror" name="jabatan_job" value="{{ old('jabatan_job') }}" placeholder="Masukkan Jabatan Pekerjaan">
                            </div>  
                        </div>  
                        <!-- error message untuk jabatan_job -->
                        @error('jabatan_intern')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="kota" class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" placeholder="Masukkan Nama Kota Tempat Universitas Berada" id="kota">
                                </div>
                        </div>   
                        @error('kota')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="negara" class="col-sm-3 col-form-label">Negara</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('negara') is-invalid @enderror" name="negara" value="{{ old('negara') }}" placeholder="Masukkan Nama Negara Tempat Universitas Berada" id="negara" >
                                </div>
                        </div>   
                        @error('negara')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row mb-3">
                            <label for="catatan" class="col-sm-3 col-form-label">Catatan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" id="catatan" rows="5" placeholder="Masukkan Catatan Akademik">{{ old('catatan') }}</textarea>
                                </div>
                        </div>   
                        @error('catatan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="modal-footer">
                        <button type="reset" class="btn btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>