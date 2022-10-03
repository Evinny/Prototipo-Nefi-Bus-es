






{{print_r($dataEmp)}}

<h2>empresas a disposição</h2>


<hr>
@foreach($dataEmp as $i)
        <form action='{{route('ins_parameters')}}' method='post'> {{--mostra empresas e um botao para contratar uma em especifico (1 empresa pra cada inscrito e varios inscritos para 1 empresa)--}}
        @csrf          
            <input name='id' type='hidden' value= '{{$i['id']}}'>
            <input name='nome' type='hidden' value= '{{$i['nome']}}'>
            <input name='tipo' type='hidden' value= '{{$i['tipo']}}'>
            <input name='email' type='hidden' value= '{{$i['email']}}'>
            <input name='cnpj' type='hidden' value= '{{$i['cnpj']}}'>
            <input name='responsavel' type='hidden' value= '{{$i['responsavel']}}'> 
            <input name='estado' type='hidden' value= '{{$i['estado']}}'>
            <input name='telefone' type='hidden' value= '{{$i['telefone']}}'>
            
            
            
            {{$i['id']}} // {{ $i['nome'] }} // {{$i['tipo']}} // {{ $i['email'] }} // {{ $i['cnpj'] }} // {{ $i['responsavel'] }} // 
            {{ $i['estado'] }} // {{ $i['telefone'] }} // {{$i['usuario']}} ||  {{--mostra todos os atributos de cada empresa esperando para serem registradas--}}
            
            <button type="submit" >Aceitar</button>
            <hr>
        </form>
@endforeach