@extends('home')
@section('atr')
      <div align="center" class="hreff">
          <p>Регистрация</p>
      </div>
@stop

@section('inf')
    <div align="center">
      <form action="/reg">
          <p><input type="text" name="login" placeholder="Логин"></p>
          <p><input type="text" name="name" placeholder="Имя"></p>
          <p><input type="text" name="lastName" placeholder="Фамилия"></p>
          <p><input type="text" name="age" placeholder="Возраст"></p>
          <p><input type="text" name="country" placeholder="Страна"></p>
          <p><input type="text" name="email" placeholder="Email"></p>
          <p><input type="text" name="password" placeholder="Пароль"></p>
          <p><input type="text" name="confirm_password" placeholder="Повторите пароль"></p>
          <p><input type="hidden" name="_token" value="{{ csrf_token() }}"></p>
          <p><button type="submit">Отправить</button></p>
      </form>
    </div>
@stop

@section('newPost')
    <form action="/authorize">
      <button type="submit">Авторизоваться</button>
    </form>
    <p><form action="/">
      <button type="submit">На главную</button>
    </form></p>
@stop