@extends('components.navbar')
@section('content')
    
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        @error(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data gagal diubah, silahkan cek kembali form yang anda isi!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror

        <div class="card p-4">
            <h3 class="fw-bold">Extracurricular Data</h3>
            <div class="card-body">
                <div class="tambahdata mb-3 d-flex justify-content-end">
                    <a href="{{ route('eskul.create') }}" class="btn btn-success">Tambah Data</a>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto" style="width: 400px">
                        <form action="{{route('eskul.index') }}" method="GET">
                            <input type="search" id="search" name="search" placeholder="Search Nama" class="form-control" aria-describedby="passwordHelpInline">
                        </form>
                    </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr  class="align-middle" style="text-align: center">
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Anggota</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eskuls as $eskul)
                            <tr class="align-middle" @if($loop->odd)  style="background-color: #f1f3f5; text-align: center"  @endif>
                                <td class="align-middle" style="text-align: center">{{ $loop->iteration + $eskuls->firstItem() - 1 }}</td>
                                <td class="align-middle" style="text-align: center">{{ $eskul->nama }}</td>
                            
                                <td>
                                    @forelse ($eskul->students as $item)
                                        <ul class="align-middle text-center">
                                          {{ $item->nama }}
                                        </ul>
                                        @empty
                                        <div class="text-danger" class="align-middle" style="text-align: center"> Not Found Student Data  </div>
                                        @endforelse
                                  
                                </td>
                                <td>
                                    @forelse ($eskul->students as $item)
                                    <ul class="align-middle text-center">
                                        {{ $item->jurusan }}
                                      </ul>
                                      @empty
                                      <div class="text-danger" class="align-middle" style="text-align: center"> Not Found Student Data  </div>
                                      @endforelse
                                  
                                </td>
                                <td class="align-middle" style="text-align: center">
                            <a href="{{ route('eskul.edit',['eskul' => $eskul->id]) }}" class="btn btn-warning">Edit</a>
                            {{--  <a href="{{ route('item.destroy',['item' => $item->id]) }}" class="btn btn-danger">Delete</a>  --}}
                            <form action="{{ route('eskul.destroy',['eskul'=>$eskul->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mt-2">
                                    Delete
                                </button>
                            </form>
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-start sm">
                        Showing
                        {{ $eskuls->firstItem() }}
                        to
                        {{ $eskuls->lastItem() }}
                        of
                        {{ $eskuls->total() }}
                        entries
                    </div>
                    <div class="paginate d-flex justify-content-center sm">
                    {{ $eskuls->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection