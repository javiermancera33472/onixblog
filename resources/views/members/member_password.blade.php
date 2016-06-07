@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Change Password</div>
				<div class="panel-body" style="padding:20px;">                                    
                                    @include("common._jmerrors")
                                    {!! Form::open(array('action' => 'MembersController@postupdatepassword','class'=>'form-horizontal ')) !!}
                                    @role('members')    
                                    <div class="form-group">                                    
                                    <label class="col-md-4 control-label">Current Password</label>
                                    <div class="col-md-6">                                            
                                        {!! Form::password('current_password',old('current_password'), array('class' => 'form-control')) !!}
                                    </div>
                                    </div>
                                    @endrole
                                    <div class="form-group">
                                    <label class="col-md-4 control-label">New Password</label>
                                    <div class="col-md-6"> 
                                        <input type="password" value="{{old('password')}}" class="form-control" name="password">                                    
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-4 control-label">Confirm Password</label>
                                    <div class="col-md-6">                                            
                                        <input type="password" value="{{old('password_confirmation')}}" class="form-control" name="password_confirmation">                                    
                                    </div>
                                    </div>
                                    
                                    
                                    {!! Form::hidden('id',$user->id, array('class' => 'form-control')) !!} 
                                    <div class="form-group jmPadding-10">
                                        <a href="/members?page={{Request::get("page")}}" class="btn btn-large btn-warning jmFormButton pull-left">Cancel</a>                                                                            
                                        {!! Form::submit('Update',array('class' => 'btn btn-large btn-primary jmFormButton pull-right')) !!}
                                    </div>
                                    {!! Form::close() !!}                                        
                                    
                                </div>
			</div>
		</div>
	</div>
    
</div>

@endsection


