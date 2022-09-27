<H1> Login</h1><br>

<hr><br>
<h2> ADIMINISTRADOR</h2><br>
<form action='{{ route('site.adm') }}' method="post">
    @csrf
    <input name="usuario" value ="{{old('usuario')}}" type="text" placeholder="usuario" >
    <br>
    <input name="senha" type="text" placeholder="senha" >
    {{--@if ($incorreto == '1') Usuario ou Senha incorretos @else @endif
    --}}
    <br>
    @if (old('usuario') != '') 
        senha ou usuario incorretos
    @elseif (old('senha') != '') 
        senha ou usuario incorretos
    
    @endif

    <br>
    <button type="submit" >LOG-IN</button>
</form>
<br>
<hr><br>
<h2> INSCRITO</h2><br>
<form action='{{ route('site.inscrito') }}' method="post">
    @csrf
    <input name="email" type="text" placeholder="E-mail" >
    <br>
    <input name="cpf" type="text" placeholder="CPF" >
    <br>
    
    
    <br>
    <button type="submit" >ENVIAR</button>
</form>