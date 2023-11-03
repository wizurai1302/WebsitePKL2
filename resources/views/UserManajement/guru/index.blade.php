@extends('layouts.master')
@section('content')
 <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6 col-7">
              <h6>Table Guru</h6>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
              <div class="dropdown float-lg-end pe-4">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#guruModal"> <i class="fa fa-plus-square"></i></a>
                <div class="input-group">
               <form method="get" action="">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Cari Berdasarkan Nama" value="{{ Request::get('search') }}">
                        {{-- <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div> --}}
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive p-0">
            <table class="table align-middle table-hover table-borderless">
                <thead>
                    <tr class="text-center">
                        <th>S/L</th>
                        <th>
                           Foto
                        </th>
                        <th>
                            Nama</th>
                        <th>
                           NUPTK</th>
                        <th>
                           Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($guru as $item)
                        <tr>
                            <td>{{ $loop->index + 1 + ($guru->currentPage() - 1) * $guru->perPage() }}</td>
                            <td class="text-center">
                                @if ($item->image != null)
                                <img src="{{ asset($item->image) }}" class="img-thumbnail rounded-circle avatar-lg" alt="avatar"><br />
                            @else
                                <img src="{{ asset('path-to-default-image.jpg') }}" class="img-thumbnail rounded-circle avatar-lg" alt="avatar"><br />
                            @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->nuptk ?? 'N/A' }}</td>
                            {{-- <td>{{ $item->phone ?? 'N/A' }}</td> --}}
                            {{-- <td>{{formatPrice($item->balance)}} --}}
                            </td>
                            {{-- <td>{!! $item->about !!} --}}
                            </td>
                            <td>
                                <a href="#" class="fa fa-edit text-primary" data-bs-toggle="modal" data-bs-target="#editGuru{{$item->id}}"></a>
                                <span style="margin-right: 10px;"></span>
                                <form action="{{ route('guru.destroy', $item->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <i class="fa fa-trash text-danger" type="submit" data-confirm-delete="true"></i>
                                </form>
                                @include('UserManajement.guru.edit')
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
                    {{ $guru->links() }}
                </div>
            </table>
        </div>
    </div>
@include('UserManajement.guru.create')
@endsection
