<form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left modal-lg" id="perusahaanCreate" tabindex="-1" role="dialog" aria-labelledby="guruModalLabel">
        <div class="modal-dialog modal-form">
            <div class="modal-content">
                <h5 class="modal-title" id="siswaModalLabel" style="text-align: center; margin-top:5vh;">Input Data Perusahaan</h5>
                <hr>
                <div class="modal-body">
                    <div class="modal-form-item">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
                    </div>
                    <div class="modal-form-item">
                        <label for="deskripsi">Deskripsi Perusahaan</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi" name="deskripsi" style="height: 100px"></textarea>
                    </div>
                    <div class="modal-form-item">
                        <label for="alamat">Alamat Perusahaan</label>
                        <textarea class="form-control" placeholder="Alamat Perusahaan" id="alamat" name="alamat"></textarea>
                      </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="modal-form-item">
                                <label for="lokasi">Lokasi/Wilayah</label>
                                <select class="form-select" name="lokasi" id="lokasi">
                                    <option>-- Pilih Lokasi --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="modal-form-item">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-select" name="jurusan" id="jurusan">
                                    <option value="">Pilih Jurusan</option>
                                    @foreach ($kategori as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <label class="form-label" for="photo">Input Foto *</label>
                    <label>Gambar harus 1920x1080p</label>
                    <input type="file" class="form-control" name="image" id="image" onchange="previewPhoto(event)" accept="image/*" />
                    <img id="photoPreview" alt="Preview Foto" style="display: none; max-width: 300px; max-height: 300px; margin-left: 250px; margin-top: 25px;" />
                    <button class="btn btn-primary btn-sm" type="button" onclick="cancelPhoto()" id="cancelButton" style="display: none;">Cancel</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('sweetalert::alert')









