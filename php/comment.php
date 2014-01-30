<?php 

	require_once('config.php');
	require_once('phpMailer-master/class.phpmailer.php');


	// Sender Info
	$name = trim($_POST['commetn-name']);
	$email = trim($_POST['commetn-email']);
	$message = trim($_POST['commetn-message']);
    $website = trim($_POST['commetn-website']);
	$err = "";
    $errname = "Name*";
    $errmessage = "Your Comment...*";

	// Check Form
	$pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
	if(!preg_match_all($pattern, $email, $out)) {
		$err = MSG_INVALID_EMAIL; // Invalid email
	}
	if(!$email) {
		$err = MSG_INVALID_EMAIL; // Error Email
	}	
	if($message == $errmessage) {
		$err = MSG_INVALID_MESSAGE; // Error Message
	}
    if(!$message) {
        $err = MSG_INVALID_MESSAGE; // No Message
    }
	if($name == $errname) {
		$err = MSG_INVALID_NAME; // Error name
	}

	$body=include(TEMPLATE_PATH_COMMENT);

	$mail=new PHPMailer();
	
	$mail->SetFrom($email,$name); 
	$mail->AddAddress(TO_EMAIL,TO_NAME);

	//$mail->IsSMTP(); // enable SMTP
	$mail->SMTPSecure='ssl';
	$mail->SMTPAuth=true;
	$mail->Host=SMTP_HOST;
	$mail->Port=465; 
	$mail->Username=SMTP_USERNAME;
	$mail->Password=SMTP_PASSWORD;
		
	$mail->Subject=SUBJECT;
	$mail->MsgHTML($body);

	if (!$err){

		// Send the email

		if ($mail->Send()) {
				// If the message is sent successfully print
				echo "SEND"; 
			} else {
				// Display Error Message
				echo MSG_SEND_ERROR; 
			}
	} else {
		echo $err; // Display Error Message
	}
?>