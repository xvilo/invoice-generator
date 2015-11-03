<?php
	$date = date_create($_POST['desc']['factdate']);
	require_once('config.php');
   ?>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title><?php echo $config['email']['subject'] ?></title>
</head>
<body>
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="700">
	 <tr style="width: 350px; float: left;">
	  <td style="display:block;border: none;">
	   <img src="https://xvilo.com/factuur/img/logo.png">
	  </td>
	  <td style="display:block;border: none;">
	  <h1>Factuur</h1>
	  </td>
	  <td style="display:block;border: none;" class="resp">
		<p><?php echo $_POST['recp']['company'] ?><br>
		<?php echo $_POST['recp']['name'] ?><br>
		<?php echo $_POST['recp']['adress'] ?><br>
		<?php echo $_POST['recp']['pcplace'] ?></p>
		</td>
		<td style="display:block; margin-top: 50px; border: none;" class="desc">
		<p><b>Klantnummer:</b> <?php echo $_POST['desc']['custno'] ?><br>
		<b>Factuurnummer:</b> <?php echo $_POST['desc']['factno'] ?><Br>
		<b>Factuurdatum:</b> <?php echo date_format($date, 'd-m-Y') ?><br>
		<b>Ordernummer:</b> <?php echo $_POST['desc']['orderno'] ?></p>
		</td>
	 </tr>
	 <tr style="width: 220px; float:right;">
	  <td class="sender" style="border-left: 3px #00A1DA solid;
    padding-left: 10px;
    margin-top: 40%; display: block;">
	<p><?php echo $config['invoice']['adress']?></p>
	</td>
	 </tr>
	 <tr style="clear:both;">
		 &nbsp;
	 </tr>
	 <tr style="width: 700px; float: left; margin-top:30px;">
	  <td style="width:363px; float:left; display:block;border: none;">
	  	<h6>Artikel</h6>
	  </td>
	  <td style="width: 125px; float:left; display:block;border: none;">
	  	<h6>Prijs per stuk</h6>
	  </td>
	  <td style="width: 115px; float:left; display:block;border: none;">
	  	<h6>Aantal</h6>
	  </td>
	  <td style="width: 97px; float:left; display:block;border: none;">
	  	<h6>Prijs totaal</h6>
	  </td>
	  <td style="clear: both;    height: 0px;
    display: block;">&nbsp;</td>
	  <td style="display:block;">
	  <hr style="margin:0px;">
	  </td>
	 </tr>
	 <tr style="clear:both;">
		 &nbsp;
	 </tr>
	 <?php
		$total = 0;
		foreach ($_POST['products'] as $v) {
			?>
	 <tr style="width: 700px; float: left; margin-top:0px;">
	  <td style="width:363px; float:left; display:block;border: none;">
	  	<h6><?php echo $v[0] ?></h6>
	  </td>
	  <td style="width: 125px; float:left; display:block;border: none;">
	  	<h6>&euro; <?php echo number_format($v[1], 2, ',', '.') ?></h6>
	  </td>
	  <td style="width: 115px; float:left; display:block;border: none;">
	  	<h6> <?php echo $v[2] ?></h6>
	  </td>
	  <td style="width: 97px; float:left; display:block;border: none;">
	  	<h6>&euro; <?php echo number_format($v[1] * $v[2], 2, ',', '.') ?></h6>
	  </td>
	  <td style="clear: both;    height: 0px;
    display: block;">&nbsp;</td>
	  <td style="display:block;">
	  </td>
	 </tr>
	    <?php
			    $curTotal = $v[1] * $v[2];
			    $total = $total + $curTotal;
		}
		?>
		<td style="clear: both;    height: 0px;
    display: block;">&nbsp;</td>
	  <td style="display:block; margin-top:60px; margin-bottom: 15px;">
	  <hr style="margin:0px;">
	  </td>
	 </tr>
	 <tr style="clear:both;">
		 &nbsp;
	 </tr>
	 <tr style="width: 220px; float:right;">
	  <td class="sender" style="padding-left: 10px;display: block;">
		<p>Subtotaal: &euro; <span style="text-align: right;"><?php echo number_format($total, 2, ',', '.') ?></span><br>
	 <!--  Btw: <?php echo $total * 0.21 ?> --></p>
   </p>
   <hr>
   <p><b>Totaal: &euro; <?php echo number_format($total, 2, ',', '.')?></b></p>
		</td>
	 </tr>
	 <tr style="clear:both;">
		 <td> <p style="margin-top:60px;"><b>Betaling factuur</b><br>
	Is deze factuur nog niet betaald, dan zien we de betaling graag voor <?php echo date('d-m-Y', strtotime($_POST['desc']['factdate']. ' + 14 days')); ?> 
	tegemoet op <?php echo $config['invoice']['banktype']?> <b><i><?php echo $config['invoice']['banknum']?></i></b> ten name van 
	<b><i><?php echo $config['invoice']['bankname'] ?></i></b> onder vermelding van het kenmerk <b><i><?php echo $_POST['desc']['custno'] ?>/<?php echo $_POST['desc']['factno'] ?></i></b></p></td></tr>
	 </tr>
	</table>
</body>
</html>