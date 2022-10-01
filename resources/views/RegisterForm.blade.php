{{-- formulario de inscrição de inscritos --}}

<a class="read_more" href="{{route('site.index')}}"><h3>voltar<h3></a><hr>
<h1> Cadastro<h1>
<hr><h2>Inscritos</h2><br>
<form action='{{ route('cadastrar') }}' method="post">
    @csrf
    <input name="usuario" type="text" placeholder="Nome de usuario" >
    <br>
    <input name="senha" type="text" placeholder="Senha" >
    <br>
    <input name="nome" type="text" placeholder="Nome" >
    <br>
    <input name="sobrenome" type="text" placeholder="Sobrenome" >
    <br>
    <input name="email" type="text" placeholder="E-mail" >
    <br>
    <input name="cpf" type="text" placeholder="CPF" >
    <br>
    <input name="rg" type="text" placeholder="RG" >
    <br>
    <input name="idade" type="text" placeholder="Idade" >    
    <br>
    <input name="telefone" type="text" placeholder="telefone" >    
    <input type="hidden" name="tipo"  value='1'>
    <br>
    
    <br>
    <button type="submit" >ENVIAR</button>
</form>
<br><hr><h2>empresas</h2><hr><br>

<form action={{ route('cadastrar') }} method="post">
    @csrf
    
    <input name="usuario" type="text" placeholder="Nome de usuario" >
    <br>
    
    <input name="senha" type="text" placeholder="Senha" >
    <br>
    
    <input name="nome" type="text" placeholder="Nome da empresa" >
    <br>
    
    <input name="responsavel" type="text" placeholder="nome do responsavel" >
    <br>
    
    <input name="email" type="text" placeholder="E-mail" >
    <br>
    
    <input name="cnpj" type="text" placeholder="CNPJ" >
    <br>
    
    <input name="estado" type="text" placeholder="estado" >
    <br>
    
    <input name="tipo" type="text" placeholder="tipo de transporte" >        
    <br>
    
    <input name="telefone" type="text" placeholder="telefone" >    
    <br>
    <input  type='hidden' name="tipo" value='2'>
    <br>
    <button type="submit" >ENVIAR</button>

</form>
