<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Courses</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #eeeee4;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            
        </style>
    </head>
    <body>

        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav justify-content-center">
                      <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Students</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/courses') }}">Courses</a>
                      </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Create Student</div>
                        <div class="card-body">

                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            @if(session()->has('success'))

                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>

                            @endif
                            
                            <form action="{{ route('store.student') }}" method="POST">

                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row mt-3">
                                            <label class="col-form-label col-sm-4 text-md-right">Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="name" class="form-control"  value="{{ old('name') }}" placeholder="Enter Name">
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                            <label class="col-form-label col-sm-4 text-md-right">Year</label>
                                            <div class="col-sm-6">
                                                <input type="number" name="year" class="form-control" placeholder="Enter Year"  value="{{ old('year') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        @if(count($courses) > 0)
                                            <h5 class="card-title">Courses</h5>

                                            @foreach($courses as $course)
                                                <div class="form-check ml-2">
                                                  <input class="form-check-input" name="courses[]" type="checkbox" value="{{ $course->id }}" id="course-{{ $course->id }}">
                                                  <label class="form-check-label" for="course-{{ $course->id }}">
                                                    {{ $course->course_name  }}
                                                  </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9 offset-md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
