@extends('home')
@section('atr')
      <div align="center" class="hreff">
          <p>Авторизация</p>
      </div>
@stop

@section('inf')
	<div align="center">
      <form action="/auth">
          <p><input type="text" name="login" placeholder="Логин"></p>
          <p><input type="text" name="password" placeholder="Пароль"></p>
          <p><input type="hidden" name="_token" value="{{ csrf_token() }}"></p>
          <p><button type="submit">Войти</button></p>
      </form>
    </div>
@stop

@section('newPost')
    <form action="/registr">
      <button type="submit">Зарегистрироваться</button>
    </form>
    <p><form action="/">
      <button type="submit">На главную</button>
    </form></p>
@stop