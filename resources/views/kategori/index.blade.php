@extends('layouts.master')
@section('content')
 <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6 col-7">
              <h6>Table Kategori</h6>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
              <div class="dropdown float-lg-end pe-4">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kategoriModal"> <i class="fa fa-plus-square"></i></a>
                <div class="input-group">
               <form method="get" action="">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Cari Berdasarkan Nama" value="{{ Request::get('search') }}">
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive p-0">
            <table class="table align-center table-hover table-borderless">
                <thead>
                    <tr class="text-center">
                        <th>S/L</th>
                        <th>
                            Nama</th>
                        <th>
                           Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($kategori as $item)
                        <tr>
                            <td>{{ $loop->index + 1 + ($kategori->currentPage() - 1) * $kategori->perPage() }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>
                                <a href="#" class="fa fa-edit text-primary" data-bs-toggle="modal" data-bs-target="#editKategori{{$item->id}}"></a>
                                <span style="margin-right: 10px;"></span>
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <i class="fa fa-trash text-danger" type="submit" data-confirm-delete="true"></i>
                                </form>
                                @include('kategori.edit')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <h3 class="text-center">Tidak Ada Data Ditemukan</h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <div class="float-left">
                    {{ $kategori->links() }}
                </div>
            </table>
        </div>
    </div>
@include('kategori.create')
@endsection
