<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@estralsolutions.com";
    $email_subject = "Nueva entrada en formulario desde Sitio Web";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->




<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Estral Solutions - Anaqueles</title>
    <!--Estilos custom-->
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
    <!--FAVICON-->
    <link rel="shortcut icon" type="image/png" href="img/favicon.jpg"/>
    <link rel="shortcut icon" type="image/png" href="img/favicon.jpg"/>
    <!--Verificacion google-->
    <meta name="google-site-verification"
    content="s7uwviYrNa4DBLLMTfo-UyQD0jxOkDrWke9ET3SlWbw" />
<!--Fin verifiacion google-->
    <!--GOOGLE RECAPTCHA-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
      
      <div class="text-center">
        <br>
        <br>
        <img src="img/logo_estral.png" width="200">
        <br>
        <br>
        <h4>Datos enviados.</h4>
        <br>
        <h2>Vea la variedad de productos que tenemos para usted:</h2><br>
        <a href="catalogo.pdf"><button class="btn btn-lg btn-warning">Descargar catálogo</button></a>
        <br>
        <br>
        <br>
        <h4>Conozca nuestra empresa</h4>
        <br>
        <a href="http://estralsolutions.com"><button class="btn btn-lg btn-warning">Ir al sitio</button></a>
      </div>
    </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <img src="img/man-box.png" class="img-responsive" style="width: 100%;">
        
      </div>
  </div>
</div>
<footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="d-inline-block text-center col-lg-12">
              <h4 class="text-white text-center">Siganos en Facebook</h4>
              <a href="https://www.facebook.com/EstralSolutionsMX/?ref=br_rs"><i class="fa fa-2x fa-facebook mb-3 sr-icons" style="padding: 2%; color: white !important;"></i></a>
              <small><p class="text-white">Consulta nuestro <a href="avisodeprivacidad.pdf" style="color: white">Aviso de Privacidad</p></a></small>
            </div>
            <div class="d-inline-block">
              
            </div>
          </div>
        </div>
      </footer>
<?php
 
}
?>