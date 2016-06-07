@extends('app')
@section('customcss')
{!! HTML::style('js/plugins/datatables/media/css/jquery.dataTables.css') !!}
@endsection
@section('customjs')
{!! HTML::script('js/plugins/datatables/media/js/jquery.dataTables.js') !!}
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading">Members</div>
				<div class="panel-body">                                    
                                    
                                    <table class="table" id='jmTable'>
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Year</th>
                                                <th>Grade</th>
                                                <th>School</th>
                                                <th>ZipCode</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @foreach($grid as $row)
                                        <?php 
                                        (is_null($row->year))?$year="":$year=$years[$row->year];
                                        (is_null($row->grade))?$grade="":$grade=$grades[$row->grade];
                                        
                                        ?>
                                        
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->first_name}}</td>
                                            <td>{{$row->last_name}}</td>
                                            
                                            <td>{{$row->email}}</td>
                                            <td>{{$year}}</td>
                                            <td>{{$grade}}</td>
                                            <td>{{$row->school}}</td>
                                            <td>{{$row->zip_code}}</td>
                                            @if ($row->status == 0)
                                            <td><span style="color:#ff0000">Inactive</span></td>
                                            @else
                                            <td><span style="color:green">Active</span></td>
                                            @endif
                                            
                                            <td>
                                                <a href="/members/edit/{{$row->id}}?page={{Request::get("page")}}" title="Edit this member"><span class="glyphicon glyphicon-edit"></span></a>
                                                
                                                <a href="/listorders/{{$row->id}}" title="Purchases for this member"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                                                <a href="/members/password/{{$row->id}}" title="Reset password for this member"><span class="glyphicon glyphicon-lock"></span></a>
                                            </td>
                                        </tr>   
                                        @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <div style="text-align:center;">           
                                    <div >
                                        <a id="exportMe" class="btn btn-primary">Export</a><br>
                                        <input type="hidden" id="exportName" value="members_" />
                                        <br>
                                    </div>
                                </div>
			</div>
		</div>
	</div>
    
</div>

@endsection
