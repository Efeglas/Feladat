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
                <h1 class="text-info">E-mail címek</h1>
              </div>      
            </div>
          </div>
        </section>  

      <div class="row">
          @if(session()->get('success'))
            <div class="col alert alert-success  mt-4">
            {{ session()->get('success') }}  
            </div>
          @endif
      </div>

      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">          
                  <div class="input-group-append">             
                  </div>
                </div>
              </div>

            </div>
        <div class="card-body table-responsive p-0">  
        <table class="table table-hover">
          <thead>
              <tr>
                <td>ID</td>         
                <td>E-mail</td>                 
                <td colspan = 2>Műveletek</td>
              </tr>
          </thead>
          <tbody>
              @foreach($emails as $email)
              <tr>
                  <td>{{$email->email_id}}</td>           
                  <td>{{$email->email}}</td>          
                  <td>
                      <a href="{{ route('emails.edit',$email->email_id)}}" class="btn btn-info">Módosítás</a>
                  </td>
                  <td>
                      <form action="{{ route('emails.destroy', $email->email_id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Törlés</button>
                      </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection