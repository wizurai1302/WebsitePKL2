@extends('layouts.master')
@section('content')
<div class="col-12 mt-4">
    <div class="card mb-4">
      <div class="card-header pb-0 p-3">
        <h6 class="mb-1">Input Perusahaan</h6>
        <p class="text-sm">Perusahaan Magang</p>
      </div>
      <div class="card-body p-3">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card h-100 card-plain border">
                  <div class="card-body d-flex flex-column justify-content-center text-center">
                    <a href="javascript:;">
                      <i class="fa fa-plus text-secondary" data-bs-toggle="modal" data-bs-target="#perusahaanCreate"></i>
                      <h5 class="text-secondary">Input Perusahaan Magang</h5>
                    </a>
                  </div>
                </div>
              </div>
          @foreach ($perusahaan as $data)
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{ asset('images/' . $data->image) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">{{ $data->lokasi }}</p>
                <a href="javascript:;">
                  <h5>{{ $data->nama }}</h5>
                </a>
                <p class="mb-4 text-sm">
                  {{ $data->deskripsi }}
                </p>
                <!-- Tombol Delete -->
                <a href="javascript:;">
                  <i class="fa fa-trash text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $data->id }}"></i>
                </a>
                <!-- Tombol Edit -->
                <a href="javascript:;">
                  <i class="fa fa-edit text-primary" data-bs-toggle="modal" data-bs-target="#perusahaanEdit{{ $data->id }}"></i>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</div>
  <script>
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then(response => response.json())
    .then(provinces => {
        var data = provinces;
        var tampung = '<option> Pilih Provinsi </option>';
        data.forEach(element => {
            tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
        });
        document.getElementById('lokasi').innerHTML = tampung;
    });
    function previewPhoto(event) {
        var input = event.target;
        var preview = document.getElementById("photoPreview");
        var cancelButton = document.getElementById("cancelButton");

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = "block";
                cancelButton.style.display = "block";
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function cancelPhoto() {
        var input = document.getElementById("image");
        var preview = document.getElementById("photoPreview");
        var cancelButton = document.getElementById("cancelButton");

        input.value = ''; // Clear the file input
        preview.src = ''; // Clear the image preview
        preview.style.display = "none";
        cancelButton.style.display = "none";
    }
</script>

  @include('perusahaan.create')
  <!-- Tambahkan modal delete dan edit di sini -->
  @foreach ($perusahaan as $data)
    @include('perusahaan.delete', ['data' => $data])
    @include('perusahaan.edit', ['data' => $data])
  @endforeach
@endsection
