@php
$current_route = request()->route()->getName();
@endphp

<!-- Main Sidebar Container -->

        {{-- <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
          </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <a href="{{route('logout')}}" class="dropdown-item">
            <i class="far fa-user"></i> Logout
            </a>
          </nav>
          <!-- /.navbar --> --}}

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image ">
      <div class="form-group text-center">

      {{-- <img src="{{asset('storage/profiles/' . Auth::user()->image) }}" alt="Existing Profile Image"
      class="img-circle elevation-3" style="width: 60px; height: 60px;"> --}}

      {{-- @if(Auth::user()->image)
      <img src="{{ asset('storage/profiles/' . Auth::user()->image) }}" alt="Existing Profile Image" class="img-circle elevation-3" style="width: 60px; height: 60px;">
      @else --}}
      {{-- <img src="{{ asset('storage/profiles/profile.jpg') }}" alt="" class="img-circle elevation-3" style="width: 60px; height: 60px;"> --}}
      {{-- @endif --}}
      <img src="../dist/img/avatar5.png " alt="" class="img-circle elevation-3" style="width: 60px; height: 60px;">

    </div></div>
    <div class="info">
      <a href="#" class="d-block m-3">{{auth('web')->user()->user_name}} </a>
           {{-- <a href="#" class="d-block m-3"> Admin </a> --}}
    </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
    <button class="btn btn-sidebar">
    <i class="fas fa-search fa-fw"></i>
    </button>
    </div>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    @role('Admin')
    <li class="nav-item {{ $current_route == 'dashboard' ? 'menu-open' : '' }}">
      <a href="{{ route('dashboard') }}" class="nav-link {{ $current_route == 'dashboard' ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
              Dashboard
          </p>
      </a>
      </li>
    @endrole

    @role('Doctor')
    <li class="nav-item {{ $current_route == 'dashboard' ? 'menu-open' : '' }}">
    <a href="{{ route('dashboard') }}" class="nav-link {{ $current_route == 'dashboard' ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
    </li>
    @endrole


    @hasanyrole('Admin|Doctor')
    <li class="nav-item {{$current_route=='userlist'?'menu-open':''}}">
    <a href="#" class="nav-link {{$current_route=='userlist'?'active':''}} ">
    <i class="nav-icon fas  fas fa-users"></i>
    <p>
    User Management
    <i class="right fas fa-angle-left"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="{{route('userlist')}}" class="nav-link {{$current_route=='userlist'?'active':''}}">
    <i class="far fas fa-user"></i>
    <p>Users List</p>
    </a>
    </li>
    </ul>

    <li class="nav-item {{ in_array($current_route, ['slotlist', 'appointment.listing']) ? 'menu-open active' : '' }}">
      <a href="#" class="nav-link {{ in_array($current_route, ['slotlist', 'appointment.listing']) ? 'active' : '' }}">
        <i class="fa fa-address-book" aria-hidden="true"></i>
        <p>
          Availability Management
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('slotlist') }}" class="nav-link {{ $current_route == 'slotlist' ? 'active' : '' }}">
            <i class="fa fa-list" aria-hidden="true"></i>
            <p>Doctor's Available Slot</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('appointment.listing') }}" class="nav-link {{ $current_route == 'appointment.listing' ? 'active' : '' }}">
            <i class="fa fa-list" aria-hidden="true"></i>
            <p>Appointment Details List</p>
          </a>
        </li>
      </ul>
    </li>
    
   
    {{-- <li class="nav-item {{$current_route=='slotlist'?'menu-open':''}}">
      <a href="#" class="nav-link {{$current_route=='slotlist'?'active':''}}">
        <i class="fa fa-address-book" aria-hidden="true"></i>
      <p>
      Availability Management
      <i class="right fas fa-angle-left"></i>
      </p>
      </a>
      <ul class="nav nav-treeview">
      <li class="nav-item">
      <a href="{{route('slotlist')}}" class="nav-link {{$current_route=='slotlist'?'active':''}}">
      <i class="fa fa-list" aria-hidden="true"></i>
      <p>Doctor's Available Slot</p>
      </a>
      </li>
      </ul>

      <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{route('appointment.listing')}}" class="nav-link {{$current_route=='appointment.listing'?'active':''}}" class="nav-link">
        <i class="fa fa-list" aria-hidden="true"></i>
        <p> Appointment Details List</p>
        </a>
        </li>
        </ul> --}}
        @endhasanyrole 
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>    