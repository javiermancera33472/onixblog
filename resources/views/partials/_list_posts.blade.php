
<table class="table table-hover">
<thead>
<tr>
<th>{{trans('Author ')}}</th><th>{{trans('Post Date')}}</th><th>{{trans('Total Views')}}</th><th>{{trans('Category')}}</th><th>{{trans('Options')}}</th>
 </thead><tbody>
@foreach ($rows as $row)
<tr>
<td>{!!$row->first_name!!} {!!$row->last_name!!} </td>
<td>{!!date("m-d-Y H:i",$row->post_date)!!}</td>
<td>{!!$row->total_views!!}</td>
<td>{!!$row->category!!}</td>
<td>
<a href="/blog/show/{{$row->id}}" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-eye-open"></span>Show</a>
<a href="/blog/edit/{{$row->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span>Edit</a>
<a href="/blog/delete/{{$row->id}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete</a>
</td>
</tr>
@endforeach
</tbody></table>
<div class="clearfix">
<div class"pull-right">
<a href="/blog/create/" class="btn  btn-success"><span class="glyphicon glyphicon-plus"></span>Create</a>
</div>
</div><div class="clearfix">
<div class="center-block" style="text-align:center">
{!! $rows->render() !!}
</div>
