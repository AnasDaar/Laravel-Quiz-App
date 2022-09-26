<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    @if (Session::has('msg1'))
    <div class="alert alert-success" role="alert">
        <strong>{{Session::get('msg1')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    @if (Session::has('msg2'))
    <div class="alert alert-danger" role="alert">
        <strong>{{Session::get('msg2')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    <div class="container-xl">
        <h2 class="text-center display-3">List of all MCQs</h2>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-1">
                            <h2>Users <b></b></h2>
                        </div>
                        <div class="col-sm-7"><Button data-toggle="modal" data-target="#Modal_add" class="btn btn-primary">Add</Button></div>
                        <div class="col-sm-4">
                            <div class="search-box">

                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question <i class="fa fa-sort"></i></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $q)
                        <tr>
                            <td>{{$loop->index}}</td>
                            <td>{{$q->question}}?</td>
                            <td>
                                <a href="#" class="text-warning"  data-toggle="modal" data-target="#Modal_update{{$q->id}}">Update</a>
                                <a href="#" class="text-danger" data-toggle="modal" data-target="#Modal_delete{{$q->id}}">Delete</a>
                            </td>
                        </tr>
                        <!-- Modal-update -->
                        <div class="modal fade" id="Modal_update{{$q->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="/update">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <h5>Question :</h5>
                                            </div>
                                            <input style="visibility: hidden;" name="id" value="{{$q->id}}">
                                            <div class="row" style="padding: 10px;">
                                                <input name="question" value="{{$q->question}}" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><label>A:</label></div>
                                                <div class="col-md-6"><label>B:</label></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><input value="{{$q->a}}" name="opa"></div>
                                                <div class="col-md-6"><input value="{{$q->b}}" name="opb"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><label>C:</label></div>
                                                <div class="col-md-6"><label>D:</label></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><input value="{{$q->c}}" name="opc"></div>
                                                <div class="col-md-6"><input value="{{$q->d}}" name="opd"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Answer:</label>
                                                    <select name="ans" class="form-control">
                                                        <option value="{{$q->ans}}">{{$q->ans}}</option>
                                                        <option value="b">B</option>
                                                        <option value="c">C</option>
                                                        <option value="d">D</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-9"></div>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Questions</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <!-- Modal-delete -->
                        <div class="modal fade" id="Modal_delete{{$q->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="/delete">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input style="visibility: hidden;" name="id" value="{{$q->id}}">
                                           <h3>Are You Want To Delete the Question ?</h3>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete Questions</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>


<!-- Modal-Add -->
<div class="modal fade" id="Modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="/add">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5>Question :</h5>
                    </div>
                    <div class="row" style="padding: 10px;">
                        <input name="question" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6"><label>A:</label></div>
                        <div class="col-md-6"><label>B:</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><input name="opa"></div>
                        <div class="col-md-6"><input name="opb"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><label>C:</label></div>
                        <div class="col-md-6"><label>D:</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><input name="opc"></div>
                        <div class="col-md-6"><input name="opd"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Answer:</label>
                            <select name="ans" class="form-control">
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>
                        <div class="col-md-9"></div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Questions</button>
                </div>
            </form>
        </div>
    </div>
</div>













































<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>