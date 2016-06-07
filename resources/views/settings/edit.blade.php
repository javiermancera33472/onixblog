@extends('app')
@section('customcss')
{!! HTML::style('css/settings/index.css') !!}
{!! HTML::style('css/bootstrap-datetimepicker.css') !!}
@endsection
@section('customjs')
{!! HTML::script('js/moment.js') !!}
{!! HTML::script('js/bootstrap-datetimepicker.js') !!}
@endsection
@section('content')
 <div class="panel panel-default">
                <div class="panel-heading">{{trans("Editing Record on")}} Settings</div>
                    <div class="panel-body">{!! Form::model($rows,(array('route' => 'settings/update', 'class' => 'form-horizontal'))) !!}
<!------------------------------------------------------------->
<!-- this is a row for a field app_value -->
<!------------------------------------------------------------->
<div class="form-group  @if ($errors->has("app_value")) has-error  @endif ">
{!! Form::label('app_value', trans('App Value'), array('class'=>"col-md-4 control-label  required ")) !!}
<div class="col-md-6">{!! Form::text('app_value', old('app_value'),
array(
'class'=>'form-control input-30',
'id'=> 'app_value',
'placeholder'=>'App Value')) !!}
</div></div>

<div class="clearfix"></div>
<div class="form-group jmPadding-10" style="padding:10px;">
{!! Form::button('Cancel', array('class'=>'btn btn-warning pull-left','id'=>'closeMe')) !!}{!! Form::submit('Submit', array('class'=>'btn btn-success pull-right','id'=>'submitMe')) !!}</div>
{!! Form::hidden("id",$rows->id) !!}{!! Form::close()!!}
</div></div>
@endsection
