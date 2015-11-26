@extends('front.layout')
@section('content')

 <div class="main">
      <div class="container">
        <ul class="breadcrumb">
           
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              @if(Auth::client()->check() == false)
              <li class="list-group-item clearfix"><a href="{!! Url('/') !!}/login"><i class="fa fa-angle-right"></i> Login</a></li>
              <li class="list-group-item clearfix"><a href="{!! Url('/') !!}/register"><i class="fa fa-angle-right"></i> Register</a></li>
              @else
              <li class="list-group-item clearfix"><a href="{!! Url('/') !!}/dashboard"><i class="fa fa-angle-right"></i> My account</a></li>
              <li class="list-group-item clearfix"><a href="{!! Url('/') !!}/dashboard/my_securities"><i class="fa fa-angle-right"></i> My Securities</a></li>
              <li class="list-group-item clearfix"><a href="{!! Url('/') !!}/"><i class="fa fa-angle-right"></i> Gifts box</a></li>
              <li class="list-group-item clearfix"><a href="{!! Url('/') !!}/"><i class="fa fa-angle-right"></i> Payments History</a></li>
              <li class="list-group-item clearfix"><a href="{!! Url('/') !!}/"><i class="fa fa-angle-right"></i> Earnings</a></li>
              @endif
            </ul>
          </div>
          <!-- END SIDEBAR -->

      

            @yield('sidebar')


      </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

@endsection
