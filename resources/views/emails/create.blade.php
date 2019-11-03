@extends('base')
@if (!isset(Auth::user()->username))
<script>window.location = '/'</script>
@endif

@section('main')
<div class="container-fluid">

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm">
              <h1 class="text-info">E-mail cím hozzáadás</h1>
            </div>           
          </div>
        </div>
      </section> 

      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    @if(session()->get('exist'))
        <div class="alert alert-danger">
        {{ session()->get('exist') }}  
        </div>
    @endif

  <div class="row">    
      <div class="col-md mt-4">      
        <div class="card card-primary">     
          <form method="post" action="{{ route('emails.store') }}">
              @csrf 
            <div class="card-body">
              <div class="form-group">           
                <input type="email" class="form-control" name="email" placeholder="E-mail cím">
              </div>                  
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Hozzáad</button>
              <a class="btn btn-info m-2" href="{{ url('/emails') }}">Vissza</a>
            </div>
          </form>
        </div>
      </div>    
  </div>

</div>
@endsection