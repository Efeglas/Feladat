<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Bejelentkezés</title> 
  </head>
  <body style="margin-top: 10% !important;">
    <div class="container text-info">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Bejelentkezés</h5>

            @if(isset(Auth::user()->username))
              <script>window.location = '/emails'</script>            
            @endif
  
            @if (count($errors) > 0)
              <div class="alert alert-warning">
                <ul>
                  @foreach($errors->all() as $error)
                    <li> {{$error}} </li>
                  @endforeach
                </ul>
              </div>
            @endif  
  
            @if ($errormsg = Session::get('error'))
              <div class="alert alert-warning">
                {{$errormsg}}
              </div>
            @endif

              <form class="form-signin m-auto" method="post" action="{{ url('/logincheck') }}">
                @csrf
                <div class="form-group">                      
                  <input type="text" class="form-control" placeholder="Felhasználónév" name="username" required autofocus>                     
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Jelszó" name="password" required>
                </div>     
                <button class="btn btn-lg btn-info btn-block" type="submit" name="login">Bejelentkezés</button>               
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
