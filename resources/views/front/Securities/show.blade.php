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
									  <h3>{!! $securities->name !!}</h3></a>
										<p>
											{!! $securities->disc !!}
										</p>
										<hr>
										<div class="text-left">
										price : <strong>{!! $securities->price !!}</strong> USD	 
									 	</div>
										<div class="text-right">
											
					                    
					                    <a href="{!! Url('/') !!}/buy/0/{!! $securities->id !!}" class="btn btn-primary"> Buy </a>
					                    				  	
										</div>
									  </div>
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