<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../CSS/erro.css">
    <title>Login</title>
</head>
<body id="lateral">

<div class="img-erro">
    <img src="../IMG/trevoice.png" alt="">
</div>
    <div id="bg">
    <div id="login-container"> 
        
        <form action="login.php" method="POST">
        <label>E-mail</label>
        <input name="email" autocomplete="off">

        <label>Senha</label>
        <input type="password" name="senha" class="txtlog" autocomplete="off"><br><br>

        <img src="../IMG/perigo.png" alt="" id="img"> <br><br> <p id="po">E-mail e/ou senha inválido(s)</p><br>

       <input  type="submit" name="entrar"  id="white" value="Entrar">

       <a href="Senha/recuperarsenha.php" style="text-decoration:none" id="forgotpass">Esqueci minha senha</a>
    </form>
    </div>
</div>
</body>
</html>