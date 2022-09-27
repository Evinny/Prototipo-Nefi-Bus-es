
{{print_r($errors)}}

@if(empty($errors))
    <h2>Formulario incompleto</h2>
@endif

<form action='{{ route('site.inscrito') }}' method="post">
    @csrf
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
    <br>
    
    <br>
    <button type="submit" >ENVIAR</button>
</form>
