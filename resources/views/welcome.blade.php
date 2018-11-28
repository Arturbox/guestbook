<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/').'/css/screen.css'}}">
    </head>
    <body>



    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th width="80px">id</th>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('email')</th>
                <th>text</th>
                <th>@sortablelink('created_at')</th>

            </tr>
                @foreach($clients as  $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->text }}</td>
                        <td>{{ $client->created_at->format('d-m-Y h:i:s') }}</td>
                    </tr>
                @endforeach
        </table>
        {!! $clients->appends(\Request::except('page'))->render() !!}











        <div class="row">
            <div class="col-md-3">
                {{ Form::open(array('url' => '/','class'=>'cmxform', 'id'=>"signupForm")) }}
                {{ Form::token()}}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" id="name" name="name" type="text">
                        </div>
                        <div class="form-group">
                            <label for="homepage">Home Page</label>
                            <input class="form-control" id="homepage" name="homepage" type="text">
                        </div>
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email">
                            </div>
                                <div class="form-group">
                            <label for="text">Text</label>
                            <textarea class="form-control" id="text" name="text" ></textarea>
                                </div>
                                    <div class="form-group">
                            <input  class="submit" type="submit" value="Submit">
                                    </div>


                {{ Form::close()}}
            </div>



        </div>
    </div>


    <div id="myModal" class="myModal">
        <div class="myModal-content">
            <span class="myclose">&times;</span>
            <p style="text-align: center;">
                @if (isset(session()->all()['thank']))
                    {{session()->all()['thank']}}
                @endif
            </p>
        </div>
    </div>
    <script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("myclose")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        @if (isset(session()->all()['thank']))
            modal.style.display = "block";
        @endif
    </script>


    <script src="{{url('/').'/js/jquery.js'}}"></script>
    <script src="{{url('/').'/js/jquery.validate.js'}}"></script>
    <script src="{{url('/').'/js/main.js'}}"></script>
    </body>
</html>
