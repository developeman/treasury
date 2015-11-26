@extends('front.sidebar')
@section('sidebar')
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Login</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                	<!-- error section -->
                	@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
        	<!-- error section -->
          <form class="form-horizontal form-without-legend" method="POST" action="" role="form">
            {!! Form::token() !!}
            <div class="form-group">
              <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="email" name="email" class="form-control" id="email">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-4 col-sm-4 pull-right">
          <div class="form-info">
            <h2><em>Important</em> Information</h2>
            <p>Duis autem vel eum iriure at dolor vulputate velit esse vel molestie at dolore.</p>

            <button type="button" class="btn btn-default">More details</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END CONTENT -->  
@endsection
