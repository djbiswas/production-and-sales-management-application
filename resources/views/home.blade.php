<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SSTraders</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>
</head>

<body>
<div class="wrapper">
    <!-- Page Content  -->
    <div id="text-center">
        <div class="container-fluid">
            <div class="row bg-dark">
                <div class="col-lg-6 min-vh-100 d-flex justify-content-end align-items-center">
                    <a href="/admin/stone">
                        <div class="card text-center" style="width: 18rem;height: 18rem;">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <i class="far fa-gem display-1"></i>
                                <h2 class="card-title font-weight-bold">STONE</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 min-vh-100 d-flex justify-content-start align-items-center">
                    <a href="/admin/tiles">
                        <div class="card text-center" style="width: 18rem;height: 18rem;">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <i class="fas fa-gavel display-1"></i>
                                <h2 class="card-title font-weight-bold">TILES</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}

{{--<script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>--}}
</body>

</html>
