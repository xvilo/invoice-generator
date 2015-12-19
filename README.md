# invoice-generator
PHP invoice generator with send by mail. And twilio SMS intergration
## Details
The only thing you need to do is change the config.php file. That's all. 

### Features
* Live example of the invoice at the bottom of the page.
* Automagic calculation of (sub)totals and VAT.
* Sending invoice by email.
* Sends a text (SMS) message as bonus. Uses Twilio service for that.

### Bugs
* Better handling when invoice has been sent.

### What needs to be done in feature updates
* Disable/enable VAT/TAX in config and the amount.
* PDF attachment of invoice by mail.
* Online archive of sent invoices (weblink/webview).
* Remembering customer details. Selecting a customer and get all information prefilled.
* Check for better handling of international cellphone number.
* Pay your invoice online with PSP intergration for Paypal (creditcard) and iDeal.
* Monthly export to SEPA-debitbatches in the PAIN (XML) format. (for direct debit possibility)
