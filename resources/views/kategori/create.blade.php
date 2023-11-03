<form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="kategoriModal" tabindex="-1" role="dialog" aria-labelledby="kategoriModalLabel">
        <div class="modal-dialog modal-form">
            <div class="modal-content">
                <h5 class="modal-title" id="siswaModalLabel" style="text-align: center; margin-top:5vh;">Add Account Guru</h5>
                <hr>
                <div class="modal-body">
                    <div class="modal-form-item">
                        <label for="nama">Jurusan</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Jurusan" required>
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

