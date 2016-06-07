@extends('app')
@section('customcss')
{!! HTML::style('css/categories/index.css') !!}
@endsection
@section('customjs')
{!! HTML::script('js/categories/index.js') !!}
@endsection
@section('content')
<div class="panel panel-default">
<div class="panel-heading">{{trans("forms.Showing Records for table")}} categories</div>
<div class="panel-body">
<table class="table table-hover">
<thead>
<tr>
<th>{{trans('Category')}}</th>
<th>{{trans('Status')}}</th>
<th>{{trans('Options')}}</th>
 </thead><tbody>
@foreach ($rows as $row)
<tr>
<td>{!!$row->category!!}</td>
@if ($row->status == 0)
<td><span style="color:#ff0000">{{trans("Inactive")}}</span></td>
@else
<td><span style="color:green">{{trans("Active")}}</span></td>
@endif

<td>
<a href="/categories/edit/{{$row->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span>Edit</a>
</td>
</tr>
@endforeach
</tbody></table>
<div class="clearfix">
<div class"pull-right">
<a href="/categories/create/" class="btn  btn-success"><span class="glyphicon glyphicon-plus"></span>Create</a>
</div>
</div><div class="clearfix">
<div class="center-block" style="text-align:center">
{!! $rows->render() !!}
</div>
</div>
@endsection
