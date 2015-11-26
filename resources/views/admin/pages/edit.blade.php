@extends('admin.layout')

	@section('title')
	Edit Page
	@endsection

	@section('content')

	{!! Form::model($securities,['action' => ['AdminPagesCtrl@update',$securities->id],'method' => 'PATCH']) !!}
		@include('admin.pages._form',['ButtonText'=>'Edit Page'])
	{!! Form::close() !!}

<script>
			function sub() {	
				$('#sub').toggle('slow');

			}
		</script>
		
	@endsection
@stop