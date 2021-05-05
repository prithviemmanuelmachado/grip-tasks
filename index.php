<?php
    session_start();
    //Import PHPMailer classes into the global namespace                
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    
    if(isset($_POST['submit']))
    { 
            $desc=$_POST['desc'];
            $username=$_POST['username'];
            $sub=$_POST['sub'];
            $pass=$_POST['pass'];

                //Load Composer's autoloader
                require 'vendor/autoload.php';

                //Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      
                    //Enable verbose debug output
                    $mail->isSMTP();                                            
                    //Send using SMTP
                    $mail->Host       = '	
                    email-smtp.ap-south-1.amazonaws.com';                     
                    //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   
                    //Enable SMTP authentication
                    $mail->Username   = $username;                     
                    //SMTP username
                    $mail->Password   = $pass;                               
                    //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                    //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    
                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('amentibusstercore@gmail.com', 'Mailer');
                    // $mail->addAddress('joe@example.net', 'Joe User');     
                    //Add a recipient
                    $mail->addAddress('voidsoullearningaws@gmail.com');               
                    //Name is optional
                    $mail->addReplyTo('noreply@gmail.com','user');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         
                    //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
                    //Optional name

                    //Content
                    $mail->isHTML(true);                                  
                    //Set email format to HTML
                    $mail->Subject = $sub;
                    $mail->Body    = $desc;
                    // $mail->AltBody = ;

                    $mail->send();
                    echo '<script>alert("The email has been sent. We will move to reply as soon as possible. Thank you for your patiance.");</script>';
                } catch (Exception $e) {
                    echo "<script>alert('Sorry, failed to send the message because {$mail->ErrorInfo}');</script> ";
                }
        }


   
?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            Contact Form
        </title>
    </head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <!-- Personal CSS -->
    <link rel="stylesheet" href="style.scss">
    

    <body>
        
    
            

        <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 form">
                    <form action="contact.php" method="POST">
                    <div class="row mt-5">
                        <div class="col-12">
                            <h1 class="header">CONTACT FORM</h1>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="sub">SUBJECT</label>
                        </div>
                        <div class="col-10">
                            <input type="text" name="sub">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-2">
                            <label for="desc">BODY</label>
                        </div>
                        <div class="col-10">
                            <input name="desc">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-2">
                            <label for="username">USERNAME</label>
                        </div>
                        <div class="col-10">
                            <input  type="password" name="username" >
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-2">
                            <label for="pass">PASSWORD</label>
                        </div>
                        <div class="col-10">
                            <input type="password" name="pass">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="submit" value="Submit" class="submitButton">SUBMIT</button>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <h1 class="footer">...</h1>
                        </div>
                    </div>    
                    </form>

                    
            </p>
    </body>
</html>