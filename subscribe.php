<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <!-- META DATA -->
	<title>Qtech :: Multi-Purpose HTML Landing Page Template by Codefes&trade;</title>
	<meta name="description" content="Qtech is a multi-purpose HTML landing page template by Codefest&trade;. Purchase now.">
	<meta name="keywords" content="Qtech,Codefest">
	<meta name="author" content="Codefest">	
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <!-- FAVICON -->
	<link rel="icon" type="image/png" href="assets/images/favicon.png">
    <!-- STYLESHEETS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<!-- FONTS USED -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/smoothscroll.js"></script>
    <script language="JavaScript" type="text/javascript">
        setTimeout("window.history.go(-1)",7000);
	</script> 
</head>
<body>
<!-- WRAPPER -->
<div class="wrapper">
<div class="security-section vh-100">    
<div class="container security-section-container p-5 text-center">
<!-- LOGO --> 
<img src="assets/images/sent.png" class="send-success"> 
<?php
if(!empty($_POST['website'])) die();
if(isset($_POST['newsletter_email'])) { 
    // Change the email address below to your own
    $email_to = "support@codefest.co.uk";
    $email_subject = "Newsletter subscription received"; 
    function died($error) {
        // Error message
        echo "<h2 class='contact-subtitle'>Error</h2>";
		echo "<p class='contact-title-text text-danger'>";
        echo $error."</p><br>";
		echo "<p class='contact-title-text text-danger'>Heading back to try again...</p>";
        die();
    }
    // Validation
    if(!isset($_POST['newsletter_email'])) {
        died('There appears to be a problem with your form submission.');       
    }
    $email = $_POST['newsletter_email']; // Required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/'; 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The email address you entered is not valid.<br />';
  } 
  if(strlen($error_message) > 0) {
    died($error_message);
  } 
    $email_message = "Subscribed email below.\n\n";     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    $email_message .= "Email: ".clean_string($email)."\n"; 
// Email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?> 
<!-- SUCCESS MESSAGE -->
<h2 class="section-title pt-4">Subscribed!</h2>
</div>
</div>
</div>
</body>
</html>
<?php 
}
?>