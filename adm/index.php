<?php 

    // Definindo filter de usuário
    class UsersFilter {

        private $email;
        private $password;

        function __construct($email, $password) {
            $this->email = $email;
            $this->password = $password;
        }

        function ok($user) {
            return array_keys($user)[0] == $this->email && password_verify($this->password,$user[array_keys($user)[0]]);
        }
    }

    // Marcando flag de falha no login
    $erroLogin = false;
    
    // Verificando se houve tentativa de login
    if($_POST) {

        // Verificando se os campos de email e senha foram inseridos
        $erroLogin = (!array_key_exists('email',$_POST) || !array_key_exists('password',$_POST));

        if(!$erroLogin){
            
            // Carregando array de usuários
            $users = json_decode(file_get_contents('../database/users.json'), true);
            // Extraindo dados de login do post
            extract($_POST);

            // Verificando a existência de um usuário
            $ok = count(array_filter($users, array(new UsersFilter($email, $password),"ok"))) === 1;

            // Login e senha verificados
            if($ok){

                // Inicializando session
                session_start();

                // Setando valor de logado para true
                $_SESSION["email"] = $email;

                // Redirecionando para página interna
                header("location: /adm/home.php");
            } else {

                // Setando flag de erro de login para true
                $erroLogin = true;

            }
        }
        

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INBRACO - Área administrativa</title>
</head>
<body>
    <?= $erroLogin?"<div>Falha no login</div>":""; ?>
    <form method="POST">
        <label for="email">
            E-mail
            <input type="email" name="email" id="email">
        </label>
        <label for="password">
            Senha
            <input type="password" name="password" id="password">
        </label>
        <button type="submit">Logar</button>
    </form>
</body>
</html>