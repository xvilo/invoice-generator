<?php
//config
$config = array(
	'email'=>array(
		'from' => 'from@domain.com',
		'fromName' => 'John from Company LLC',
		'bcc' => 'invoice@company.com',
		'subject' => 'Your invoice from Company LLC',
		
		'smtphost' => 'smtp-relay.gmail.com',
		'smtphauth' => true,
		'smtpuser' => 'from@domain.com',
		'smtppass' => 'Sup3rS3cretpassw0RD#@',
		'smtpsec' => 'tls',
		'smtpport' => 587
	),
	
	'twilio'=>array(
		'sid' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
		'authtoken' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
		'number' => 'xxx-xxx-xx',
		'messsage' => "Dear %s, we have just sent you the invoice of &euro;%s. If you didn't pay yet? The please transfer the money to IBAN XX12 XXXX 1234 1234 12 In the name of John Doe, indicating %s",
	),
	
	'invoice'=>array(
		'adress' => "<b>Company LLC</b><br>Broadstreet 139<br>8302AA Amsterdam<br>The Netherlands</p><p>Tel:   (+31) (0)12 123 1234<br>Int:    +1 123-123-123<br>Mail: john@domain.com ",
		'banktype' => 'IBAN',
		'banknum' => 'IBAN XX12 XXXX 1234 1234 12',
		'bankname' => 'John Doe'
	)
);