<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>	
      <?php
	  
	 $vel_str=5;
	 $kolone = 7;
	$sql = "SELECT count(*) FROM korisnik";

	$ispis = mysqli_query($bp,$sql);	
	$red = mysqli_fetch_array($ispis);
	$broj_redaka = $red[0];
	
	$broj_str = ceil($broj_redaka / $vel_str);
	
	$sql = "SELECT * FROM korisnik order by korisnik_id LIMIT " . $vel_str;
	
	if (isset($_GET['str'])){
		$sql = $sql . " OFFSET " . (($_GET['str'] - 1) * $vel_str);
		$aktivna = $_GET['str'];
	} else {
		$aktivna = 1;
	}
	

	$ispis = mysqli_query($bp,$sql);
	echo "<div class=\"korisnici\">";
	echo "<table  class=\"u-full-width\">";
	echo "<thead>";
	echo "<tr>
		 <th>Korisničko ime</th>
		 <th>Ime</th>";
	echo " <th>Prezime</th>
	<th>E-mail</th>
	<th>Lozinka</th>		 
		 <th>Akcija</th>
	</tr>";
	echo "</thead>";
	echo "<tbody>";

	while(list($id, $tip, $kor_ime,$lozinka,$ime,$prezime,$email, $slika) = 
		mysqli_fetch_array($ispis)) {
				
		echo "<tr>
			 <td>$kor_ime</td>
			 <td>$ime</td>";
		
			
		
		echo " <td>" .  (empty($prezime) ? "&nbsp;" : "$prezime") . "</td>
			 <td>" .  (empty($email) ? "&nbsp;" : "$email") . "</td>";
		echo "<td>$lozinka</td>";
		if ($aktivni_korisnik_tip==0) {
			echo " <td><a href='azurkorisnika.php?korisnik=$id'>UREDI</a></td>";
		}
		echo	"</tr>";
	}

		echo "<tr>";
			echo " <td colspan='$kolone'>Stranice: ";
			if ($aktivna != 1) { 
			$prethodna = $aktivna - 1;
			echo "<a href=\"korisnici.php?str=" .$prethodna . "\">&lt;</a>";	
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
			echo "' href=\"korisnici.php?str=" .$i . "\"> $glavnastr </a>";
			}
			if ($aktivna < $broj_str) {
			$sljedeca = $aktivna + 1;
			echo "<a href=\"korisnici.php?str=" .$sljedeca . "\">&gt;</a>";	
			}
			echo "</td>";
			echo "</tr>";
			echo "</tbody>";
			echo "</table>";
	
	if ($aktivni_korisnik_tip==0) {
		echo '<a href="azurkorisnika.php">Dodaj korisnika</a>';
	} else if(isset($_SESSION["aktivni_korisnik_id"])) {
		echo '<a href="azurkorisnika.php?korisnik=' . $_SESSION["aktivni_korisnik_id"] . '">Uredi moje podatke</a>';
	}


?>
		</div>
<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>

