<?php
	 
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
	
if(isset($_POST) && !empty($_POST['email']) ){
	 
	// Compose a simple HTML email message
	$message = '<html><body>';
	$message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
	$message .= '<p >We have revived the below message</p>';
	$message .= '<p >Name: '.$_POST['Name'].'</p>';
	$message .= '<p >Email'.$_POST['email'].'</p>';
	$message .= '<p >Address'.$_POST['address'].'</p>';
	$message .= '<p >Mobile'.$_POST['mobile'].'</p>';
	$message .= '<p >'.$_POST['message'].'</p>';
	$message .= '</body></html>';

	$body                = $message;
	$body                = eregi_replace("[\]",'',$body);
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPSecure = 'ssl';
	$mail->Host          = "smtp.gmail.com";
	$mail->SMTPAuth      = true;                  // enable SMTP authentication
	$mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent
	$mail->Port          = 465;                    // set the SMTP port for the GMAIL server
	$mail->Username      = "rockingteamf@gmail.com"; // SMTP account username
	$mail->Password      = "p@ssw0rd1234";        // SMTP account password
	$mail->SetFrom('admin@testapp.com', 'Test Admin');
	
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->MsgHTML($body);
	$mail->AddAddress($_POST["email"], $_POST["name"]);
  

	$mail->Subject       = "PHPMailer Test Subject via smtp, basic with authentication";

	if(!$mail->Send()) {
	    echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
	} else {
	   echo "Message sent to :" . $row["full_name"] . ' (' . str_replace("@", "&#64;", $row["email"]) . ')<br />';
	}


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Contact Us Form</h2>
  <form action ="<?=($_SERVER['PHP_SELF'])?>"  method="post" >
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  name="email" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="pwd">Name:</label>
      <input type="text" class="form-control"  name="name"   placeholder="Name">
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control"  name="address"   placeholder="Address">
    </div>
	<div class="form-group">
      <label for="pwd">Mobile:</label>
      <input type="text" class="form-control"  name="mobile"   placeholder="Mobile">
    </div>
	<div class="form-group">
      <label for="pwd">Message:</label>
      <textarea  name="message"  class="form-control" placeholder="Message"></textarea>
    </div>
	
	
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
