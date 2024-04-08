<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$from = stripslashes($_POST['name']) . "<" . stripslashes($_POST['email']) . ">";

	$to = 'gustavonoronhadev@gmail.com';

	$subject = 'New Message from Gustavo Noronha Contact Form';

	$headers = "From: $from\r\n" .
		"MIME-Version: 1.0\r\n" .

		$body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";

	if (empty($name) or empty($message) or empty($phone) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 'Please fill all the fields and try again.';
		exit;
	}

	if (mail($to, $subject, $body, $from)) {
		echo 'Thank You! We will be in touch with you very soon.';
	} else {
		echo 'Sorry there was an error sending your message. Please try again';
	}
}
