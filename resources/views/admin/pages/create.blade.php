@extends('admin.layout')

	@section('title')
	Add Page
	@endsection
	@section('content')
		{!! Form::open(['method' => 'POST', 'action' => 'AdminPagesCtrl@store', 'class' => 'form-body']) !!}
			
			<?php
			 $securities = (object)['ct_id'=>0] ; 
			?>

		    @include('admin.pages._form',['ButtonText'=>'Add Page','securities'=>$securities])
		
		{!! Form::close() !!}
		
		<script>
			function sub() {	
				$('#sub').toggle('slow');
			}
		</script>
	@endsection
@stop
