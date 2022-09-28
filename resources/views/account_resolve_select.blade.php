


    <form action='{{route('login.resolve')}}' method="post">
        @csrf
        <option value=''>Qual conta deseja logar?</option>
        
        @isset($ExistsInscrito)
            <option value='1'> Inscrito </option>
        @isset($ExistsEmpresa)
            <option value='2'> Empresa </option>
        @isset($ExistsAdm)
            <option value='3'> Adiministrador </option>
        
    </form>