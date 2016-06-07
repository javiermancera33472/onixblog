@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Welcome </div>
				 <div class="panel-body">

                                <div class="li-info">
                                            <h3 class="ui-li-heading">Congratulations!</h3>
                                            <p class="full-info">
                                                    Your account has been created. 
                                            </p>

                                            <br>
                                            
                                    </div>                                     

                                     
                                    <div class="col-md-14 text-center"> 
                                            <a href="/auth/login" class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Login</a>
                                    </div>

				</div>
				<div class="clear:both"></div>

			</div>
		</div>
		
	</div>
</div>
@endsection
