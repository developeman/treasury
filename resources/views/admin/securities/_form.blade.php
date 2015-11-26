			<div class="form-group @if($errors->first('name')) has-error @endif">
		        {!! Form::label('name', 'Name') !!}
		        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
		        <small class="text-danger">{{ $errors->first('name') }}</small>
		    </div>
		    <div class="form-group @if($errors->first('price')) has-error @endif">
		        {!! Form::label('price', 'price') !!}
		        {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
		        <small class="text-danger">{{ $errors->first('price') }}</small>
		    </div>
		    <div class="form-group @if($errors->first('disc')) has-error @endif">
		        {!! Form::label('disc', 'Discreption') !!}
		        {!! Form::textarea('disc', null, ['class' => 'form-control', 'required' => 'required']) !!}
		        <small class="text-danger">{{ $errors->first('disc') }}</small>
		    </div>
		
		    <div class="btn-group pull-right">
		        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
		        {!! Form::submit($ButtonText, ['class' => 'btn btn-success']) !!}
		    </div>
