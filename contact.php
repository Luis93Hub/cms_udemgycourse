<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php

 // Incluir la biblioteca PHPMailer
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';
    require './vendor/phpmailer/phpmailer/src/Exception.php';
    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // Configurar los detalles del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'luis93hernan2@gmail.com';
    $mail->Password = 'joefdwqiuwdqzhsy';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    if (isset($_POST['submit'])) {
        $mail->setFrom('luis93hernan2@gmail.com', 'Luis');
        $mail->addAddress($_POST['email'], 'Jorge');
        $mail->Subject = wordwrap($_POST['subject']);
        $mail->Body = $_POST['body'];
        // $to         =  "luis93hernan2@gmail.com";
        // $subject    =  wordwrap($_POST['subject']);
        // $body       =  $_POST['body'];
        // $header     = $_POST['email'];


        // mail($to, $subject, $body, $header);
        // Enviar el correo electrónico
        if ($mail->send()) {
            echo 'El correo se ha enviado correctamente.';
        } else {
            echo 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo;
        }
    }

    ?>


    <!-- Navigation -->

    <?php  include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">

                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                        </div>
                         <div class="form-group">
                            <textarea class="form-control" name="body" id="body" cols="50" rows="10"></textarea>
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
