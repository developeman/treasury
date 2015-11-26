@extends('admin.layout')

	@section('title')
	Add Securitie
	@endsection

	@section('content')

	{!! Form::model($securities,['action' => ['AdminSecuritiesCtrl@update',$securities->id],'method' => 'PATCH']) !!}
		@include('admin.securities._form',['ButtonText'=>'Edit Security'])
	{!! Form::close() !!}


		
	@endsection
@stop