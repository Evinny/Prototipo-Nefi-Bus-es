

<div class="container">
    <img src="images/login/DentroOnibus2.jpg" alt="Snow" style="width:100%;">
    <div class="bottom-left"></div>
    <div class="top-left"></div>
    <div class="top-right"></div>
    <div class="bottom-right"></div>
    <div class="centered"></div>
</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adms</title>
</head>
<body>
    <body style="background-color:rgb(255, 255, 255)  ;">
        
        
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




{{--seção de login de todos os tipos de usuarios em uma blade(vulgo view) só--}}
<div class="top-left">
<a href="{{route('site.login')}}"><h3><font color='red'>voltar</font color='red'><h3></a>
</div>
    <div class="centered">
        <div class="outline">
    <center><font size='+15' "> <b>Login</b></font><br>
        
        <hr>
        <center>
            <font size='+3' color=white style="font-family:helvetica"><b>Acesse sua conta</b></font><br>
            </div>
    {{--zona de login--}}
</center>
    <br>
<form action='{{ route('site.login') }}' method="post">
    @csrf
    
    <div class="Logcontainer">
        <center>
        <input name="usuario" value ="{{old('usuario')}}" type="text" placeholder="usuario" >
         
        
        <br>
    
        <input name="senha" type="text" placeholder="senha" >
        
        
        
        <br>
        <button type="submit" >LOG-IN</button>
    </center>
    </div>
        
    </form>
<hr>
<font size='+1' color=white>se não possui uma conta ainda? <a href='{{route('register')}}' style="color:darkblue" >cadastre-se</a></font>
</div>
</body>
</html>

{{--
<html>
    <head>
       
    </head>
    <body style="background-color:rgb(0, 183, 255)  ;">
        <style>       
            hr{
                width: 30%;
                height: 2px;
                margin-left: auto;
                margin-right: auto;
                
                background-color: black;
                border: none;
            }
            
        </style>

<a href="{{route('site.index')}}"><h3><font color='red'>voltar</font color='red'><h3></a>


    
{{--seção de login de todos os tipos de usuarios em uma blade(vulgo view) só

<center><font size='+15'> Login</font><br>

<hr>
<font size='+2'> Acesse sua conta<font><br>
{{--zona de login
<br>
<form action='{{ route('site.login') }}' method="post">
    @csrf
    
    <input name="usuario" value ="{{old('usuario')}}" type="text" placeholder="usuario" >
         
        
    <br>
    
    <input name="senha" type="text" placeholder="senha" >
    
   
    
    @if (old('usuario') != '') 
        senha ou usuario incorretos
    @elseif (old('senha') != '') 
        senha ou usuario incorretos
    
    @endif

    <br>
    <button type="submit" >LOG-IN</button>

</form>
<hr>
<font size='+1'>se não possui uma conta ainda? <a href='{{route('register')}}' color='red'>cadastre-se</a></font>
--}}