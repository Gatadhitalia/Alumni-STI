{{-- <div class="modal fade" id="dialogTambahLogang" tabindex="-1" aria-labelledby="dialogTambahLogangLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content"> --}}
            <div class="modal-header">
                <h5 class="modal-title" id="dialogTambahLogangLabel">Tambah Lowongan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                <form action="{{ route('logang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group row mb-3">
                        <label for="NamaPerusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="NamaPerusahaan" value="{{ old('company') }}">
                            @error('company')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Posisi" class="col-sm-2 col-form-label">Posisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Posisi" placeholder="Example: Senior Laravel Developer">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Alamat">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Email">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Pengalaman" class="col-sm-2 col-form-label">Pengalaman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Pengalaman" placeholder="Year">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Gaji" class="col-sm-2 col-form-label">Gaji</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Gaji">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="TipeMagang" class="col-sm-2 col-form-label">Tipe Magang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="TipeMagang" placeholder="Example: Remote, Part Time, etc">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="Deskripsi" rows="10" placeholder="Include tasks, requirements, etc"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Website" class="col-sm-2 col-form-label">Website /Application URL</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Website">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Tags" class="col-sm-2 col-form-label">Tags (Comma Separated)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Tags" placeholder="Example: Laravel, Backend, Postgres, etc">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Verify" class="col-sm-2 col-form-label">Buat publik:</label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="form-check-input" name="Verify" value="pending">
                            <label for="verify" class="form-check-label">Setuju</label>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div> --}}
                    <div class="form-group row mb-3">
                        <label for="NamaPerusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="NamaPerusahaan" value="{{ old('NamaPerusahaan') }}" required>
                            @error('NamaPerusahaan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Posisi" class="col-sm-2 col-form-label">Posisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Posisi" value="{{ old('Posisi') }}" placeholder="Example: Senior Laravel Developer" required>
                            @error('Posisi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Alamat" value="{{ old('Alamat') }}" required>
                            @error('Alamat')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="Email" value="{{ old('Email') }}" required>
                            @error('Email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Pengalaman" class="col-sm-2 col-form-label">Pengalaman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Pengalaman" value="{{ old('Pengalaman') }}" placeholder="Year" required>
                            @error('Pengalaman')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Gaji" class="col-sm-2 col-form-label">Gaji</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Gaji" value="{{ old('Gaji') }}" required>
                            @error('Gaji')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="TipeMagang" class="col-sm-2 col-form-label">Tipe Magang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="TipeMagang" value="{{ old('TipeMagang') }}" placeholder="Example: Remote, Part Time, etc" required>
                            @error('TipeMagang')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="Deskripsi" rows="10" placeholder="Include tasks, requirements, etc" required>{{ old('Deskripsi') }}</textarea>
                            @error('Deskripsi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Website" class="col-sm-2 col-form-label">Website /Application URL</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" name="Website" value="{{ old('Website') }}">
                            @error('Website')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Tags" class="col-sm-2 col-form-label">Tags (Comma Separated)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Tags" value="{{ old('Tags') }}" placeholder="Example: Laravel, Backend, Postgres, etc">
                            @error('Tags')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="Verify" class="col-sm-2 col-form-label">Buat publik:</label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="form-check-input" name="Verify" value="pending">
                            <label for="Verify" class="form-check-label">Setuju</label>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="logo">
                            @error('logo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                        {{-- <a href="/loker" class="btn btn-link">Back</a> --}}
                    </div>
                </form>
            </div>
        {{-- </div>
    </div>
</div> --}}
