<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="{{ url('css/imp.css') }}" />
</head>
<body>
	
		<h1>Блог</h1>
	<div>
		@yield('atr')
	</div>
			
	<div>
			@yield('inf')
	</div>
	
	<div>
			@yield('newPost')
	</div>
	

</body>
</html>