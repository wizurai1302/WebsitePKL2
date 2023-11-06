<form action="{{ route('profile.perusahaan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left modal-lg" id="profileperusahaanCreate" tabindex="-1" role="dialog" aria-labelledby="guruModalLabel">
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
                        <label for="alamat">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" required>
                      </div>
                    <div class="modal-form-item">
                        <label for="alamat">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                      </div>
                      <div class="modal-form-item">
                        <label for="facebook">Facebook *</label>
                        <label for="facebook">(Tidak Wajib Di isi)</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Url">
                      </div>
                    <div class="modal-form-item">
                        <label for="instagram">Instagram *</label>
                        <label for="instagram">(Tidak Wajib Di isi)</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Url">
                      </div>
                            <div class="modal-form-item">
                                <label for="lokasi">Lokasi/Wilayah</label>
                                <select class="form-select" name="lokasi" id="lokasi">
                                    <option>-- Pilih Lokasi --</option>
                                </select>
                            </div>
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









