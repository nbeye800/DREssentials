<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
{{--  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">  --}}
</head>
<body>
    
<div class="container">

    <div class="card">
        <div class="card-header">
            <h4 class="text-center">VIEW SCHEDULES</h4>
            <a href="{{ url('/') }}" class="btn btn-primary"><span>Back To Home Page</span></a>
        </div>
        <div class="card body">
            <table class="table table-bordered">
                <thead>
                    <th>File Id</th>
                    <th>File</th>
                </thead>
                @foreach ($files as $file)
            <tr>
            
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ asset($file->pdffile) }}">{{ $file->pdffile }}</a></td>
           </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>

</body>
</html>