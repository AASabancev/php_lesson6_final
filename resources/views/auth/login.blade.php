@if ($errors->any())
    <div class="alert alert-danger"  style="color:red;">
        <b>ОШИБКА!</b>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('login') }}">
@csrf <!-- {{ csrf_field() }} -->
    <input name="email" value="{{ old('email') }}" placeholder="E-mail" required>
    <input name="password" value="" placeholder="Пароль" required>
    <label>
        <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
        Запомнить меня
    </label>
    <button type="submit">Войти</button>
</form>


<br><br>
<a href="{{ route('register') }}">Хочу зарегистрироваться</a>
