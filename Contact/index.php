<?php 

// Check if user caming forn request

if ($_SERVER['REQUEST_METHOD']=='POST') {

	// Asign varibales

	$user  		= filter_var($_POST['username'],FILTER_SANITIZE_STRING);
	$Email 		= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
	$cell  		= filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);
	$msg   		= filter_var($_POST['Message'],FILTER_SANITIZE_STRING);
	$userError  = '';
	$msgError   = '';
	$emailError = '';

	// Use Google reCAPTCHA
	$secret   = '6Lf1hw0UAAAAAD_uaZzu32q4EF44CSTBqwU7ILGy';
	$response =$_POST['g-recaptcha-response'];
	$remoteip   =$_SERVER['REMOTE_ADDR'];

	$url  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
	$rusult = json_decode($url, TRUE);
		if($rusult['success'] == 1){

		


/*
	if(isset($_POST['submit'])){



	}
	*/


	$formError = array ();
	if(strlen($user) <= 3){
			$formError[] = 'Your Name Can Not be less Than 3 Characters';
		}

		if(strlen($msg) < 10){
			$formError[] = 'Your Message Can Not be less Than 10 Characters';
		}
		if(strlen($Email) < 15){
			$formError[] = 'Your Message Can Not be less Than 5 Characters';
		}
		// if No Error send The Email [mail(To, subject, Message, Headers, parameters)]

		$headers  = 'From :'.$Email.'\r\n';
		$mayEmail = 'raoe-041@hotmail.com';
		$subject  = 'contact from';

		if(empty($formError)){

		mail($mayEmail, $subject, $msg, $headers);

		$user  = '';
		$Email  = '';
		$cell  = '';
		$msg  = '';

			$success = '<div class="alert alert-success">We recived Your Message</div>';

		}

	}
	// the close  of recaptcha if
	}

	/* The php Mailer *******************************
	*************************************************
	*************************************************/
	?>

	<?php
	if(empty($formError)){
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'user@example.com';                 // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
/****************************************
*****************************************
****************************************/

	//Creating Array of Error
		/*
		$formError = array ();

		if(strlen($user) <= 3){
			$formError[] = 'Your Name Can Not be less Than 3 Characters';
		}

		if(strlen($msg) < 10){
			$formError[] = 'Your Message Can Not be less Than 10 Characters';
		}
 }
 */

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>contact us</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700,900" >
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

	<body>


			<!-- Start Contact Form -->
			<div class="container">
			<h1 class="text-center">Contact Me</h1>
					<div class="error">
					
					<?php 
					/*
					if(isset($formError)){
						foreach ($formError as $error ) {
							echo '<div class="alert alert-danger">'.$error.'</div> <br />';
							
						}
						}
						*/
					?>
						
					</div>


				<form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<?php if(isset($success)){ echo $success;} ?>
					<div class="form-group">
					<input class="form-control username" type="text" name="username" placeholder="Type Your Name"
					value="<?php if(isset($user)){echo $user;}  ?>" >
					<i class="fa fa-user fa-fw"></i>
					<i class="fa fa-check-circle-o right"></i>
					<i class="fa fa-close left"></i>

					<span class="astrex">*</span>
					</div>
					<?php 
						if(!empty($userError)){
					echo '<div class="alert alert-danger alert-dismissible custom-alert" role="start"><button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$userError.
					     '</div>';
					}
					?>
					<div class="form-group">
					<input class="form-control email" type="email" name="email" placeholder="Type Your Email"
					value="<?php if(isset($Email)){echo $Email;}  ?>" >
					<i class="fa fa-envelope fa-fw"></i>
					<i class="fa fa-check-circle-o right"></i>
					<i class="fa fa-close left"></i>
					<span class="astrex">*</span>
					</div>
					<?php 
						if(!empty($emailError)){
					echo '<div class="alert alert-danger alert-dismissible custom-alert" role="start"><button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$emailError.
					     '</div>';
					}
					?>

					<div class="form-group">
					<input class="form-control" type="text" name="cellphone" placeholder="Type Your Phone Namber"
					value="<?php if(isset($cell)){echo $cell;}  ?>" >
					<i class="fa fa-phone fa-fw"></i>
					<span class="astrex">*</span>
					</div>

					<textarea class="form-control message" name="Message" placeholder=" Your Message " >
					<?php if(isset($msg)){echo $msg;}  ?>
					</textarea>
					<i class="fa fa-check-circle-o right"></i>
					<i class="fa fa-close left"></i>

					<?php 
					if(!empty($msgError)){
					echo '<div class="alert alert-danger alert-dismissible custom-alert" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msgError.
					     '</div>';
					  }
					  ?>
					  <div class="g-recaptcha" data-sitekey="6Lf1hw0UAAAAAPQBC6RTVNTUeeIrEddOMQjwih2Q"></div>
					<input class="btn btn-primary btn-block" type="submit" name="" value="Send Message">
					<i class="fa fa-send fa-fw send-icon"></i>


				</form>


			</div>

			<!-- End Contact Form -->
		
			<script src='https://www.google.com/recaptcha/api.js'></script>

	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/backend.js"></script>


	</body>

</html>