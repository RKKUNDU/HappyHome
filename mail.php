<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thanking you</title>
</head>

<body>
<?php
if(isset($_POST['send'])) 
{
	
/*$email_to = "rohitkundu.1999slg@gmailcom";
*/
function died($error) {
echo "We are very sorry, but there were error(s) found with the form you submitted. ";
echo "These errors appear below.<br /><br />";
echo $error."<br /><br />";
echo "Please go back and fix these errors.<br /><br />";
die();
}
/*
// validation expected data exists
if(!isset($_POST['name']) ||
!isset($_POST['email']) ||
!isset($_POST['subject']) ||
!isset($_POST['comments'])) {
died('We are sorry, but there appears to be a problem with the form you submitted.');
}
*/
	$name = $_POST['name'];
$email_from = $_POST['email']; // required
$subject = $_POST['subject']; // not required
$comments = $_POST['comments'];
//$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if(!preg_match($email_exp,$email_from)) {
$error_message .= 'The Email Address you entered does not appear to be valid.<br />';}
$string_exp = "/^[A-Za-z .'-]+$/";
if(!preg_match($string_exp,$name)) {
$error_message .= 'The Name you entered does not appear to be valid.<br />';
}
/*if(strlen($error_message) > 0) {
died($error_message);
}*/
$email_message = "Form details below.\n\n";
function clean_string($string) {
$bad = array("content-type","bcc:","to:","cc:","href");
return str_replace($bad,"",$string);
}

	$email_message .= "Name: ".clean_string($name)."\n";
$email_message .= "Email: ".clean_string($email_from)."\n";
$email_message .= "Comments: ".clean_string($comments)."\n";

/*
	$email_message .= "Name: ".$first_name."\n";
$email_message .= "Email: ".$email_from."\n";
$email_message .= "Comments: ".$comments."\n";*/
// create email headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail("rohitkundu.1999slg@gmail.com", $_POST['subject'], $email_message, $headers);
	
}
?>

<!-- include your own success html here -->

Thank you for contacting us. We will be in touch with you very soon.


</body>
</html>