<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin Felület</title>
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/bower_components/admin-lte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>         
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/logout') }}" class="nav-link">Kijelentkezés</a>
      </li>
    </ul>

  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/emails" class="brand-link">
      <img src="/bower_components/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/bower_components/admin-lte/dist/img/user9-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/emails" class="d-block">{{Auth::user()->username}}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">          

              <div class="nav-menu-right">
                <a href="{{ route('emails.create')}}" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>E-mail cím hozzáadás</p>
                </a>
              </div>

              <a href="{{ route('sendMail') }}" class="nav-link">
                <i class="fas fa-arrow-alt-circle-up nav-icon"></i>
                <p>Hírek kiküldése e-mailben</p>
              </a>
            
    </div>
  </aside>
  <div class="content-wrapper">
    <div class="content">
      <div class="container">
        @yield('main')
      </div>
    </div>
  
  </div>
 

  <footer class="main-footer">
  
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
  
    <strong>Copyright &copy; 2019 <a href="#">Laravel</a>.</strong> All rights reserved.
  </footer>
</div>

<script src="/bower_components/admin-lte/plugins/jquery/jquery.min.js"></script>

<script src="/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/bower_components/admin-lte/dist/js/adminlte.min.js"></script>
</body>
</html>
