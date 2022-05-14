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

<form method="post" action="{{ route('register') }}">
@csrf <!-- {{ csrf_field() }} -->
    <table border="0">
        <tr>
            <td>
                <input name="name" value="{{ old('name') }}" placeholder="Ваше имя" required>
            </td>
            <td>
                <input name="email" value="{{ old('email') }}" placeholder="E-mail" required>
            </td>
        </tr>
        <tr>
            <td>
                <input name="password" value="" placeholder="Пароль" required>
            </td>
            <td>
                <input name="password_confirmation" value="" placeholder="Повторите пароль" required>
            </td>
        </tr>
        <tr>
            <td>
                <label>
                    <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                    Хочу быть админом
                </label>
            </td>
            <td>
                <button type="submit">Зарегистрироваться</button>
            </td>
        </tr>
    </table>

</form>


<br><br>
<a href="{{ route('login') }}">Уже зарегистрирован</a>
