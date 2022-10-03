
<html>
    <head>
       <title>Adms</title>
    </head>
    <body style="background-color:rgb(216, 216, 216)  ;">
        <style>       
            hr{
                height: 1px;
                background-color: black;
                border: none;
            }
        </style>



<a class="read_more" href="{{route('site.index')}}"><h3><FONT COLOR="red">voltar</FONT COLOR=""><h3></a><hr>
{{--WIP:FERRAMENTAS PARA APAGAR, ADICIONAR E MODIFICAR--}}

{{--}}
{{print_r($data_emp)}}<br><hr><br>
{{print_r($inscritos)}}
<br>
--}}


{{-- mostra todas as empresas registradas no sistema, e faz um botao para selecionar uma empresa para
    ser autorizada e registrada como oficial--}}
    
    <center><h2><FONT COLOR="black"><u>Empresas pendentes</u></FONT COLOR="black"></h2></center>
    <h3><i>Nome // Tipo // Email // Cnpj // Responsavel // Estado // Telefone // Usuario:</i></h3>
    <hr>
    @foreach($data_emp as $i)
        <form action='{{route('site.adm')}}' method='post'> {{--WIP: colocar um route pra atribuir um inscrio no banco de pessoas contratadas por uma empresa--}}
        @csrf          
            <input name='id' type='hidden' value= '{{$i['id']}}'>
            <input name='nome' type='hidden' value= '{{$i['nome']}}'>
            <input name='tipo' type='hidden' value= '{{$i['tipo']}}'>
            <input name='email' type='hidden' value= '{{$i['email']}}'>
            <input name='cnpj' type='hidden' value= '{{$i['cnpj']}}'>
            <input name='responsavel' type='hidden' value= '{{$i['responsavel']}}'> 
            <input name='estado' type='hidden' value= '{{$i['estado']}}'>
            <input name='telefone' type='hidden' value= '{{$i['telefone']}}'>
            <input name='usuario' type='hidden' value= '{{$i['usuario']}}'>
            <input name='senha' type='hidden' value= '{{$i['senha']}}'>
            
            {{$i['id']}} // {{ $i['nome'] }} // {{$i['tipo']}} // {{ $i['email'] }} // {{ $i['cnpj'] }} // {{ $i['responsavel'] }} // 
            {{ $i['estado'] }} // {{ $i['telefone'] }} // {{$i['usuario']}} ||  {{--mostra todos os atributos de cada empresa esperando para serem registradas--}}
            
            <button type="submit" >Aceitar</button>
            <hr>
        </form>
    @endforeach
    <br><br>
    <br>
    {{--mostra as empresas registradas--}}
    <center><FONT COLOR="black"><u><h2>Empresas registradas</h2></u></FONT COLOR="black"></center>
    <h3><i>Nome // Tipo // Email // Cnpj // Responsavel // Estado // Telefone // Usuario:</i></h3>
    <hr>
    @foreach($data_emp_conf as $i)
        {{$i['id']}} // {{ $i['nome'] }} // {{$i['tipo']}} // {{ $i['email'] }} // {{ $i['cnpj'] }} // {{ $i['responsavel'] }} // 
        {{ $i['estado'] }} // {{ $i['telefone'] }} // {{$i['usuario']}} || <hr>
    @endforeach
    
    <h2>---------------</h2>
    
{{--displays todos os membros(inscritos) registrados no sistema--}}
<center><h2><FONT COLOR="black"><u>Membros Registrados</u></FONT COLOR="black"></h2></center>
<h3><i>Nome // Tipo // Email // Cnpj // Responsavel // Estado // Telefone // Usuario:</i></h3>
<hr>
@foreach($data_ins as $i)
{{$i['id']}} // {{ $i['nome'] }} // {{$i['sobrenome']}} // {{ $i['email'] }} // {{ $i['cpf'] }} // {{ $i['rg'] }} // 
{{ $i['idade'] }} // {{ $i['telefone'] }} // {{$i['usuario']}} || <hr>
@endforeach
 
</body>
</html>