			<div class="form-group @if($errors->first('name')) has-error @endif">
		        {!! Form::label('name', 'Name') !!}
		        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
		        <small class="text-danger">{{ $errors->first('name') }}</small>
		    </div>
			@if(count($pages)>0)
		   	<div id="type" class="form-group @if($errors->first('pagetype')) has-error @endif">
		   	    {!! Form::label('pagetype', 'Page Type') !!}
		   	    {!! Form::select('pagetype', ['Main Page','Sub Page'], $securities->ct_id > 0 ? 1 : 0 , ['id' => 'pagetype', 'class' => 'form-control', 'required' => 'required', 'OnChange'=>'sub()' ]) !!}
		   	    <small class="text-danger">{{ $errors->first('pagetype') }}</small>
		   	</div>
			@endif
		   	<div id="sub"  style="@if($securities->ct_id < 1) display:none; @endif" class="form-group @if($errors->first('pagetype')) has-error @endif">
		   	    {!! Form::label('main', 'Main Page') !!}
		   	    {!! Form::select('main',$pages, $securities->ct_id, ['id' => 'pagetype', 'class' => 'form-control',]) !!}
		   	    <small class="text-danger">{{ $errors->first('pagetype') }}</small>
		   	</div>

			{!! Form::hidden('ct_id', '') !!}

		    <div class="form-group @if($errors->first('content')) has-error @endif">
		        {!! Form::label('content', 'Content') !!}
		        {!! Form::textarea('content', null, ['class' => 'form-control ckeditor', 'required' => 'required']) !!}
		        <small class="text-danger">{{ $errors->first('content') }}</small>
		    </div>
		    <div class="btn-group pull-right">
		        {!! Form::submit($ButtonText, ['class' => 'btn btn-success']) !!}
		    </div>



