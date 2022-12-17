@extends('components.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    @section('content')
    <div class="container mt-3">
        <div class="header">
            <h1>Dashboard</h1>
            <br>
            <p>This Page Displays<span style="color: pink"> Count Data</span> </p>
      

            <div class="row">
                <div class="col-3">
                  <div class="card" style="max-width: 18rem;">
                        <h5 class="card-header bg-primary text-white">Students <span<i class="bi bi-person-fill" style="float: right"></i></span></h5>
                        <div class="card-body">
                          <h5 class="card-title">Students Count</h5>
                          <p class="card-text">{{ $students }} Students</p>
                          <a href="/student" class="btn btn-primary">View Data</a>
                        </div>
                      </div>
                </div>

              
                <div class="col-3">
                  <div class="card" style="max-width: 18rem;">
                    <h5 class="card-header  bg-primary text-white">Extracurriculars <span <i class="bi bi-people-fill" style="float: right"></i></span></h5>
                    <div class="card-body">
                      <h5 class="card-title">Extracurriculars Count</h5>
                      <p class="card-text">{{ $extracurriculars }} Extracurriculars</p>
                          <a href="/eskul" class="btn btn-primary">View Data</a>
                        </div>
                      </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>