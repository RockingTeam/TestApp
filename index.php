<?php

if(isset($_POST) && !empty($_POST['email']) ){
	 $to = trim($_POST['email'])
	 $subject = 'testing GIT/Heruko';
	 $from = 'test@testing.com';
	 
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	 
	// Create email headers
	$headers .= 'From: '.$from."\r\n".
		'Reply-To: '.$from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
	 
	// Compose a simple HTML email message
	$message = '<html><body>';
	$message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
	$message .= '<p style="color:#080;font-size:18px;">We have revived the below message</p>';
	$message .= '<p style="color:#080;font-size:18px;">Name: '.$_POST['Name'].'</p>';
	$message .= '<p style="color:#080;font-size:18px;">Email'.$_POST['email'].'</p>';
	$message .= '<p style="color:#080;font-size:18px;">Address'.$_POST['address'].'</p>';
	$message .= '<p style="color:#080;font-size:18px;">Mobile'.$_POST['mobile'].'</p>';
	$message .= '<p style="color:#080;font-size:18px;">'.$_POST['message'].'</p>';
	$message .= '</body></html>';
	 
	// Sending email
	if(mail($to, $subject, $message, $headers)){
		echo 'Your mail has been sent successfully.';
	  } else{
		echo 'Unable to send email. Please try again.';
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
  <form action ="<?=($_SERVER['PHP_SELF'])?>" >
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
      <textarea  name="message"  class="form-control" placeholder="Message">
    </div>
	
	
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
