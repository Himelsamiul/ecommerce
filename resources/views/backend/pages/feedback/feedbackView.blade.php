@extends('backend.master')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        .jumbotron {
            background-color: #f8f9fa;
            margin-bottom: 0;
            padding: 2rem 1rem;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .card-text {
            font-size: 1.2rem;
        }
        .card-body {
            padding: 2rem;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }
        .container {
            max-width: 960px;
        }
    </style>
</head>

<body>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Contact</h1>
            
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                       
                        <div class="card-body">
                            <p class="card-text">{{$messages->message}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $messages->created_at->diffForHumans() }}</small>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGaJQ6FiGY5Wf5ItR5c5L2s1zz" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIygujFxaVrZIeRxTIbREy0baPbP1zO/t6tljKzT" crossorigin="anonymous"></script>
</body>
</html>
@endsection
