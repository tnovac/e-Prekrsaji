<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
	include("func.php");
?>
      <?php
if(isset($_GET['placenineplaceni']) || isset($_GET['str'])){
			
			if($aktivni_korisnik_tip==0 || $aktivni_korisnik_tip==1){
			
			$sql= "select korisnik.korisnik_id, concat(korisnik.ime,' ',korisnik.prezime) from";
				
			if($aktivni_korisnik_tip==1){
			$sql.=" prekrsaj, vozilo, korisnik where prekrsaj.vozilo_id = vozilo.vozilo_id
							and vozilo.korisnik_id = korisnik.korisnik_id  and prekrsaj.kategorija_id  in 
							(select kategorija_id from kategorija where moderator_id = ".$aktivni_korisnik_id.")";
			}
			else
			{
			$sql.=" korisnik where korisnik.tip_id<>0";	
			}
			
			$ispis = mysqli_query($bp,$sql);
			
			$redovi = mysqli_num_rows($ispis);
			$broj_str = ceil($redovi/$vel_str);
			
			
			$sqlgl = "select distinct korisnik.korisnik_id, concat(korisnik.ime,' ',korisnik.prezime) from";
			
			if($aktivni_korisnik_tip==1){
			$sqlgl.=" prekrsaj, vozilo, korisnik where prekrsaj.vozilo_id = vozilo.vozilo_id
							and vozilo.korisnik_id = korisnik.korisnik_id  and prekrsaj.kategorija_id  in 
							(select kategorija_id from kategorija where moderator_id = ".$aktivni_korisnik_id.")";
			}
			else
			{
			$sqlgl.=" korisnik where korisnik.tip_id<>0";	
			}
			
			$sqlgl.=" limit ".$vel_str;
			
				if (isset($_GET['str'])){
				$sqlgl = $sqlgl . " OFFSET " . (($_GET['str'] - 1) * $vel_str);
				$aktivna = $_GET['str'];
				}
				else
				{
					$aktivna = 1;
				}
				
			$ispis = mysqli_query($bp,$sqlgl);
			echo "<h3>Plaćene i neplaćene kazne</h3>";
			echo "<div class=\"korisnici\">";

			echo "<table class=\"u-full-width\">";
			echo "<thead>";
			echo "<tr>";
			echo " <th class='tablicared'>Korisnik</th> <th class='tablicared'>Ukupno plaćenih</th> <th class='tablicared'>Ukupno neplaćenih</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";

			while(list($korisnikid,$subjekt)=mysqli_fetch_array($ispis)){	
			$ukplacenih = placeneneplacenekor($korisnikid,"P");
			$ukneplacenih = placeneneplacenekor($korisnikid,"N");
			
				echo "<tr>";
				echo " <td class='tablicared'>$subjekt</td><td align='center'>$ukplacenih</td><td align='center'>$ukneplacenih</td>";
				echo "</tr>";
		
			}
			echo "<tr>";
			echo " <td class='tablicared' colspan='3'>";
			echo "Stranice: ";
				if ($aktivna != 1) { 
					$prethodna = $aktivna - 1;
					echo "<a href=\"statplacenineplaceni.php?str=" .$prethodna . "\">&lt;</a>";	
				}
				for ($i = 1; $i <= $broj_str; $i++) {
					echo "<a ";
					if ($aktivna == $i) {
						$istakni="<strong>$i</strong>";
					}
					else
					{
						$istakni = $i;
					}
					echo " href=\"statplacenineplaceni.php?str=" .$i . "\"> $istakni </a>";
				}
				if ($aktivna < $broj_str) {
					$sljedeca = $aktivna + 1;
					echo "<a href=\"statplacenineplaceni.php?str=" .$sljedeca . "\">&gt;</a>";	
				}
			echo "</td>";
			echo "</tr>";
			echo "</tbody>";
			echo "</table>";
			echo "</div>";
			}
			
			}


	function placeneneplacenekor($korisnik,$status){
		$bp=spojiSeNaBazu();
		global $aktivni_korisnik_id, $aktivni_korisnik_tip;
		$sql = "select * from prekrsaj
		inner join vozilo
		on prekrsaj.vozilo_id = vozilo.vozilo_id
		inner join korisnik
		on vozilo.korisnik_id = korisnik.korisnik_id
		where korisnik.korisnik_id = ".$korisnik." and prekrsaj.`status` = '$status'";
		
		if($aktivni_korisnik_tip==1){
			$sql.=" and prekrsaj.kategorija_id in (SELECT kategorija_id FROM kategorija WHERE moderator_id = ".$aktivni_korisnik_id.")";
		}		
		$ispis = mysqli_query($bp,$sql);						
		$broj = mysqli_num_rows($ispis);
					
	return $broj;			
	}
	
	
	


	
?>
		</div>
    </div>
<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>

	
