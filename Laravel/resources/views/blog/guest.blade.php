@extends('home')
@section('atr')

<div>
	<form class="in_line" action="/registr">
		<button type="submit">Регистрация</button>
	</form>

	<form class="in_line" action="/authorize">
		<button type="submit">Вход</button>
	</form>
</div>

@stop

@section('inf')
	<div class="main-info">
		@if ($result!=null )
		@foreach($result as $a)

		<div class="result">
			<div><b>Автор:</b> {{$a->author}}</div>
			<div><b>Тема:</b> {{$a->theme}}</div>
			<div>{{$a->text}}</div>
		</div>
			
		@endforeach
		@endif
	</div>
@stop