<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Document</title>


        <!-- fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link href="css/style.css" rel="stylesheet" type="text/css" screen="media" />
        <link href="img/icone.png" rel="shortcut icon" type="img/png" />
    </head>
    <body>
        <div id="container">
            <?php
                try{
                    $conn = new PDO("mysql:host=localhost;dbname=professores", 'root', '');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "Select * FROM descricao";
                    $dados = $conn->query($sql);
                                
                    $qtd = $dados->columnCount();
                    while($qtd != 0){
                        foreach($dados as $dado){
            ?>
                <a href="pages/usuario.php?id=<?php echo $dado['id']; ?>" class="box-professor">
                    <i class="fas fa-user"></i>
                    <div class="descricao">
                        <p><?php echo $dado['nome']; ?></p>
                        <p><?php echo $dado['area']; ?></p>
                        <abbr title="<?php echo $dado['email']; ?>"><?php echo substr($dado['email'], 0, 25).'...'; ?></abbr>
                    </div>
                </a>
            <?php
                        }
                        $qtd -= 1;
                    }
                }catch(PDOException $e){
                    print('erro: '.$e->getMessage());
                }
                $conn = null;
            ?>
            </div>
        <div>
    </body>
</html>