@extends('admin.layout')
	@section('title')
	Securities
	@endsection

	@section('content')

	<a href="{!! Url('/') !!}/admin/securities/create" class="btn btn-icon-only green">
		<i class="fa fa-plus"></i>
	</a>
	<div class="logo">&ensp;
	</div>
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-basket"></i>Securities
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse" data-original-title="" title="">
					</a>
					<a href="{!! Request::url() !!}" class="reload">
					</a>
					<a href="javascript:;" class="remove" data-original-title="" title="">
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-bordered table-striped table-condensed">
				<thead class="flip-content">
				<tr>
					<th>
						 #
					</th>
					<th>
						 Securitie
					</th>
					<th class="numeric">
						 Discirption
					</th>
					<th class="numeric">
						 price
					</th>
					<th class="numeric">
						 Options
					</th>
				</tr>
				</thead>
				<tbody>
					@foreach($securities as $security)
				<tr>
					<td>
						 {!! $security->id !!}
					</td>
					<td>
						<a href="{!! Url('/') !!}/admin/securities/{!! $security->id !!}">
						 {!! str_limit($security->name , $limit = 25, $end = ' ...') !!}
						</a>
					</td>
					<td class="numeric">
						 {!!str_limit($security->disc , $limit = 100, $end = ' ...')!!}
					</td>
					<td class="numeric">
						 {!! $security->price !!}
						
					</td>
					<td class="numeric">
						<a href="{!!Url('/')!!}/admin/securities/{!! $security->id !!}/edit" class="btn btn-icon-only red">
							<i class="fa fa-edit"></i>
						</a>
						<a href="{!!Url('/')!!}/admin/securities/{!! $security->id !!}/delete" class="btn btn-icon-only purple">
							<i class="fa fa-times"></i>
						</a>
					</td>
					
				</tr>
				@endforeach
				</tbody>
				</table>
				<?php echo $securities->render(); ?>
			</div>
		</div>
	@endsection
@stop