<h3>deu certo mané</h3>



{{--WIP:FERRAMENTAS PARA APAGAR, ADICIONAR E MODIFICAR--}}


{{print_r($data_emp)}}<br><hr><br>
{{print_r($inscritos)}}
<br>
<h3>---------</h3>

{{-- displays todas as empresas registradas no sistema, WIP:AUTORIZAÇÃO DE EMPRESAS PELO ADM ANTES
    QUE ENTREM NA DATABASE OFICIAL--}}
<h2>Empresas Registradas</h2>
<h3>Nome // Tipo // Email // Cnpj // Responsavel // Estado // Telefone</h3>
<hr>
@foreach($data_emp as $i)
{{$i['id']}} // {{ $i['nome'] }} // {{$i['tipo']}} // {{ $i['email'] }} // {{ $i['cnpj'] }} // {{ $i['responsavel'] }} // 
{{ $i['estado'] }} // {{ $i['telefone'] }} <hr>
@endforeach
 
<h2>---------------</h2>
{{--displays todos os membros registrados no sistema--}}
<h2>Membros Registrados</h2>
<h3>Nome // Tipo // Email // Cnpj // Responsavel // Estado // Telefone</h3>
<hr>
@foreach($inscritos as $i)
{{$i['id']}} // {{ $i['nome'] }} // {{$i['sobrenome']}} // {{ $i['email'] }} // {{ $i['cpf'] }} // {{ $i['rg'] }} // 
{{ $i['idade'] }} // {{ $i['telefone'] }} <hr>
@endforeach
 


{{--<form action='{{ route('site.adm') }}' method="post">
    @csrf
    <input name="usuario" type="text" placeholder="usuario" >
    <br>
    <input name="senha" type="text" placeholder="senha" >
    
    
    <br>
    <button type="submit" >LOG-IN</button>
</form>--}}

