{!! Form::open((array('route' => 'blog/search', 'class' => 'form-horizontal'))) !!}
    {!! Form::label('Category', trans('Category Id'), array('class'=>"col-md-2 control-label  required ")) !!}
    
    
             <div class="col-xs-6">
                <div class="input-group">
                    {!! Form::select('category_id',['null'=>'Please Select'] + $categories, old('category_id'),array('class'=>'form-control input-30',
            'id'=> 'category_id','placeholder'=>'Enter Category Id')) !!}
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">Go</button>
                    </span>
                </div>
            </div>
{!! Form::close()!!}
    <div class="clearfix"></div>
@foreach ($rows as $row)
    <div class="panel panel-default" style="margin:10px;padding: 10px;">
        <h1>{!!$row->blog_title!!}</h1>
        <div class="clearfix"></div>
        <h4>{!!date("m-d-Y H:i",$row->post_date)!!}</h4>
        <div class="clearfix"></div>
        <h4>By: {!!$row->first_name!!} {!!$row->last_name!!} </h4>
        <div class="clearfix"></div>
        <h4>Category: {!!$row->category!!}</h4>
        <div class="clearfix"></div>
        <h2>{!!$row->post_comment!!}</h2>
        <div class="clearfix"></div>
        <a href="/blog/show/{{$row->id}}" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-eye-open"></span>View</a>
        @if (Auth::check())
            <?php if ($row->author_id == \Auth::user()->id) { ?>
                <a href="/blog/edit/{{$row->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span>Edit</a>
            <?php } ?>
            <?php if(\Auth::user()->is('admins')) { ?>
                <a href="/blog/delete/{{$row->id}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete</a>
            <?php } ?>
        @endif
    </div>
    
    @endforeach
    <div class="clearfix">
<div class"pull-right">
<a href="/blog/create/" class="btn  btn-success"><span class="glyphicon glyphicon-plus"></span>Create</a>
</div>    