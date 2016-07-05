<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

	@include('shared.header')

	@yield('content')

	@include('shared.footer')
	
	<script src="/assets/js/scripts.js" type='text/javascript'></script>
	<script src="https://code.jquery.com/jquery-3.0.0.min.js" type='text/javascript'></script>
</body>
</html>