<?php 
use App\Securities;
?>

@extends('front.sidebar')
@section('sidebar')
	
<div class="row">
	<div class="col-lg-8">
		<table class="table table-responsive">
			<thead>
				<th>#</th>
				<th>name</th>
				<th>price</th>
				<th>Purchase Date</th>
			</thead>
			<tbody>
				@foreach($securities as $mysec)
				<?php $sec = Securities::where('id',$mysec->product_id)->get(); ?>
				<tr>
					<td>{!! $mysec->id !!}</td>
				@foreach($sec as $security)
					<td>{!! $security->name !!}</td>
					<td>{!! $security->price !!}</td>
				@endforeach
					<td>{!! $mysec->created_at !!}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-9">
		{!! $securities->render() !!}
	</div>
</div>
	
@endsection
@stop