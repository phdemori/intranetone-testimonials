@extends('IntranetOne::io.layout.dashboard')

{{-- page level styles --}}
@section('header_styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/pickadate-full.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('io/services/io-testimonials.min.css') }}">
@stop

@section('main-heading')
@stop

@section('main-content')
	<!--section ends-->
			@component('IntranetOne::io.components.nav-tabs',
			[
				"_id" => "default-tablist",
				"_active"=>0,
				"_tabs"=> [
					[
						"tab"=>"Listar",
						"icon"=>"ico ico-list",
						"view"=>"Testimonials::table-list"
					],
					[
						"tab"=>"Cadastrar",
						"icon"=>"ico ico-new",
						"view"=>"Testimonials::form"
					],
				]
			])
			@endcomponent
	<!-- content -->
  @stop

@section('footer_scripts')

<script src="{{ asset('io/services/io-testimonials-babel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('io/services/io-testimonials-mix.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('io/services/io-testimonials.min.js') }}" type="text/javascript"></script>
@stop
