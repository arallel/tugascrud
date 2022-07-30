<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-5.2.0/css/bootstrap.css') }}">
</head>
<body>
<div class="container text-center">
	@include('sweetalert::alert')
	<div class="row">
		@yield('isi')
	</div>
</div>
<script type="text/javascript" src="{{ asset('bootstrap-5.2.0/js/bootstrap.js') }}"></script>
</body>
</html>