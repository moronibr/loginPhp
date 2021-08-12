<?php

require_once 'usuarios.php';
$u = new Usuario;


?>


<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Projeto Login</title>
        <meta name="viewport" content="width-device-width, initial-scale=1">

    </head>

    <body>
        
        <form method="POST" >
            <h1>Entrar</h1>
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit">
            <a href="cadastrar.php">Inscreva-se</a>




        </form>


        <?php
        if(isset($_POST['email']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if(!empty($email) &&!empty($senha))
            {
                $u->conectar("projeto_login", "localhost", "root", "");
                if($u->$msgErro == "")
                {
                    if($u->logar($email, $senha))
                {
                    header("location: areaPrivada.php");
                        

                }else{

                    echo "Email ou senha inválidos";

            }
                }else{
                    echo "Erro: ".$u->msgErro;

                }
                

            }else
            {
                echo "Preencha todos os campos";

            }


        }
        



        ?>
    
    </body













</html>