@extends('front.layout')
@section('title')
 - {!! $page->name !!}
@endsection
@section('content')

<div class="container">	
	{!! $page->content !!}
</div>

@endsection
@stop