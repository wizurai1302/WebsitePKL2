<form action="{{ route('kategori.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="modal fade text-left" id="editKategori{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="siswaModalLabel">
        <div class="modal-dialog modal-form">
            <div class="modal-content">
                <h5 class="modal-title" id="siswaModalLabel" style="text-align: center; margin-top:5vh;">Edit Jurusan</h5>
                <hr>
                <div class="modal-body">
                    <div class="modal-form-item">
                        <label for="nama">Jurusan</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Jurusan" value="{{ $item->nama_kategori }}" required>
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


