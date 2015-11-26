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
				{!! $securities->content !!}
				<hr>
				
				<div class="text-right">
					
					<a href="{!!Url('/')!!}/admin/pages/{!! $securities->id !!}/edit" class="btn btn-icon-only red">
							<i class="fa fa-edit"></i>
						</a>
						<a href="{!!Url('/')!!}/admin/pages/{!! $securities->id !!}/delete" class="btn btn-icon-only purple">
							<i class="fa fa-times"></i>
						</a>
						
				</div>
			</div>
		</div>
		

	@if(count($sub)>0)

		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-basket"></i>Sub pages :
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
				{!! Form::open(['url'=>url('/').'/admin/pages/sort']) !!}
				<table class="table table-responsive">
					<thead>
						<th width="100">#</th>
						<th>sort</th>
						<th>Page Name</th>
						<th>Options</th>
					</thead>
				@foreach($sub as $sp)
					<tbody>
						<tr>
							<td>{!! $sp->id !!}</td>
							<td width="75">{!! Form::input('number',$sp->id,$sp->sort,['class'=>'form-control', 'style' => 'width:75px;' ,'min'=>'0','max'=>'999'])!!}</td>
							<td>{!! $sp->name !!}</td>
							<td>
								<a href="{!!Url('/')!!}/admin/pages/{!! $sp->id !!}/edit" class="btn btn-icon-only red">
									<i class="fa fa-edit"></i>
								</a>
								<a href="{!!Url('/')!!}/admin/pages/{!! $sp->id !!}/delete" class="btn btn-icon-only purple">
									<i class="fa fa-times"></i>
								</a>
							</td>
						</tr>
					</tbody>
				@endforeach
				</table>
				{!! Form::submit('sort',['class'=>'btn btn-success']) !!}
				{!! Form::close() !!}
				{!! $sub->render(); !!}
			</div>
		</div>
		@endif
	@endsection

				
@stop





