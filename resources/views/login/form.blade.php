@if ($messagem = Session::get('erro'))
    {{ $messagem }}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error) 
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('login.auth') }}" method="POST">
    @csrf
    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="password"><br>
    <input type="checkbox" name="remember">Rembar-me<br>
    <button type="submit">Entrar</button> 

</form>