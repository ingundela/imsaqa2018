<?php
    $msg = "";
  use PHPMailer\PHPMailer\PHPMailer;
  include_once "PHPMailer/PHPMailer.php";
  include_once "PHPMailer/Exception.php";
  include_once "PHPMailer/SMTP.php";

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
      $file = "attachment/" . basename($_FILES['attachment']['name']);
      move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
    } else
      $file = "";

    $mail = new PHPMailer();

    //if we want to send via SMTP
    $mail->Host = "smtp.gmail.com";
    //$mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "senaidbacinovic@gmail.com";
    $mail->Password = "5C1bcnPkDI4Wd%#";
    $mail->SMTPSecure = "ssl"; //TLS
    $mail->Port = 465; //587

    $mail->addAddress('info@sbmozmedia.com');
    $mail->name = $name;
    $mail->setFrom($email, $name);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->addAttachment($file);

    if ($mail->send())
        $msg = "Your email has been sent, thank you!";
    else
        $msg = "Please try again!";

    unlink($file);
  }
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--Google verification - Indixing website-->
    
    <title>Imsaqa - Projectos</title>
    <meta name="description" content="Foremost is a Mozambican company specializing in the procurement and supply chain of leading global brands and high-quality products, with headquarters in Maputo and has support partners in South Africa, Europe, United Kingdom, United Arab Emirates and China.">
    <meta name="keywords" content="SOURCING, PROCUREMENT, SUPPLY CHAIN, LOGISTICS, MANAGED SERVICES, CUSTOM SOLUTIONS, MOZAMBIQUE, MOÇAMBIQUE">
    <link rel="canonical" href="https://www.foremost.co.mz/">
    <meta property="og:title" content="Foremost">
    <meta property="og:description" content="Foremost is a Mozambican company specializing in the procurement and supply chain of leading global brands and high-quality products, with headquarters in Maputo and has support partners in South Africa, Europe, United Kingdom, United Arab Emirates and China.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.foremost.co.mz/">
    <meta property="og:site_name" content="Foremost">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link href="css/fa-light.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
     <link rel="stylesheet" type="text/css" href="css/gallery-grid.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-9ralMzdK1QYsk4yBY680hmsb4/hJ98xK3w0TIaJ3ll4POWpWUYaA2bRjGGujGT8w" crossorigin="anonymous">
  </head>
  <body>
    <!--top header-->
        <header">
          <!--most top info -->
          <div class="top-menu">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8">
                  <ul class="left list-unstyled">
                    <li><i class="fal fa-map-marker-alt"></i> Av.OUA, nr. 783, Maputo</li>
                    <li><i class="far fa-envelope-open"></i> Email: comercial@imsaqa.co.mz</li>
                    <li><i class="far fa-phone"></i> Tel:  +258 21400102</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="right list-unstyled">
                    <li>Siga-nos: </li>
                    <li><a href="https://web.facebook.com/imsaqasignagecenter2/?modal=admin_todo_tour&_rdc=1&_rdr" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
            <!-- End most top info -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" data-toggle="sticky-onscroll" id="navScrollspy">
          <div class="container-fluid">
            <a class="navbar-brand h1 mb-0" href="index.html"><img src="img/logo/imsaqa-logo.png"></a>
            <button class="navbar-toggler compressed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background:none; border:none">
              <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link " href="index.html">Home</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="sobre.html">Quem somos</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="servicos.html">O que fazemos</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="projectos.html">Projectos</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="sendemail.php">Contactos</a>
                </li>
              </ul>
            </div>
          </div>
      </nav>
    </header>
    <!--hero image-->
    <section class="sobre servicos-content title-other-sections ">
      <div class="container-fluid">
          <div class="hero-caption">
            <h1>Contacte-nos</h1>
          </div>
        </div>
      </div>
    </section>
      <!--contact form-->
      <section class="contactForm all_section">
        <div class="container titleTop">
          <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">

                      <?php if ($msg != "") echo "$msg<br><br>"; ?>

              <form method="post" action="sendemail.php" enctype="multipart/form-data">
                <input class="form-control" name="name" placeholder="Your Name..."><br>
                <input class="form-control" name="subject" placeholder="Subject..."><br>
                <input class="form-control" name="email" type="email" placeholder="Email..."><br>
                <textarea placeholder="Message..." class="form-control" name="message"></textarea><br>
                <input class="form-control" type="file" name="attachment"><br>
                <input class="btn btn-primary" name="submit" type="submit" value="Send Email">
              </form>
            </div>
          </div>
        </div>
      </section>
  
    <section class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <h3>Contactos</h3>
            <ul class="left list-unstyled">
              <li><i class="fal fa-map-marker-alt"></i> Av.OUA, nr. 783<br> Maputo-Moçambique</li>
              <li><i class="far fa-envelope-open"></i> comercial@imsaqa.co.mz</li>
              <li><i class="far fa-phone"></i> +258 21400102</li>
              <li><i class="fab fa-whatsapp"></i></i> 84 302 5981 / 843098227</li>
              <li>Seg. a Sex.: 08:00 - 12:30 | 14:00 - 17:00</li>
              <li>Sáb. e Dom.: Fechado</li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3>Siga-nos:</h3>
            <ul class="left list-unstyled social-bootom">
              <li><a href="https://web.facebook.com/imsaqasignagecenter2/?modal=admin_todo_tour&_rdc=1&_rdr" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <h3>Encontre-nos</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3587.590758037088!2d32.54322175034801!3d-25.94865895985334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDU2JzU1LjIiUyAzMsKwMzInNDMuNSJF!5e0!3m2!1sen!2smz!4v1503238255533" width="100%" height="300"></iframe>
          </div>
        </div>
      </div>
    </section>
    
    <section class="footer-last">
       <p class="text-center last">&copy; 2018 Imsaqa | Todos direitos reservados | Powered by <a href="https://sbmozmedia.com/" target="_blank">Sbmozmedia Agency</a></p>
    </section>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
  </body>
</html>
 

 
 