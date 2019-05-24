<?php
/*if( isset($_POST['n']) && isset($_POST['e']) && isset($_POST['m'])) {
  $n = $_POST['n'];
  $e = $_POST['e'];
  $m = nl2br($_POST['m']);
  $to = "fauzialdi005@gmail.com";
  $from = $e;
  $subject = 'Contact Form Message';
  $message = '<b>name:</b>'.$n.' <br><b>email:</b> '.$e.' <p>'.$m'</p>';
  $headers = "From: $from\n";
  $headers .= "MIME-Version: 1.0\n"
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  if( mail($to, $subject, $message, $headers)) {
    echo "success";
  } else {
    echo "The Server failed to sent the message. please try again leter";
  }
}*/
$errors = '';
$myemail = 'fauzialdi005@gmail.com';
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
if (!preg_match(
"/ ^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}
if( empty($errors))
{
    $to = '$myemail';
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. ".
        " Here are the details:\n Name: $name \n ".
        "Email: $email_address\n Message \n $message";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    header('Location: contact-form-thank-you.html');
}
?>