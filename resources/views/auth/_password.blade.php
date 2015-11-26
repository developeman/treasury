@extends('front.sidebar')

@section('sidebar')
<style>
  .preloader  {
     position: absolute;
     top: 0px;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fff;
     opacity: 0.7;
     z-index: 999999999;

 }

#status  {
     width: 100px;
     height: 100px;
     position: fixed;
     left: 50%;
     right: 50%;
     top: 50%;
     background-image: url("{!! url('/') !!}/assets/global/img/ajax-loading.gif");
     background-repeat: no-repeat;
     background-position: center;
     margin: -100px 0 0 -100px;
     z-index: 9999999999;
 }
</style>
  
          <!-- BEGIN CONTENT -->
                  <div class="col-md-9 col-sm-9">
                    <h1>Login</h1>
                    <div class="content-form-page">
                      <div class="row">
                        <div class="col-md-7 col-sm-7">
                        	<!-- error section -->
                	@if (count($errors) > 0)
        						<div class="alert alert-danger" >
        							<strong>Whoops!</strong> There were some problems with your input.<br><br>
        							<ul>
        								@foreach ($errors->all() as $error)
        									<li>{{ $error }}</li>
        								@endforeach
        							</ul>
        						</div>
        					@endif
                  <div class="alert alert-danger hidden" id="error_resend">
                      <strong>Whoops!</strong> Sorry we couldn't process your request right now.<br>
                      Please try again Later .
                      <br>
                  </div>
                	<!-- error section -->
                  <form class="form-horizontal form-without-legend" method="POST" action="" role="form">
                    {!! Form::token() !!}
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">email </label>
                      <div class="col-lg-8">
                        <input type="email" value="{!! Session::get('user_email') !!}" name="email" class="form-control" disabled id="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">password <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="password" name="password" class="form-control" id="password">
                      </div>
                    </div>
                    
                    
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </div>
                    
                  </form>
                  <form>
                     {!! Form::token() !!}
                  <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                        <hr>
                        <div class="login-socio">
                            <p>
                              If you didn't recive your password <a onClick="resend()" style="color:red">click Here</a> to resend it
                            </p>
                        </div>
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
        <script>

          function resend () {
            $('body').addClass('preloader');
            $('#preloader').removeClass('hidden');
            $('#status').removeClass('hidden');
            $.ajax({
                url: 'resend',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: { _token: "{!! csrf_token() !!}"},
                success: function( data, textStatus, jQxhr ){
                    $('body').removeClass('preloader');
                    $('#preloader').addClass('hidden');
                    $('#status').addClass('hidden');
                    $('#error_resend').removeClass('hidden').removeClass('alert-danger').addClass('alert-success');
                    $('#error_resend').text('SMS sent successfully .');
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    $('body').removeClass('preloader');
                    $('#preloader').addClass('hidden');
                    $('#status').hide();
                    $('#error_resend').removeClass('hidden');
                }
            });
          }
        </script>
@endsection
