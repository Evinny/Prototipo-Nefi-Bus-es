<h2>hahhhahahaha</h2>

   

    <br><br><hr>
  
    
    {{$EmpData['id']}} // {{ $EmpData['nome'] }} // {{$EmpData['tipo']}} // {{ $EmpData['email'] }} // {{ $EmpData['cnpj'] }} // {{ $EmpData['responsavel'] }} // 
            {{ $EmpData['estado'] }} // {{ $EmpData['telefone'] }}  ||  {{--mostra todos os atributos de cada empresa esperando para serem registradas--}}

<hr>

<p><b>digite sua senha para confirmar o contratamento da empresa listada</b></p>

{{--apenas para exigir a senha de um modo intuitivo ao tentar contratar uma empresa, para evitar fraude--}}
<form action='{{ route('contratar') }}' method="post">    
    @csrf
                
                
        <input name='id' type='hidden' value= '{{$EmpData['id']}}'>
        <input name='nome' type='hidden' value= '{{$EmpData['nome']}}'>
        <input name='tipo' type='hidden' value= '{{$EmpData['tipo']}}'>
        <input name='email' type='hidden' value= '{{$EmpData['email']}}'>
        <input name='cnpj' type='hidden' value= '{{$EmpData['cnpj']}}'>
        <input name='responsavel' type='hidden' value= '{{$EmpData['responsavel']}}'> 
        <input name='estado' type='hidden' value= '{{$EmpData['estado']}}'>
        <input name='telefone' type='hidden' value= '{{$EmpData['telefone']}}'>
   
                
    <input name="senha" type="password" placeholder="senha" >
                    
                    
    <br>
    <button type="submit" >LOG-IN</button>
</form>
