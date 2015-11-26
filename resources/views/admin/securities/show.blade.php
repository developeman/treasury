@extends('admin.layout')

	@section('title')
	{!! $securities->name !!}
	@endsection

	@section('content')

	
	
	<div class="logo">&ensp;
	</div>
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-basket"></i>{!! $securities->name !!}
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
				{!! $securities->disc !!}
				<hr>
				<div>price : <strong>{!! $securities->price !!}</strong></div>
				<div class="text-right">
					
					<a href="{!!Url('/')!!}/admin/securities/{!! $securities->id !!}/edit" class="btn btn-icon-only red">
							<i class="fa fa-edit"></i>
						</a>
						<a href="{!!Url('/')!!}/admin/securities/{!! $securities->id !!}/delete" class="btn btn-icon-only purple">
							<i class="fa fa-times"></i>
						</a>
						
				</div>
			</div>
		</div>

		
	@endsection
@stop