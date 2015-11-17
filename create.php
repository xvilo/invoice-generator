<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="index, nofollow">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Facturen</title>
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/custom.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <template id="tempproduct">
         <div class="product-group">
            <div class="col-sm-8">
               <input type="text" name="products[0][]" class="form-control" placeholder="Titel">
            </div>
            <div class="col-sm-2">
               <input type="text" name="products[0][]" class="form-control" placeholder="Prijs per stuk">
            </div>
            <div class="col-sm-2">
               <input type="text" name="products[0][]" class="form-control" placeholder="Bedrag">
            </div>
         </div>
      </template>
      <div class="container">
         <div class="header clearfix">
            <h3 class="text-muted">Facturen</h3>
         </div>
         <section id="gegevens">
               <form class="form" action="send.php" method="post">
                  <div class="form-group">
	                 <div class="row">
                     <div class="col-sm-6">
                        <h4>Ontvanger</h4>
                        <input type="text" name="recp[company]" class="form-control" placeholder="bedrijf"><br>
                        <input type="text" name="recp[name]" class="form-control" placeholder="Naam"><br>
                        <input type="text" name="recp[adress]" class="form-control" placeholder="Adres"><br>
                        <input type="text" name="recp[pcplace]" class="form-control" placeholder="PC + Plaats"><Br>
                     </div>
                     <div class="col-sm-6">
                        <h4>Verzenden naar</h4>
                        <input type="email" name="send[email]" class="form-control" placeholder="email"><br>
                        <input type="text" name="send[phone]" class="form-control" placeholder="phone"><br>
                     </div>
                     </div>
                  </div>
                  <div class="form-group">
	                  <div class="row">
                     <div class="col-sm-24">
                        <h4>Factuur gegevens</h4>
                        <input type="text" name="desc[custno]" class="form-control" placeholder="Klantnummer"><br>
                        <input type="text" name="desc[factno]" class="form-control" placeholder="Factuurnummer"><br>
                        <input type="date" name="desc[factdate]" class="form-control" placeholder="Factuurdatum"><br>
                        <input type="text" name="desc[orderno]" class="form-control" placeholder="ordernummer"><Br>
                        <textarea type="text" name="desc[factnotice]" class="form-control" placeholder="Opmerkingen"></textarea>
                     </div>
                  </div>
                  </div>
                 
                  <div id="products" class="form-group">
	                  <div class="row">
                     <div class="col-sm-8">
                        <h4>Producten</h4>
                     </div>
                     <div class="col-sm-2">
                        <h4>Prijs</h4>
                     </div>
                     <div class="col-sm-2">
                        <h4>Aantal</h4>
                     </div>
	                  </div>
	                  <div class="row">
                     <div class="product-group">
                        <div class="col-sm-8">
                           <input type="text" name="products[0][]" class="form-control" placeholder="Titel">
                        </div>
                        <div class="col-sm-2">
                           <input type="text" name="products[0][]" class="form-control" placeholder="Prijs per stuk">
                        </div>
                        <div class="col-sm-2">
                           <input type="text" name="products[0][]" class="form-control" placeholder="Bedrag">
                        </div>
                     </div>
                     </div>
                  </div>
                  <button type="button" id="add">Use me</button>
                   <button type="Submit" id="add">Submit</button>
               </form>
         </section>
         <hr>
         <section id="preview">
         </section>
         <section id="debug">
         </section>
      </div>
      <!-- /container -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script>
         $('form').change(function() 
         {
          console.log('Debug:');
          $.ajax({ 
              type: 'post',
              url: 'debug.php',
              data: $(this).serialize(),
              success: function(returnData) {
              $('#debug').html(returnData)
              }
          });
          
          console.log('Live:');
          $.ajax({ 
              type: 'post',
              url: 'show.php',
              data: $(this).serialize(),
              success: function(returnData) {
              $('#preview').html(returnData)
              }
          });
          return false;
         });
      </script>
      <Script>
         function prepareButton() {
          	var count = 0;
         $('#add').click(function() {
           event.preventDefault();
           var content = document.querySelector('#tempproduct').content;
           // Update something in the template DOM.
         count++;
         console.log('products['+count+'][]');
           console.log(content);
           $(content).find('input').attr("name", 'products['+count+'][]');
           document.querySelector('#products').appendChild(
           document.importNode(content, true));
         });
         }
         
         $(document).ready(function() {
          prepareButton();
         });
      </script>
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>