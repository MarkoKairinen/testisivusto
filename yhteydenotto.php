<?php

$info = ""; // ns. alustetaan php -muuttuja

// jos painetaan lomakkeen nappia toteutuu tämä if -lause
if(isset($_POST['action'])){
	
	/*
		Tässä pieni esimerkki php -koodista. Tässä lähetämme websivulla olevan
		lomakkeen tiedot sähköpostilla eteenpäin. 
		Huomaa, että PHP:n asetuksissa (c:\xampp\php\php.ini määritellään lähettävä
		sähköpostipalvelin (n. rivillä 1070). Se ei voi olla SMTP=localhost, vaan
		siinä pitää olla internetyhteyden palveluntarjoajan lähettävä sähköpostiopalvelin,
		esim:
		Telia = mail.inet.fi
		eli php.ini:n tulee
		
		SMTP = mail.inet.fi
	*/

	$kenelle	= "marko.kairinen@turku.fi"; // mihin osoitteeseen viesti lähetetään 
	
	$lahnimi 		= $_POST['nimi']; // lomakkeen kenttä, jossa name = "nimi"
	$lahposti 		= $_POST['sposti']; // lomakkeen kenttä, jossa name = "sposti"
	$lahpuhelin 	= $_POST['puhelin']; // lomakkeen kenttä, jossa name = "puhelin"
	$lahasia 		= $_POST['asia']; // lomakkeen kenttä, jossa name = "asia"
	
	$otsikko = "Viesti sivulta";
	$viesti = "Nimi: ".$lahnimi."\n\nSähköposti: ".$lahposti."\n\nPuhelin: ".$lahpuhelin.
	"\n\nAsia: ".$lahasia;
	
	$header = "From: ".$lahposti;
	
	if ($lahposti <> '') // eli jos lomakkeen sposti -kenttään on kirjoitettu jotain
	{	
		// php:n mail -funktio lähettää sähköpostiviestin
		mail($kenelle, $otsikko, $viesti, $header);
		// lomakkeen napin viereen tulostetaan $info -muuttujan arvo. Tässä onnistunut lähetys
		$info = "<span style=\"color: green; font-weight: bold; margin-left: 30px\">Viesti lähetetty!</span>";
		
	}
	else
	{	
		// lomakkeen sähköpostikenttään ei ole syötetty mitään. Sähköpostia ei lähetetä ja 
		// tulostetaan virhe
		$info = "<span style=\"color: red; font-weight: bold; margin-left: 30px\">Täytä pakollinen tieto!</span>";	
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.html">Etusivu</a></li> 
		<li><a href="yhteydenotto.php">Ota yhteyttä</a></li>
		<li><a href="https://www.finnair.com/fi/fi/" target="_blank">Finnair</a></li>
        <li><a href="https://www.norwegian.com/fi/" target="_blank">Norwegian</a></li>
        <li><a href="https://www.sas.fi/en/" target="_blank">SAS</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
		<li><a href="index.html">Etusivu</a></li> 
        <li><a href="yhteydenotto.php">Ota yhteyttä</a></li>
		<li><a href="https://www.finnair.com/fi/fi/" target="_blank">Finnair</a></li>
        <li><a href="https://www.norwegian.com/fi/" target="_blank">Norwegian</a></li>
        <li><a href="https://www.sas.fi/en/" target="_blank">SAS</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <div class="container">
  
	 <div class="row">
		<form method="post" action="yhteydenotto.php">
			<div class="input-field col s12">
			  <input name="nimi" id="nimi" type="text">
			  <label for="nimi">Nimi</label>
			</div>
			<div class="input-field col s12">
			  <input name="puhelin" id="puhelin" type="text">
			  <label for="puhelin">Puhelinnumero</label>
			</div>
			<div class="input-field col s12">
			  <input name="sposti" id="sposti" type="text">
			  <label for="sposti">Sähköposti</label>
			</div>
			
			<div class="input-field col s12">
			  <textarea id="asia" name="asia" class="materialize-textarea"></textarea>
			  <label for="asia">Asia</label>
			</div>
			
			<div class="col s12">
				<button class="btn waves-effect waves-light" type="submit" name="action">Lähetä
					<i class="material-icons right">child_friendly</i>
				</button><?php echo $info;?>
			</div>
		</form>
      </div>
    
  </div>
   
  
    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  
  <script>

    $(document).ready(function(){
    
      $('.materialboxed').materialbox();
      $('.carousel').carousel();

    });

  </script>

  </body>
</html>