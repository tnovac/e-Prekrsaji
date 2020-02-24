<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>
		
	<?php

	if(isset($_GET['vozilo_id'])){
		$voziloid=$_GET['vozilo_id'];
	}

	$sql="SELECT COUNT(*) FROM prekrsaj, vozilo, kategorija
	where prekrsaj.vozilo_id = vozilo.vozilo_id
    AND kategorija.kategorija_id = prekrsaj.kategorija_id";
	if(($aktivni_korisnik_tip != -1)  && isset($_GET['vozilo_id'])){
		$sql.=" AND vozilo.vozilo_id=".$voziloid;
	}
	
	if($aktivni_korisnik_tip == 2){
					
				if($_SERVER['QUERY_STRING']==""  || isset($_GET['str'])){
					$sql.=" and vozilo.korisnik_id=".$aktivni_korisnik_id;	
				}
					
					if(isset($_GET['voziloid'])){
						
						$sql.=" and vozilo.korisnik_id=".$aktivni_korisnik_id." and vozilo.vozilo_id=".$_GET['vozilo_id'];
					}
					
					
					if(isset($_GET['kategorija_id'])){
						
						$sql.=" and kategorija.kategorija_id = ".$_GET['kategorija_id'];
					}
	}
	
		if($aktivni_korisnik_tip == 1){
					
				if($_SERVER['QUERY_STRING']==""  || isset($_GET['str'])){
					$sql.=" and kategorija.kategorija_id in (select kategorija_id from kategorija where moderator_id = ".$aktivni_korisnik_id.")";	
				}
					
					if(isset($_GET['voziloid'])){
						
						$sql.=" and vozilo.korisnik_id=".$aktivni_korisnik_id." and vozilo.vozilo_id=".$_GET['vozilo_id'];
					}
					
					
					if(isset($_GET['kategorija_id'])){
						
						$sql.=" and kategorija.kategorija_id = ".$_GET['kategorija_id'];
					}
	}
	
	
	
	
	$ispis = mysqli_query($bp,$sql);
	$red=mysqli_fetch_array($ispis);
	$broj_redaka=$red[0];
	$vel_str=5;
	$broj_str=ceil($broj_redaka/$vel_str);
	
	$sql="SELECT	prekrsaj.prekrsaj_id,kategorija.kategorija_id,kategorija.naziv,vozilo.vozilo_id,vozilo.tip_vozila,prekrsaj.naziv,prekrsaj.opis,prekrsaj.`status`,prekrsaj.novcana_kazna,prekrsaj.datum_prekrsaja,
	prekrsaj.vrijeme_prekrsaja,prekrsaj.datum_placanja,prekrsaj.vrijeme_placanja,prekrsaj.slika,prekrsaj.video
	FROM prekrsaj, vozilo, kategorija
	where prekrsaj.vozilo_id = vozilo.vozilo_id
    AND kategorija.kategorija_id = prekrsaj.kategorija_id";
	if(($aktivni_korisnik_tip  != -1)  && isset($_GET['vozilo_id'])){
		$naslov = "Gledate popis prekršaja za odabrano vozilo";
		$sql.=" AND vozilo.vozilo_id=".$voziloid;
	}
	
	
	if($aktivni_korisnik_tip == 2){
					
				if($_SERVER['QUERY_STRING']==""  || isset($_GET['str'])){
					$sql.=" and vozilo.korisnik_id=".$aktivni_korisnik_id;	
				}
					
					if(isset($_GET['voziloid'])){
						
						$sql.=" and vozilo.korisnik_id=".$aktivni_korisnik_id." and vozilo.vozilo_id=".$_GET['vozilo_id'];
					}
					
					
					if(isset($_GET['kategorija_id'])){
						
						$sql.=" and kategorija.kategorija_id = ".$_GET['kategorija_id'];
					}
	}
	
	
	if($aktivni_korisnik_tip == 1){
					
				if($_SERVER['QUERY_STRING']==""  || isset($_GET['str'])){
					$sql.=" and kategorija.kategorija_id in (select kategorija_id from kategorija where moderator_id = ".$aktivni_korisnik_id.")";	
				}
					
					if(isset($_GET['voziloid'])){
						
						$sql.=" and vozilo.korisnik_id=".$aktivni_korisnik_id." and vozilo.vozilo_id=".$_GET['vozilo_id'];
					}
					
					
					if(isset($_GET['kategorija_id'])){
						
						$sql.=" and kategorija.kategorija_id = ".$_GET['kategorija_id'];
					}
	}

	$sql.=" ORDER BY prekrsaj.prekrsaj_id desc LIMIT ".$vel_str;
	if(isset($_GET['str'])){
		$sql=$sql." OFFSET ".(($_GET['str']-1)*$vel_str);
		$aktivna=$_GET['str'];
	}
	else $aktivna = 1;
	
	$ispis = mysqli_query($bp,$sql);
	echo "<div class=\"korisnici\">";

	echo "<table class=\"u-full-width\">";
	echo "<thead><tr>
		 <th>Kategorija </th> 
		 <th>Vozilo</th> 
		 <th>Naziv prekršaja</th> 
		 <th>Status kazne</th> 
		 <th>Iznos kazne</th> 
	 <th>Datum i vrijeme prekršaja</th> 
	 <th>Datum i vrijeme plaćanja</th> 
		 <th> Video </th>";
		if($aktivni_korisnik_tip==2){
		echo " <th>Plaćanje</th>";
		}
		if($aktivni_korisnik_tip==1 || $aktivni_korisnik_tip==0){
		echo " <th>Radnja</th>";
		}
	echo "</tr></thead>";
	
	echo "<tbody>";
	while(list($id,$kategorijaid,$kategorijanaz,$voziloid,$voznaziv,$naziv,$opis,
	$status,$novkazna,$datum_prekrsaja,$vrijeme_prekrsaja,
	$datum_placanja, $vrijeme_placanja,$slika,$video)=mysqli_fetch_array($ispis)){
		$datum_prekrsaja=date("d.m.Y",strtotime($datum_prekrsaja));
		$datum_placanja=date("d.m.Y",strtotime($datum_placanja));
		echo "<tr>
			 <td> $kategorijanaz </td> <td> $voznaziv </td> <td> $naziv </td> <td> $status </td><td align='right'> $novkazna kn </td> <td>$datum_prekrsaja $vrijeme_prekrsaja</td> <td>$datum_placanja $vrijeme_placanja</td>";		
			echo " <td>";
			if($video != ""){
				echo "<video width='160' height='140' controls>";
				echo "<source src='$video' type='video/mp4'>";
				echo "<source src='$video' type='video/webm'>";
				echo "</video>";
				}
			echo "</td>";
			
			$plati="";
			
						
				$ima = "select kategorija_id from kategorija where moderator_id = ".$aktivni_korisnik_id." and kategorija_id = ".$kategorijaid;
				$postoji = mysqli_query($bp,$ima);
				$koliko = mysqli_num_rows($postoji);
			
			if($status=="N"){
			$plati = "<a href='placanjeprekrsaja.php?prekrsaj_id=$id&iznos=$novkazna&vozilo_id=$voziloid'>Plati</a>";
			}
			
			if($aktivni_korisnik_tip == 2 || ($aktivni_korisnik_tip == 1 && $koliko == 0 && $status=="N")){
			echo " <td>$plati</td>";
			}

			
			if(($aktivni_korisnik_tip==1 && $koliko > 0) || $aktivni_korisnik_tip==0){				
			echo " <td><a href='azurprekrsaji.php?azuriraj=$id'>Uredi</a></td>";
			}
			
			if($aktivni_korisnik_tip==1 && $status=="P" && $koliko == 0){
				echo " <td></td>";
			}	
		echo "</tr>";
		
	}
	echo "<tr>";
			echo " <td colspan='10'>Stranice: ";
			if ($aktivna != 1) { 
			$prethodna = $aktivna - 1;
			echo "<a href=\"prekrsaji.php?";
			if(isset($_GET["vozilo_id"])){
				echo "vozilo_id=".$_GET["vozilo_id"]."&";
			}
			echo "str=" .$prethodna . "\">&lt;</a>";	
			}
			for ($i = 1; $i <= $broj_str; $i++) {
			echo "<a ";
			if ($aktivna == $i) {
				$glavnastr="<mark>$i</mark>";
			}
			else
			{
				$glavnastr = $i;
			}
			echo "' href=\"prekrsaji.php?";
			if(isset($_GET["vozilo_id"])){
				echo "vozilo_id=".$_GET["vozilo_id"]."&";
			}
			echo "str=" .$i . "\"> $glavnastr </a>";
			}
			if ($aktivna < $broj_str) {
			$sljedeca = $aktivna + 1;
			echo "<a href=\"prekrsaji.php?";
			if(isset($_GET["vozilo_id"])){
				echo "vozilo_id=".$_GET["vozilo_id"]."&";
			}
			echo "str=" .$sljedeca . "\">&gt;</a>";	
			}
			echo "</td>";
			echo "</tr>";
	echo "</tbody>";
	echo "</table>";
	
	if($aktivni_korisnik_tip==1){
		echo "<p><a href='azurprekrsaji.php?novi'>Dodaj novi prekršaj</p>";
		echo "<p><a href='statplacenineplaceni.php?placenineplaceni'>Plaćeni i neplaćeni prekršaji - korisnik</p>";
	}
	
	if($aktivni_korisnik_tip==0){
		echo "<p><a href='azurprekrsaji.php?novi'>Dodaj novi prekršaj</p>";
		echo "<p><a href='statplacenineplaceni.php?placenineplaceni'>Plaćeni i neplaćeni prekršaji - korisnik</p>";
		echo "<p><a href='pretrazivanjeprekrsaja.php?ukupno'>Pretraga prekršaja - ukupno</p>";
		echo "<p><a href='pretrazivanjeprekrsaja.php?prvih20'>Pretraga prekršaja - top 20</p>";
	}
?>
		</div>
<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>