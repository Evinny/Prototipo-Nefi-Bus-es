
<form action={{ route('site.Empresainscrito') }} method="post">
    @csrf
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
    
    <br>
    <button type="submit" >ENVIAR</button>
</form>
