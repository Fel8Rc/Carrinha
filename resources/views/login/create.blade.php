@if ($errors->any())
    @foreach ($errors->all() as $error) 
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    Nome: <input type="text" name="firstname"><br>
    Sobrenome: <input type="text" name="lastname"><br>
    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="password"><br>
    <button type="submit">Entrar</button> 

</form>