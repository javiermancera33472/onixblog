@extends('app')

@section('content')


			
                                    <?php if (config('jmSettings')['JM_IS_SITE_DOWN'] == 0) { ?>
                                        @include('partials/welcome_site_up')
                                    <?php } else { ?>
                                        @include('partials/welcome_site_down')
                                    <?php } ?>
			
			

			

@endsection
