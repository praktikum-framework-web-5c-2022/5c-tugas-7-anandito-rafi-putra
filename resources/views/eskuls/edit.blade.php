@extends('components.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Extracurricular | Edit</title>
</head>
<body>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8">
                <h2>Extracurricular Data</h2>
                <p>Enter Extracurricular Data Completely</p>
               @if (session()->has('message'))
               <div class="my-3">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div> 
               @endif 
               <form action="{{ route('eskul.update',['eskul' => $eskul->id]) }}" method="POST">
                @method('PATCH')
                    @csrf
    
                    <div class="form-floating mb-3">
                        <input type="text" name="nama" placeholder="Input Extracurricular Name" id="nama" 
                        class="form-control" value="{{ old('nama') ?? $eskul->nama }}">
                        <label for="nama">Nama</label>
                        @error('nama')
                        <div class="text-danger">
                        {{ $message }}    
                        </div> 
                        @enderror
                    </div>
                    
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection