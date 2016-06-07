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
<div class="panel-heading">{{trans("Showing Records for table")}} settings</div>
<div class="panel-body">
<table class="table table-hover">
<thead>
<tr>
<th>{{trans('App Value')}}</th><th>{{trans('Options')}}</th>
 </thead><tbody>
@foreach ($rows as $row)
<tr>
<td>{!!$row->app_value!!}</td>
<td>
<a href="/settings/edit/{{$row->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span>Edit</a>
</td>
</tr>
@endforeach
</tbody></table>
<div class="clearfix">
<div class="center-block" style="text-align:center">
{!! $rows->render() !!}
</div>
</div>
@endsection
