<form action="{{ route('profile.perusahaan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="modal fade text-left modal-lg" id="profilePerusahaanEdit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="guruModalLabel">
        <div class="modal-dialog modal-form">
            <div class="modal-content">
                <h5 class="modal-title" id="siswaModalLabel" style="text-align: center; margin-top:5vh;">Edit Data Perusahaan</h5>
                <hr>
                <div class="modal-body">
                    <div class="modal-form-item">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{$item->nama}}" required>
                    </div>
                    <div class="modal-form-item">
                        <label for="alamat">Alamat Perusahaan</label>
                        <textarea class="form-control" placeholder="Alamat Perusahaan" id="alamat" name="alamat">{{$item->alamat}}</textarea>
                      </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="modal-form-item">
                                <label for="lokasi">Lokasi/Wilayah</label>
                                <select class="form-select" name="lokasi" id="lokasi">
                                    <option>-- Pilih Lokasi --</option>
                                        <option value="{{ $data->lokasi }}" @if($data->lokasi == $data->lokasi) selected @endif>{{ $data->lokasi }}</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
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



