@extends('components.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahasiswa | Create</title>
</head>
<body>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8">
                <h2>Students Data</h2>
                <p>Masukkan data mahasiswa dengan lengkap</p>
               @if (session()->has('message'))
               <div class="my-3">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div> 
            
               @endif 
                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="nis" placeholder="Input NIS" id="nis"  value="{{ old('nis')}}"
                        class="form-control">
                        <label for="nis">NIS</label>
                        @error('nis')
                        <div class="text-danger">
                        {{ $message }}    
                        </div> 
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="nama" placeholder="Input Nama" id="nama" 
                        class="form-control" value="{{ old('nama') }}">
                        <label for="nama">Nama</label>
                        @error('nama')
                        <div class="text-danger">
                        {{ $message }}    
                        </div> 
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="umur" id="umur" placeholder="Input Age" 
                        value="{{ old('umur')}}" class="form-control">
                        <label for="umur">Umur</label>
                        @error('umur')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                <div class="form-floating mb-3  ">
                    <select name="jurusan" placeholder="Input Jurusan" id="jurusan" class="form-select">
                        <option value="IPA" {{ old('jurusan') == "IPA" ? "selected" : "" }}>IPA</option>
                        <option value="IPS" {{ old('jurusan') == "IPS" ? "selected" : "" }}>IPS</option>
                    </select>
                    <label for="jurusan">Select Jurusan</label>
                    @error('jurusan')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="eskul_id" class="form-label">extracurriculars</label>
                <div class="form-group">
                    @foreach ($eskuls as $eskul)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="eskul_id[]" id="{{ $eskul->id }}" value="{{ $eskul->id }}" {{ $eskul->students()->find($eskul->id) ? '' : '' }}>
                        <label for="{{ $eskul->id }}" class="form-check-label">{{ $eskul->nama }}</label>
                    </div>
                        
                    @endforeach
                </div>
            </div>
                
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection