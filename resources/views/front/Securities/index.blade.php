@extends('front.layout')
@section('content')

			<div class="main">
			      <div class="container">
			        <!-- BEGIN SIDEBAR & CONTENT -->
			        <div class="row margin-bottom-40">
			          <!-- BEGIN CONTENT -->
			          <div class="col-md-12 ">
					  <div class="col-sm-2">
					  </div>
					  <div class="col-sm-8">
			           <h1>Treasury Securities &amp; Programs</h1>
			            <div class="content-page">
			              <div class="row margin-bottom-30">
			                <!-- BEGIN INFO BLOCK -->               
			                <div class="col-md-12">
			                <p>
								NOTE: We’re introducing a new retirement savings account, the
								<a href="https://myra.gov" onmousedown="_sendEvent('Outbound','www.myra.gov','/',0);">
								<i>my</i>
								RA
								</a>
								.
							</p>
							<p>U.S. Treasury securities are a great way to invest and save for the future. Here, you'll find overviews regarding U.S. Treasury bonds, notes, bills, TIPS, and Floating Rate Notes (FRNs), as well as U.S. Savings Bonds.</p>
							<h2>Treasury Securities</h2>
							<p>Here's what's available:</p>
							@foreach($securities as $security)
							<a href="{!! Url('/')!!}/securities/{!! $security->id !!}">
								<h3>{!! $security->name !!}</h3>
							</a>
							<p>
								{!! str_limit($security->disc, $limit = 300, $end = ' ...')!!}
							</p>
							@endforeach
                			</div>
                <!-- END INFO BLOCK -->   
              			</div>
            		</div>
          		</div> 
			</div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

@endsection