<?php
$contactnaam = 'HCI Toolkit';
$contactemail = 'r.m.pastoor@hr.nl';
if(!empty($_POST['submit'])) {
	function email_validator($email) {
	   if (eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,4}$",$email)) {
	        $email_host = explode("@", $email);
				$email_host = $email_host[1];
				$email_resolved = gethostbyname($email_host);
				if ($email_resolved == $email_host) {
					 $valid = "false";
				} else {
					 $valid = "true";
				}
	    } else {
	        $valid = "false";
	    }
	    return $valid;
	}
	$name = strip_tags($_POST['name']);
	$date = strip_tags($_POST['date']);
	$time = strip_tags($_POST['time']);
	$amount = strip_tags($_POST['amount_persons']);
	$mail = strip_tags($_POST['email']);
	$validmail = email_validator($mail);
	if (!empty($name) && !empty($date) && !empty($time) && !empty($amount) && !empty($mail)) {
		if ($validmail == 'true') {
            /* Headers en bericht voor email */
			$headers = "From: " . $name . " <" . $mail . ">\r\n";
			$headers .= "Reply-To: " . $name . " <" . $mail . ">\r\n";
			$headers .= "Return-Path: " . $name . "  <" . $mail . ">\r\n";
			$headers .= 'X-Mailer: PHP/' . phpversion();

             /* Headers en bericht voor succes email */
			$headers1 = "From: " . $contactnaam . " <" . $contactemail . ">\r\n";
			$headers1 .= "Reply-To: " . $contactnaam . " <" . $contactemail . ">\r\n";
			$headers1 .= "Return-Path: " . $contactnaam . " <" . $contactemail . ">\r\n";

			$mailbericht_book = "Reservering met de volgende gegevens: \n Naam: " .$name."\n Datum: " .$date. "\n Tijd: " .$time."\n Aantal personen: " .$amount. "\n E-mail adres: " .$mail;
			$mailbericht_confirm = "Beste " . $name . ",\r\n\r\nDank u voor uw reservering.\r\nU krijgt bericht wanneer de reservering is ingeboekt.\r\n\r\n";

			/* hier worden de 2 mails verstuurd */
			mail($contactemail, 'Reservering bij SanSan', $mailbericht_book, $headers) or die("Fout bij het versturen van de e-mail");
			mail($mail, $name . ', uw reservering bij SanSan', $mailbericht_confirm, $headers1) or die("Fout bij het versturen van de e-mail");
			$succes = 'true';
			$_POST['name'] = $_POST['date'] = $_POST['time'] = $_POST['amount_persons'] = $_POST['email'] = '';
		} else {
			$error = 'Er is een ongeldig e-mail adres ingevoerd.';
			$_POST['email'] = '';
		}
	} else {
		$error = 'Niet alle velden zijn correct ingevuld.';
	}
}

if (!empty($succes)) {
	header("Location: http://rolandpastoor.nl/freelance/sansan/");
	//echo '<p class="succes">Uw bericht is met succes verzonden.</p>';
}
if (!empty($error)) {				
	echo '<p class="error">' . $error . '</p>';
}

?>
