<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Facilita UDF</title>
    </head>
    <body>
        <?php
            session_start();

            $id_prof = $_SESSION['id_prof'];

            try{
                $conn = new PDO('mysql:host=localhost;dbname=professores', 'root', '');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = "SELECT * FROM descricao WHERE id='{$id_prof}'";
                $dados = $conn->query($sql);

                foreach($dados as $dado){
                    $_SESSION['nomeProf'] = $dado['nome'];
                }
            }catch(PDOException $e){
                print('erro: '.$e->getMessage());
            }

            require('../PHPMailer/Exception.php');
            require('../PHPMailer/OAuth.php');
            require('../PHPMailer/PHPMailer.php');
            require('../PHPMailer/POP3.php');
            require('../PHPMailer/SMTP.php');

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->CharSet = 'UTF-8';
                $mail->SMTPDebug = false;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'facilitaUDF@gmail.com';                 // SMTP username
                $mail->Password = 'facilitaUDF12345';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom($_POST['email'], $_POST['nome']);
                $mail->addAddress($dado['email'], $dado['nome']);     // Add a recipient
                $mail->addReplyTo($_POST['email'], $_POST['nome']);
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $_POST['assunto'];
                $mail->Body    = $_POST['mensagem'];
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                
                $status = true;
            } catch (Exception $e) {
                $status = false;
            }

            if($status == true){
                print('email enviado com sucesso.');
            }else{
                print('erro ao enviar o email.');
            }
        ?>
        <a href="../index.php">voltar</a>
    </body>
</html>