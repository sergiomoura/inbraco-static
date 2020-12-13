<?php

    // Inicializando session
    session_start();
    
    // Verificando existência da session email
    if(!$_SESSION['email']){

        // Redirecionando para página sw login
        header('location: /adm');
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
    página interna protegida
</body>
</html>