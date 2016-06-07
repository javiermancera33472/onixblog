@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-sm-6 col-xs-12 ">
                    
                    @include("/members._show_events")
                    
                                   
		</div>
	</div>
        <div style="text-align: center">
            {!! $events !!}
        </div>
</div>

@endsection
