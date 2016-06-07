@extends('app')
@section('customcss')
{!! HTML::style('css/blog/index.css') !!}
@endsection
@section('customjs')
{!! HTML::script('js/blog/index.js') !!}
@endsection
@section('content')

<div class="panel panel-default">
                <div class="panel-heading">{{trans("Editing Record on")}} Blog</div>
                    <div class="panel-body">{!! Form::model($rows,(array('route' => 'blog/update', 'class' => 'form-horizontal'))) !!}
<!------------------------------------------------------------->
<!-- this is a row for a field author_id -->
<!------------------------------------------------------------->
{!! Form::hidden('author_id', old('author_id'),
array(
'class'=>'form-control input-30',
'id'=> 'author_id',
'placeholder'=>'Author Id')) !!}
<!------------------------------------------------------------->
<!-- this is a row for a field post_date -->
<!------------------------------------------------------------->
{!! Form::hidden('post_date', old('post_date'),
array(
'class'=>'form-control input-30',
'id'=> 'post_date',
'placeholder'=>'Post Date')) !!}
<!------------------------------------------------------------->
<!-- this is a row for a field blog_title -->
<!------------------------------------------------------------->
<div class="form-group  @if ($errors->has("blog_title")) has-error  @endif ">
{!! Form::label('blog_title', trans('Blog Title'), array('class'=>"col-md-4 control-label  required ")) !!}
<div class="col-md-6">{!! Form::text('blog_title', old('blog_title'),
array( 'maxlength'=>155 ,
'class'=>'form-control input-30',
'id'=> 'blog_title',
'placeholder'=>'Blog Title')) !!}
</div></div>
<!------------------------------------------------------------->
<!-- this is a row for a field post_comment -->
<!------------------------------------------------------------->
<div class="form-group  @if ($errors->has("post_comment")) has-error  @endif ">
{!! Form::label('post_comment', trans('Post Comment'), array('class'=>"col-md-4 control-label 1")) !!}
<div class="col-md-6">{!! Form::textArea('post_comment', old('post_comment'),
array(
'class'=>'form-control input-30',
'id'=> 'post_comment',
'placeholder'=>'Post Comment')) !!}
</div></div>

<!------------------------------------------------------------->
<!-- this is a row for a field category_id -->
<!------------------------------------------------------------->
<div class="form-group  @if ($errors->has("category_id")) has-error  @endif ">
{!! Form::label('category_id', trans('Category Id'), array('class'=>"col-md-4 control-label  required ")) !!}
<div class="col-md-6">{!! Form::select('category_id',$categories, old('category_id'),
array(
'class'=>'form-control input-30',
'id'=> 'category_id',
'placeholder'=>'Enter Category Id')) !!}
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
