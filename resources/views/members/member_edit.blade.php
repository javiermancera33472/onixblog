@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Member</div>
                                
                                <div class="clearfix"></div>    
				<div class="panel-body" style="padding:20px;">                                    
                                    @include("common._jmerrors")
                                    {!! Form::open(array('action' => 'MembersController@postupdate','class'=>'form-horizontal ')) !!}
                                    <div class="form-group">
                                    <label class="col-md-4 control-label">First Name</label>
                                    <div class="col-md-6">                                            
                                        {!! Form::text('first_name',$user->first_name, array('class' => 'form-control')) !!}
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-4 control-label">Last Name</label>
                                    <div class="col-md-6">                                            
                                    {!! Form::text('last_name',$user->last_name, array('class' => 'form-control')) !!}
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-6">                                            
                                    {!! Form::text('email',$user->email, array('class' => 'form-control','readonly')) !!}
                                    </div>
                                    </div>
                                    
                                  
                                                
                                   

                                    <div class="form-group">
                                    <label class="col-md-4 control-label">Zip Code</label>
                                    <div class="col-md-6">                                            
                                    {!! Form::text('zip_code',$user->zip_code, array('class' => 'form-control')) !!}
                                    </div>
                                    </div>



                                
                                    @role('admins')
                                    <div class="form-group">
                                    <label class="col-md-4 control-label">Status</label>
                                    <div class="col-md-6">                                            
                                    <div id="mode-group" class="btn-group" >
                                        <div class="radio">
                                            <label>
                                            <input type="radio" name="status" id="option1" value="0" <?php echo ($user->status == 0)?" checked ":"" ?>/> Inactive
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                            <input type="radio" name="status" id="option2" value="1" <?php echo ($user->status == 1)?" checked ":"" ?>/> Active
                                            </label>
                                        </div>    
                                      </div>

                                    </div>
                                    </div>
                                    @endrole
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


