<?php
	
	ob_start();
	include('show.php');
    $mailcontents = ob_get_clean();
	
	require 'config.php'
	require 'phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$amount = number_format($total, 2, ',', '.');
	$kenmerk = $_POST['desc']['custno']."/".$_POST['desc']['factno'];
	$paybefore = date('d-m-Y', strtotime($_POST['desc']['factdate']. ' + 14 days'));
	
	$mail->isSMTP();
	$mail->Host = $config['email']['smtphost'] ;
	$mail->SMTPAuth = $config['email']['smtphauth'];
	$mail->Username = $config['email']['smtpuser'];
	$mail->Password = $config['email']['smtppass'];
	$mail->SMTPSecure = $config['email']['smtpsec']; 
	$mail->Port = $config['email']['smtpport']; 
	
	$mail->setFrom($config['email']['from'], $config['email']['fromName']);
	$mail->addAddress($_POST['send']['email'], $_POST['recp']['name']); 
	$mail->addBCC($config['email']['bcc']);
	
	$mail->isHTML(true);
	
	$mail->Subject = $config['email']['subject'];
	$mail->Body    = $mailcontents	;
	
	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Mail message has been sent<br>';
	}
	
	
    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * - Save it as sendnotifications.php and at the command line, run 
     *        php sendnotifications.php
     *
     * - Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *   in a web browser.
     * - Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *   directory to the folder containing this file, and load 
     *   localhost:8888/sendnotifications.php in a web browser.
     */
 
    // Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries, 
    // and move it into the folder containing this file.
    require "Services/Twilio.php";
 
    // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
    $AccountSid = $config['twilio']['sid'];
    $AuthToken = $config['twilio']['authtoken'];
 
    // Step 3: instantiate a new Twilio Rest Client
    $client = new Services_Twilio($AccountSid, $AuthToken);
 
    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.
    $people = array(
        $_POST['send']['phone'] => $_POST['recp']['name'],
    );
 
    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {
 
        $sms = $client->account->messages->sendMessage(
 
        // Step 6: Change the 'From' number below to be a valid Twilio number 
        // that you've purchased, or the (deprecated) Sandbox number
            $config['twilio']['number'], 
 
            // the number we are sending to - Any phone number
            $number,
 
            // the sms body
            $config['twilio']['messsage']
        );
 
        // Display a confirmation message on the screen
        echo "Sent message to $name";
    }

	?>