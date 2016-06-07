@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Create Account</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="payment">
                                                <h3>Author Information</h3>
                                                <div class="paymentContent">                                                
                                                    <!------------------------------------------------------------->
                                                    <!-- this is a row for a field first_name -->
                                                    <!------------------------------------------------------------->
                                                    <div class="form-group @if ($errors->has("first_name")) has-error @endif ">
                                                    <label class="col-md-4 control-label">
                                                        {!! Form::label('author_first_name') !!}<span style='color:#ff0000'> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    {!! Form::text('first_name', old('first_name'),
                                                    array('required',
                                                    'class'=>'form-control', 
                                                    'id'=> 'first_name',
                                                    'placeholder'=>'Enter Author First Name')) !!}
                                                    @if ($errors->has("first_name")) <p class="help-block">{{ $errors->first("first_name") }}</p> @endif
                                                    </div></div>
                                                    <!------------------------------------------------------------->
                                                    <!-- this is a row for a field last_name -->
                                                    <!------------------------------------------------------------->
                                                    <div class="form-group @if ($errors->has("last_name")) has-error @endif ">
                                                    <label class="col-md-4 control-label">
                                                    {!! Form::label('author_last_name') !!}<span style='color:#ff0000'> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    {!! Form::text('last_name', old('last_name'),
                                                    array('required',
                                                    'class'=>'form-control ', 
                                                    'id'=> 'last_name',
                                                    'placeholder'=>'Enter Author Last Name')) !!}
                                                    @if ($errors->has("last_name")) <p class="help-block">{{ $errors->first("last_name") }}</p> @endif
                                                    </div></div>
                                                </div>
                                                    
                                                
                                            
                                                <!------------------------------------------------------------->
                                                <!-- this is a row for a field zip_code -->
                                                <!------------------------------------------------------------->
                                                <div class="form-group @if ($errors->has("zip_code")) has-error @endif ">
                                                <label class="col-md-4 control-label">
                                                {!! Form::label('zip_code') !!}<span style='color:#ff0000'> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                {!! Form::text('zip_code', old('zip_code'),
                                                array('required','maxlength' => 10,
                                                'class'=>'form-control input-40', 
                                                'id'=> 'zip_code',
                                                'placeholder'=>'Enter Zip Code')) !!}
                                                @if ($errors->has("zip_code")) <p class="help-block">{{ $errors->first("zip_code") }}</p> @endif
                                                </div></div>

                                    </div>
                                            <div class="accountInfo">
                                                <h3>Account Information</h3>
                                                <div class="paymentContent"> 
                                                    
                                                    <div class="form-group">
                                                            <label class="col-md-4 control-label">E-Mail Address<span style='color:#ff0000'> * </span></label>
                                                            <div class="col-md-6">
                                                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                            </div>
                                                    </div>

                                                    <div class="form-group">
                                                            <label class="col-md-4 control-label">Password<span style='color:#ff0000'> * </span></label>
                                                            <div class="col-md-6">
                                                                    <input type="password" class="form-control" name="password">
                                                            </div>
                                                    </div>

                                                    <div class="form-group">
                                                            <label class="col-md-4 control-label">Confirm Password<span style='color:#ff0000'> * </span></label>
                                                            <div class="col-md-6">
                                                                    <input type="password" class="form-control" name="password_confirmation">
                                                            </div>
                                                    </div>
                                                
                                                    
                                                </div>
                                            </div>
                                                <br>
                                                <div class="clearfix"></div>	



						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
                                                <div style="float:left">
                                                    <span style='color:#ff0000;font-size: 11px'> *  Required Fields</span>
                                                </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
