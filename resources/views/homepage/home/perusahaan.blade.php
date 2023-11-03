@extends('homepage.app')
@section('content')
<!-- Projects Section-->
<section class="py-5">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Perusahaan</span></h1>
        </div>
        <div class="row gx-4 gy-4">
            @foreach($perusahaan as $data )
            <div class="col-lg-4 col-xl-4 col-xxl-4">
                <div class="card rounded-4 border-0 shadow card-equal-height">
                    <img class="card-img-top" src="{{ asset('images/' . $data->image) }}" alt="...">
                    <div class="card-body">
                        <h2 class="card-title fw-bolder">{{$data->nama}}</h2>
                        <p class="card-text" style="height: 100px; overflow: hidden;">{{ $data->deskripsi }}</p>
                        <p class="text-muted mb-0">{{ $data->lokasi }}</p>
                        <div class="d-flex justify-content-center"> <!-- Membuat tombol menjadi berada di tengah -->
                            <a href="{{ route('homepage.show', $data->id) }}" class="btn btn-primary btn-block mt-3" data-id="{{ $data->id }}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
