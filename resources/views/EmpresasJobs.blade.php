<a class="read_more" href="{{route('site.index')}}"><h3>voltar<h3></a><hr>

{{--apresenta as empresas trabalhos, e os trabalhos ja requisitados pela empresa logada--}}
<h2>Trabalhos propostos</h2>
<h3>ID // Nome // Idade // Email // CPF // RG // Usuario // Telefone</h3>
<hr>
@foreach($jobData as $i) {{--mostra cabas aleatorios, por enquanto--}}
    @if (mt_rand(1, 3) == 1)
        
        <form action='safara' method='get'> {{--WIP: colocar um route pra atribuir um inscrio no banco de pessoas contratadas por uma empresa--}}
            
            
            {{$i['id']}} // {{ $i['nome'] }} // {{$i['idade']}} // {{ $i['email'] }} // {{ $i['cpf'] }} // {{ $i['rg'] }} // 
            {{ $i['usuario'] }} // {{ $i['telefone'] }}  ||  {{--mostra todos os atributos de cada inscrito que quer uma viajem--}}
            
            <button type="submit" >Aceitar</button>
            <hr>
        </form>
    @endif
@endforeach
 
<h2>---------------</h2>





{{--displays todos os membros registrados no sistema--}}
<h2>Usuarios em contrato</h2>
<h3>Nome // Tipo // Email // Cnpj // Responsavel // Estado // Telefone</h3>
<hr>
{{--@foreach($inscritos as $i)
{{$i['id']}} // {{ $i['nome'] }} // {{$i['sobrenome']}} // {{ $i['email'] }} // {{ $i['cpf'] }} // {{ $i['rg'] }} // 
{{ $i['idade'] }} // {{ $i['telefone'] }} <hr>
@endforeach
 --}}
