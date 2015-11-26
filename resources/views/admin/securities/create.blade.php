@extends('admin.layout')

	@section('title')
	Add Securitie
	@endsection
	@section('content')
		{!! Form::open(['method' => 'POST', 'action' => 'AdminSecuritiesCtrl@store', 'class' => 'form-body']) !!}
		
		    @include('admin.securities._form',['ButtonText'=>'Add security'])
		
		{!! Form::close() !!}
		
	@endsection
@stop
