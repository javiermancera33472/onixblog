@extends('app')

@section('content')
<div class="container">

		<div class="col-md-12">
			
                                    <?php if (config('jmSettings')['JM_IS_SITE_DOWN'] == 0) { ?>
                                        @include('partials/welcome_site_up')
                                    <?php } else { ?>
                                        @include('partials/welcome_site_down')
                                    <?php } ?>
			
			

			
		</div>

</div>
@endsection
