


<h1> Você possui varias contas em setores diferentes,<br> 
    qual deseja acessar?<h1>


<form action='{{route('login.resolved')}}' method="post">
        @csrf
        <select name="account_type" >
            <option value=''>Qual conta deseja logar?</option>
            {{print_r($Existsi)}}
            @if($Existsi == 1)
                <option value = '1'> inscrito </option>
            @endif
            @if($Existse == 1)
                <option value = '2'> empresa </option>
            @endif
            @if($Existsa == 1)
            <option value = '3'> adm </option>
            @endif
        </select>
        <button type="submit" >ENVIAR</button>
            
</form>