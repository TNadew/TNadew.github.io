<?
	// Define the receiver of the email
	
	define('TO_NAME','Andrey');
	define('TO_EMAIL','sokolby@gmail.com');

	define('TEMPLATE_PATH','template/mail.php');
    define('TEMPLATE_PATH_COMMENT','template/comment.php');

	define('SMTP_HOST','smtp.gmail.com');
	define('SMTP_USERNAME','sokolby');
	define('SMTP_PASSWORD','');

	define('SUBJECT','Contact from your website');	
	
	// Error Messages
	define('MSG_INVALID_NAME','Please enter your name.');
	define('MSG_INVALID_EMAIL','Please enter valid e-mail.');
	define('MSG_INVALID_MESSAGE','Please enter your message.');
	define('MSG_SEND_ERROR','Sorry, we can\'t send this message.');

?>