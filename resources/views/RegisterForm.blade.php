{{-- formulario de inscrição de inscritos --}}







<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cadastro</title>
    
        
        <style>       
            .outline{
                font-size: 40px;
                font-weight: 40px;
                color: rgb(255, 255, 255);
                -webkit-text-stroke: 1px rgb(0, 0, 0); 
            }
            .text{
                font-size: 40px;
                font-weight: 40px;
                color: rgb(0, 0, 0);
                
                
            }
            
            hr{
                width: 30%;
                height: 2px;
                margin-left: auto;
                margin-right: auto;
                
                background-color: black;
                border: none;
            }
            /* Container holding the image and the text */
            .container {
                position: relative;
                text-align: center;
            color: white;
        }
        
        /* Bottom left text */
        .bottom-left {
            position: absolute;
            bottom: 8px;
            left: 16px;
        }

        /* Top left text */
        .top-left {
                position: absolute;
                top: 8px;
                left: 16px;
            }
            
            /* Top right text */
            .top-right {
                position: absolute;
                top: 8px;
                right: 16px;
            }
            
            /* Bottom right text */
            .bottom-right {
                position: absolute;
                bottom: 8px;
                right: 16px;
            }
            
            /* Centered text */
            .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
            </style>
    </head>
    <body style="background-color:rgb(0, 0, 0)  ;">
        <div class="container">
            <img src="images\cadastro\insideBus.jpg" alt="Sno" style="width:100%;">
            <div class="bottom-left"></div>
            <div class="top-left">
                <a class="read_more" href="{{route('site.index')}}" ><font color='red'><h3>voltar</font><h3></a><hr>
            </div>
            <div class="top-right"></div>
            <div class="bottom-right"></div>
            <div class="centered">
                <div class="outline">
                <h2> Cadastro<h2>
                </div>
                    <hr><h2>Inscritos</h2><br> {{--junta o formulario de cadastro dos inscritos e empresas e os cadastra separadamente--}}
                <form action='{{ route('cadastrar') }}' method="post">
                    @csrf
                    <input name="usuario" type="text" placeholder="Nome de usuario" >
                    <br>
                    <input name="senha" type="text" placeholder="Senha" >
                    <br>
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
                    <input type="hidden" name="tipo"  value='1'>
                    <br>
                    
                    <br>
                    <button type="submit" >ENVIAR</button>
                </form>
                <br><hr><h2>empresas</h2><br>
                
                <form action={{ route('cadastrar') }} method="post">
                    @csrf
                    
                    <input name="usuario" type="text" placeholder="Nome de usuario" >
                    <br>
                    
                    <input name="senha" type="text" placeholder="Senha" >
                    <br>
                    
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
                    <input  type='hidden' name="tipo" value='2'>
                    <br>
                    <button type="submit" >ENVIAR</button>
                <hr>
                </form>
                
            </div>
            
        </div>
        

        
    </body>
</html>






















