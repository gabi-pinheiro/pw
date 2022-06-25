<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <?php include("head.php") ?>
</head>
<body>
    
</body>
</html>
<div class="background">
    <div id="form-wrap"> 
        <form id="form-cadastro" action=confirma.php method="POST" onsubmit="return validarSenha();">
            <h2>Cadastre-se</h2>
            <input class="form-input" type="text" name="user" placeholder="usuário">
            <br>
            <input type="password" class="form-input"  name="password" id="password"  placeholder="senha">
            <br>
            <input type="password" class="form-input"  id="confpassword" placeholder="confirmar senha">
            <br>
            <input class="form-submit" type="submit" value="cadastrar">
            <a href="login.php"> login </a>
        </form>
    </div>
</div>



<script>
function validarSenha(){
 senha= document.getElementById("password").value;
 senhac= document.getElementById("confpassword").value;

if (senha != senhac){
    alert("As senhas são diferentes!");
    return false;
}
    return true;
}
</script>
</html>