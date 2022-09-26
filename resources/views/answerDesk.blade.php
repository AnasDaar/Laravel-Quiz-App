<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <form action="/submitans" method="POST">
            @csrf
            <div class="col-md-4"></div>
        <div class="col-md-5">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h4># {{Session::get("nextq")}} : {{$question->question}}</h4>
            <br>
            <input name="ans" value="a" type="radio"> (A)<small>{{$question->a}}</small><br>
            <input name="ans" value="b" type="radio"> (B)<small>{{$question->b}}</small><br>
            <input name="ans" value="c"type="radio"> (C)<small>{{$question->c}}</small><br>
            <input name="ans" value="d" type="radio"> (D)<small>{{$question->d}}</small><br>
            <input value="{{$question->ans}}" style="visibility: hidden;" name="dbans">

        </div>
        <div class="col-md-3"><a href=""><button class="btn btn-primary" type="submit">NEXT</button></a></div>
        </form>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>