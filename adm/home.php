<?php

    // Incluindo arquivos necessários
    include(__DIR__."/../lib/DB.php");
    include(__DIR__."/../lib/ProductsLoader.php");

    // Stando flag de controle de erro
    $error = false;
    $errMsg = '';
    $trace = [];

    // Inicializando session
    session_start();
    
    // Verificando existência da session email
    if(!$_SESSION['email']){

        // Redirecionando para página sw login
        header('location: /adm');

        // Interrompendo a execução do script
        die();

    }

    // Verificando $_POST  $_FILES
    if($_POST && $_FILES){
        
        // Capturando dados do arquivo subido
        $file = $_FILES['file'];

        // Verificando se o upload falhou
        if($file['error'] != UPLOAD_ERR_OK){
            
            echo('Falha ao subir arquivo: ');
            switch ($file['error']) {
                
                case UPLOAD_ERR_INI_SIZE:
                    $errMsg = "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.";
                    $error = true;
                    break;

                case UPLOAD_ERR_FORM_SIZE:
                    $errMsg = "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML.";
                    $error = true;
                    break;

                case UPLOAD_ERR_PARTIAL:
                    $errMsg = "O upload do arquivo foi feito parcialmente.";
                    $error = true;
                    break;

                case UPLOAD_ERR_NO_FILE:
                    $errMsg = "Nenhum arquivo foi enviado.";
                    $error = true;
                    break;

                case UPLOAD_ERR_NO_TMP_DIR:
                    $errMsg = "Pasta temporária ausênte. Introduzido no PHP 5.0.3.";
                    $error = true;
                    break;

                case UPLOAD_ERR_CANT_WRITE:
                    $errMsg = "Falha em escrever o arquivo em disco. Introduzido no PHP 5.1.0.";
                    $error = true;
                    break;

                case UPLOAD_ERR_EXTENSION:
                    $errMsg = "Uma extensão do PHP interrompeu o upload do arquivo. O PHP não fornece uma maneira de determinar qual extensão causou a interrupção. Examinar a lista das extensões carregadas com o phpinfo() pode ajudar. Introduzido no PHP 5.2.0.";
                    $error = true;
                    break;
            
            }
        }

        // Caminho para onde foi a pasta
        $path = $file["tmp_name"];

        try {
            // lendo o arquivo enviado
            $produtos = new ProducstLoader($path);
            
        } catch (\Throwable $e) {
            $error = true;
            $errMsg = $e->getMessage();
            $trace = $e->getTrace();
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

    <header>
        <nav>
            <ul>
                <li><a href="home.php">Dados Básicos</a></li>
                <li><a href="dadosComplementares.php">Dados Complementares</a></li>
            </ul>
        </nav>
    </header>
    <form method="POST" enctype="multipart/form-data">
        <p>
            Selecione o arquivo .csv para popular o banco de dados.
        </p>
        <p>
            No caso de dúvida, <a href="modelo-input.csv">baixe modelo</a>.
        </p>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= str_replace("M","",ini_get("upload_max_filesize"))*1000000 ?>" />
        <input type="file" name="file" id="file">
        <button type="submit">Enviar</button>
        <?= $error ? "<div>$errMsg</div>" : "" ?>
        <?php
            if(isset($trace)){
                echo "<pre>";
                print_r($trace);
                echo "</pre>";
            } else {
                echo "<pre>";
                print_r($produtos->getProdutos());
                echo "</pre>";
            }
        ?>
    </form>
</body>
</html>