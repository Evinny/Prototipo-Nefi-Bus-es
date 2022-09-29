<h3>deu certo mané</h3>



{{--WIP:FERRAMENTAS PARA APAGAR, ADICIONAR E MODIFICAR--}}


{{--print_r($data_emp)}}<br><hr><br>
<br>
<h3>---------</h3>
{{print_r($inscritos)--}}

{{-- displays todas as empresas registradas no sistema, WIP:AUTORIZAÇÃO DE EMPRESAS PELO ADM ANTES
    QUE ENTREM NA DATABASE OFICIAL--}}
<h2>Job Offers</h2>
<h3>ID // Nome // Idade // Email // CPF // RG // Usuario // Telefone</h3>
<hr>
@foreach($jobData as $i)
    @if (mt_rand(1, 3) == 1)
        {{$i['id']}} // {{ $i['nome'] }} // {{$i['idade']}} // {{ $i['email'] }} // {{ $i['cpf'] }} // {{ $i['rg'] }} // 
        {{ $i['usuario'] }} // {{ $i['telefone'] }}<hr>
    @endif
@endforeach
 
<h2>---------------</h2>
{{--displays todos os membros registrados no sistema--}}
<h2>Membros Registrados</h2>
<h3>Nome // Tipo // Email // Cnpj // Responsavel // Estado // Telefone</h3>
<hr>
{{--@foreach($inscritos as $i)
{{$i['id']}} // {{ $i['nome'] }} // {{$i['sobrenome']}} // {{ $i['email'] }} // {{ $i['cpf'] }} // {{ $i['rg'] }} // 
{{ $i['idade'] }} // {{ $i['telefone'] }} <hr>
@endforeach
 --}}
