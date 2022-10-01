
<a class="read_more" href="{{route('site.index')}}"><h3>voltar<h3></a><hr>

{{--seção de login de todos os tipos de usuarios em uma blade(vulgo view) só--}}
<H1> Login</h1><br>

<hr>
<h2> Acesse sua conta</h2><br>
{{--zona de login--}}

<form action='{{ route('site.login') }}' method="post">
    @csrf
    
    <input name="usuario" value ="{{old('usuario')}}" type="text" placeholder="usuario" >
    <br>
    
    <input name="senha" type="text" placeholder="senha" >
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