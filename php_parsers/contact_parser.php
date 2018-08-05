<?php
if( isset($_POST['n']) && isset($_POST['e']) && isset($_POST['m']) ){
  $n = preg_replace('#[^a-z 0-9]#i', '', $_POST['n']);
  $c = preg_replace('#[^a-z 0-9]#i', '', $_POST['c']);
  $e = ($_POST['e']);
  if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address<br /><br />";
        exit();
  }
  $p = preg_replace('#[^0-9-()]#i', '', $_POST['p']);
	$m = nl2br($_POST['m']);
  $m = htmlentities($_POST['m']);
	$to = "matt.unisin@gmail.com";
	$from = $e;
	$subject = 'Fitch Patent Drafting Service Contact Form';
	$message = '<b>Name:</b> '.$n.' <br /><b>Company:</b> '.$c.' <br /><b>Email:</b> '.$e.' <br /><b>Phone:</b> '.$p.' <br /><p>'.$m.'</p>';
	$headers = "From: $from\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	if( mail($to, $subject, $message, $headers) ){
		echo "success";
	} else {
		echo "The server failed to send the message. Please try again later.";
	}
}
?>
