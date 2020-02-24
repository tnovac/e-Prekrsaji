<?php
ob_start();
include("baza.php");
	if (session_id() == "")
	
	session_start();
	
	$aktivni_korisnik=0;
	$aktivni_korisnik_tip=-1;
	

	if(isset($_SESSION['aktivni_korisnik']))
	{
	$aktivni_korisnik=$_SESSION['aktivni_korisnik'];
	$aktivni_korisnik_ime=$_SESSION['aktivni_korisnik_ime'];
	$aktivni_korisnik_tip=$_SESSION['aktivni_korisnik_tip'];
	$aktivni_korisnik_id = $_SESSION["aktivni_korisnik_id"];
	}
	$vel_str=5;
?>


<!DOCTYPE html>
<html>
	<head>
		<title>e-Prekršaji</title>
		<meta name="autor" content="Tomislav Novačić" />
		<meta name="predmet" content="IWA" />
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css"> 
		<link href="css.css" rel="stylesheet" type="text/css" />
		
	<script type="text/javascript">
function ProvjeriUnose(forma){	
		var svielementi = document.forms[forma];
		var info = "";
		var pogresnih=0;
		
		
		if(forma=="korisniklogin"){
		
			for (var i=0;i<svielementi.length;i++){		
			

				
				if(svielementi[i].value==""){
				pogresnih++;
				
				info+="<br>Unos "+svielementi[i].id+" nije evidentiran!";	
				}
				
				
			}
		
		}
		
		
		if(forma=="korisnikadmin"){
		
			for (var i=0;i<svielementi.length;i++){		
			
			if(svielementi[i].id!="slika" && svielementi[i].id!="slikahidden"){
				
				if(svielementi[i].value==""){
				pogresnih++;
				
				info+="<br>Unos "+svielementi[i].placeholder+" nije evidentiran!";	
				}
				
			}
				
			}
		
		}
		
		if(forma=="vozilo"){
		
			for (var i=0;i<svielementi.length;i++){
				if(svielementi[i].value==""){
				pogresnih++;
				info+="<br>Unos "+svielementi[i].placeholder+" nije evidentiran!";	
				}
			}
		
		}
		
		if(forma=="kategorija"){
		
			for (var i=0;i<svielementi.length;i++){
				if(svielementi[i].value==""){
				pogresnih++;
				info+="<br>Unos "+svielementi[i].placeholder+" nije evidentiran!";	
				}
			}
		
		}
		
		if(forma=="prekrsaj"){
		
			for (var i=0;i<svielementi.length;i++){
				
			if(svielementi[i].id!="video"){	
				if(svielementi[i].value==""){
				pogresnih++;
				info+="<br>Unos "+svielementi[i].placeholder+" nije evidentiran!";						
				
				}
				
				if(svielementi[i].id=="datum"){
					var datreg = /(0[1-9]|[1-2][0-9]|3[0-1])+\.(0[1-9]|1[0-2])+\.[0-9]{4}/;
					var dat = svielementi[i].value;

					if(datreg.test(dat) == false) {
						  info+="<br>Pogrešan oblik datuma (mora biti dd.mm.gggg)";
						  pogresnih++;
						  }
				}
				
				if(svielementi[i].id=="vrijeme"){
					var vrreg = /^([01][1-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/;
					var vri = svielementi[i].value;
						
					if(vrreg.test(vri) == false) {
						  info+="<br>Pogrešan oblik vremena (mora hh:mm:ss)";
						  pogresnih++;
						  }					
				 }								
			}
				
			}	
		}		
		if(forma=="placanje"){
		
			for (var i=0;i<svielementi.length;i++){
				if(svielementi[i].value==""){
				pogresnih++;
				info+="<br>Unos "+svielementi[i].id+" nije evidentiran!";
								
				}
				
				if(svielementi[i].id=="datum"){
					var datreg = /(0[1-9]|[1-2][0-9]|3[0-1])+\.(0[1-9]|1[0-2])+\.[0-9]{4}/;
					var dat = svielementi[i].value;

					if(datreg.test(dat) == false) {
						  info+="<br>Pogrešan oblik datuma (Ispravan oblik je dd.mm.gggg)";
						  pogresnih++;
						  }
				}
				
				if(svielementi[i].id=="vrijeme"){
					var vrreg = /^([01][1-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/;
					var vri = svielementi[i].value;
						
					if(vrreg.test(vri) == false) {
						  info+="<br>Pogrešan oblik vremena (Ispravan oblik je hh:mm:ss)";
						  pogresnih++;
						  }					
				 }				
			}			
		}
		
		
		if(forma=="pretraga"){
		
			for (var i=0;i<svielementi.length;i++){
				if(svielementi[i].value==""){
				pogresnih++;
				info+="<br>Unos "+svielementi[i].placeholder+" nije evidentiran!";
								
				}
				
				if(svielementi[i].id=="DatumOd"){
					var datreg = /(0[1-9]|[1-2][0-9]|3[0-1])+\.(0[1-9]|1[0-2])+\.[0-9]{4}/;
					var dat = svielementi[i].value;

					if(datreg.test(dat) == false) {
						  info+="<br>Pogrešan oblik Datum od (Ispravan oblik je dd.mm.gggg)";
						  pogresnih++;
						  }
				}
				
				if(svielementi[i].id=="DatumDo"){
					var datreg = /(0[1-9]|[1-2][0-9]|3[0-1])+\.(0[1-9]|1[0-2])+\.[0-9]{4}/;
					var dat = svielementi[i].value;

					if(datreg.test(dat) == false) {
						  info+="<br>Pogrešan oblik Datum do (Ispravan oblik je dd.mm.gggg)";
						  pogresnih++;
						  }
				}
				
			
			}			
		}

		
		if(pogresnih>0){
			document.getElementById("popisgresaka").innerHTML=info;
			return false;
		}		
}

function PretvoriVelika(){
	
	var reg = document.getElementById("registracija").value;
	
	document.getElementById("registracija").value = reg.toUpperCase();
	
}
</script>	
	</head>
	<body>

		<div class="wrapper">

		<header>
		
		<div class="info">
					<h1><span class="naslov"> e-Prekršaji</span></h1>
		</div>
		
		<?php
		if((isset($_SESSION['aktivni_korisnik']))) {
			echo "<div class='login'>";
			if($aktivni_korisnik === 0){
				echo "<strong>Status: </strong>Niste prijavljeni<br/>";
			}	
			else { 
					echo "<strong>Status: </strong> Dobrodošli, 👨 $aktivni_korisnik_ime<br/>";

			}
			echo "</div>";
		}
		?>

		<?php
		if(!isset($_SESSION['aktivni_korisnik'])) {
		?>
		<div class="form">
			<form method="POST" action="login.php">
					<input type="text" name="korisnicko_ime" placeholder="Unesite korisničko ime" value="" required />
					<input type="password" name="lozinka" placeholder="Unesite lozinku" value=""  required />
					<input type="submit" name="submit" class="button button-primary" value="Prijavi se" />
			</form>
		</div> 
		<?php } ?>	
		
		</header>
		
		<nav>
			<ul>
			
				<li><a href="index.php" class="klasa"> Početna </a> </li>
				<li><a href="kategorije.php" class="klasa"> Kategorije prekršaja </a> </li>
				
				<?php
				switch($aktivni_korisnik_tip){
					
				case 0:
				?>				
				<li><a href="motvozila.php" class="klasa"> Motorna vozila </a></li>
				<li><a href="korisnici.php" class="klasa"> Korisnici </a></li>
				<li><a href="prekrsaji.php" class="klasa"> Prekršaji </a></li>				
				<?php
				break;
				case 1:
				?>				
				<li><a href="motvozila.php" class="klasa"> Motorna vozila </a></li>
				<li><a href="prekrsaji.php" class="klasa"> Prekršaji </a></li>				
				<?php
				
				break;
				case 2:
				?>				
				<li><a href="motvozila.php" class="klasa"> Motorna vozila </a></li>
				<li><a href="prekrsaji.php" class="klasa"> Prekršaji </a></li>				
				<?php
				
				break;
				
				}
				?>
				<li><a href="O_autoru.html" class="klasa"> O autoru </a></li>
			</ul>
		</nav>
		
		<?php

			if(isset($_SESSION['aktivni_korisnik']))
			{
				echo "<div class=\"odjava\">";
				echo "<p>Zdravo, <strong>$aktivni_korisnik_ime</strong>!</p>";
				echo "<p>Odjavi se <a href='login.php?logout'>ovdje.</a><p>";
				echo "</div>";
			}

		?>