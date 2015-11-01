<?php
//config

$config['email']['from'] 		== 'email@demo.nl';
$config['email']['fromName'] 	== 'Demo from Sample Company';
$config['email']['bcc']			== 'email@demo.nl';
$config['email']['subject']		== 'Your invoice from Sample company';

$config['email']['smtphost'] 	== 'smtp-relay.gmail.com';
$config['email']['smtphauth'] 	== true;
$config['email']['smtpuser'] 	== 'email@demo.com';
$config['email']['smtppass'] 	== 'Sup3rS3cretpass';
$config['email']['smtpsec'] 	== 'tls';
$config['email']['smtpport'] 	== 587;

$config['twilio']['sid']		== 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$config['twilio']['authtoken']  == 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$config['twilio']['number']		== 'xxx-xxx-xxx';
$config['twilio']['messsage']	== "Dear $name, we just send you the invoice for the new services of $amount. Please check your email";

$config['invoice']['adress'] 	== "<b>Sample company</b><br>Sample Street 1<br>1234AB Amsterdam<br>The Netherlands</p><p>Tel:   (+xx) (x)xx xxx xxxx<br>Int:    +x xxx-xxx-xxx<br>Mail: demo@company.com ";
$config['incoice']['banktype']  == 'IBAN';
$config['incoice']['banknum']   == 'NLxx ABNA xxxx xxxx xx';
$config['incoice']['bankname']  == 'Your name';