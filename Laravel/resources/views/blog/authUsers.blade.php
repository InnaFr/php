@extends('home')
@section ('atr')

		<div>
			<form action="/exit">
				<button type="submit">Выход</button>
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


@section ('newPost')
		<form action="/create">
			<p>Автор: <input type="text" name="Login"></p>
			<p>Тема: <input type="text"  name="Theme" ></p>
			<p>Текст:<input type="text" height="100" name="Text"></p>
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<button type="submit">Создать запись</button>
		</form>
@stop