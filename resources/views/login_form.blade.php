


{{--seção de login de todos os tipos de usuarios em uma blade(vulgo view) só--}}
<H1> Login</h1><br>

<hr>
<h2> Acesse sua conta</h2><br>
{{--login do adm--}}
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
<hr>