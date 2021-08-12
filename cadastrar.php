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
        
        <form method="POST">
            <h1>Cadastrar</h1>
            <input type="text" name="nome" placeholder="Nome Completo">
            <input type="text" name="telefone" placeholder="Telefone">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="senha" placeholder="Senha">
            <input type="password" name="confSenha" placeholder="Confirmar Senha">

            <input type="submit">
            




        </form>
        
<?php

if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);

    if(!empty($nome) &&!empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("projeto_login", "localhost", "root", "");
        if($u->$msgErro == "")
        {
            if($senha == $confirmarSenha)
            {
                 if($u->cadastrar($nome,$telefone,$email,$senha))
                 {
                     ?>

                     <div id="msg-sucesso">
                     "Cadastrado com sucesso";
                 </div>
                    <?php

                 }else{
                    echo "Email já cadastrado";

                 }
            }
            else{
                echo "Senha e confirmar senha não correspondem";

            }
           

        }else{
            echo "Erro: ".$u->msgErro;

        }


    }else{

        echo "Preencha todos os campos!";

    }


}





?>
    
    </body













</html>