<?php 
    session_start(); 

    $_SESSION['id_prof'] = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Facilita UDF</title>

        <!-- fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link href="css/style.css" rel="stylesheet" type="text/css" screen="media" />
        <link href="img/logo.png" rel="shortcut icon" type="img/png" />
    </head>
    <body>
        <form method="POST" action="mensagem.php">
            <div id="box-nome">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="seu nome" />
            </div>
            <div id="box-email">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="seu email" />
            </div>
            <div id="box-assunto">
                <label for="assunto">Assunto</label>
                <input type="text" name="assunto" id="assunto" placeholder="assunto aqui" />
            </div>
            <div id="box-mensagem">
                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem"></textarea>
            </div>
            <div id="box-botao">
                <button type="submit">enviar email</button>
            </div>
        </form>
        <p>verifique se os dados foram digitados corretamente.</p>
        <a href="../index.php">voltar</a>
    </body>
</html>