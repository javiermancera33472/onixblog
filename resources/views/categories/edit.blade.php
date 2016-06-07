@extends('app')
@section('customcss')
{!! HTML::style('css/categories/index.css') !!}
@endsection
@section('customjs')
{!! HTML::script('js/categories/index.js') !!}
@endsection
@section('content')
<div class="panel panel-default">
                <div class="panel-heading">{{trans("Editing Record on")}} Categories</div>
                    <div class="panel-body">{!! Form::model($rows,(array('route' => 'categories/update', 'class' => 'form-horizontal'))) !!}
<!------------------------------------------------------------->
<!-- this is a row for a field category -->
<!------------------------------------------------------------->
<div class="form-group  @if ($errors->has("category")) has-error  @endif ">
{!! Form::label('category', trans('Category'), array('class'=>"col-md-4 control-label  required ")) !!}
<div class="col-md-6">{!! Form::text('category', old('category'),
array( 'maxlength'=>55 ,
'class'=>'form-control input-30',
'id'=> 'category',
'placeholder'=>'Category')) !!}
</div></div>

<!------------------------------------------------------------->
<!-- this is a row for a field status -->
<!------------------------------------------------------------->
<div class="form-group  @if ($errors->has("status")) has-error  @endif ">
{!! Form::label('status', trans('Status'), array('class'=>"col-md-4 control-label 1")) !!}
<div class="col-md-6">{!! Form::radio('status',1, old('status'),
array(
'class'=>'padding-10',
'id'=> 'status',
'placeholder'=>'Enter Status')) !!}{{trans('Active')}} <br>
{!! Form::radio('status',0, old('status'),
array(
'class'=>'padding-10',
'id'=> 'status',
'placeholder'=>'Enter Status')) !!}{{trans('Inactive')}} <br>
</div></div>

<div class="clearfix"></div>
<div class="form-group jmPadding-10" style="padding:10px;">
{!! Form::button('Cancel', array('class'=>'btn btn-warning pull-left','id'=>'closeMe')) !!}{!! Form::submit('Submit', array('class'=>'btn btn-success pull-right','id'=>'submitMe')) !!}</div>
{!! Form::hidden("id",$rows->id) !!}{!! Form::close()!!}
</div></div>
@endsection
