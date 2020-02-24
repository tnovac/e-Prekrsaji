<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>
	<?php
	
	

	if(isset($_GET['ukupno']) || isset($_GET['PretragaUkupnoObrazac'])){		
		?>
	
        <div class="korisnici">
		<form name="pretraga" id="pretraga" method="GET" action="pretrazivanjeprekrsaja.php" enctype="multipart/form-data" onsubmit="return ProvjeriUnose(this.id)" >
			
			<table class="u-full-width">							
				<tr>
				
					<td>
					<label for="DatumOd"><strong>Datum od:<strong></label>
					</td>
					<td id="lijevo" class="tablicared">
					<input type="text" name="DatumOd" id="DatumOd" placeholder="Početni datum"/>
					</td>
				</tr>
				<tr>
					<td>
					<label for="DatumDo"><strong>Datum do:<strong></label>
					</td>
					<td id="lijevo" class="tablicared">
					<input type="text" name="DatumDo"  id="DatumDo" placeholder="Završni datum"/>
					</td>
				</tr>				
				<tr>
					<td colspan="2"><input type="submit" name="PretragaUkupnoObrazac" id="PretragaUkupnoObrazac" value="Pretraži"/>
					</td>
				</tr>
				<tr>
					 <td colspan="2">
					<label for="popisgresaka" id="popisgresaka"></label>
					</td>
				</tr>	
			</table>
		</form>		
	 </div>
	<?php
		
		if(isset($_GET['PretragaUkupnoObrazac'])){
			echo "<div class=\"korisnici\">";
			$DatumOd = $_GET['DatumOd'];
			$DatumDo = $_GET['DatumDo'];
			
			$DatumOd = date("Y-m-d",strtotime($DatumOd));
			$DatumDo = date("Y-m-d",strtotime($DatumDo));
			
			$sql="SELECT COUNT(*) FROM prekrsaj pr WHERE pr.datum_prekrsaja BETWEEN '$DatumOd' and '$DatumDo'";

	$ispis = mysqli_query($bp,$sql);
	
	
	$red=mysqli_fetch_array($ispis);
	$broj_redaka=$red[0];
	$vel_str=5;
	$broj_stranica=ceil($broj_redaka/$vel_str);
	
	echo "Ukupno prekršaja: ".$broj_redaka;		
	
	echo "</div>";
	}
	
	}
	
	
		if(isset($_GET['prvih20']) || isset($_GET['PretragaObrazac20'])){
		
		?>
	
	<h2>Ukupno top 20 korisnika sa najviše prekršaja</h2>
	<div class="korisnici">
		<form method="GET" id="pretraga" action="pretrazivanjeprekrsaja.php" enctype="multipart/form-data" onsubmit="return ProvjeriUnose(this.id)">
			<table class="u-full-width">								
				<tr>
					<td  class="tablicared">
					<label for="DatumOd"><strong>Datum od:<strong></label>
					</td>
					<td id="lijevo" class="tablicared">
					<input type="text" name="DatumOd" id="DatumOd" placeholder="Početni datum"/>
					</td>
				</tr>
				<tr>
					<td  class="tablicared">
					<label for="DatumDo"><strong>Datum do:<strong></label>
					</td>
					<td id="lijevo" class="tablicared">
					<input type="text" name="DatumDo" id="DatumDo" placeholder="Završni datum"/>
					</td>
				</tr>				
				<tr>
					<td colspan="2"  class="tablicared">
					<input type="submit" name="PretragaObrazac20" id="PretragaObrazac20" value="Pretrazi"/>
					</td>
				</tr>
				<tr>
					 <td colspan="2">
					<label for="popisgresaka" id="popisgresaka"></label>
					</td>
				</tr>	
			</table>
		</form>		
	 </div>
	<?php
		
		if(isset($_GET['PretragaObrazac20'])){
			
			$DatumOd = $_GET['DatumOd'];
			$DatumDo = $_GET['DatumDo'];
			
			$DatumOd = date("Y-m-d",strtotime($DatumOd));
			$DatumDo = date("Y-m-d",strtotime($DatumDo));
			
			$sql="SELECT
			CONCAT(kor.ime,' ',kor.prezime) AS 'naziv_korisnik',
			COUNT(concat(kor.ime,' ',kor.prezime)) AS 'brojka' FROM prekrsaj pr
			INNER JOIN vozilo voz
			ON pr.vozilo_id = voz.vozilo_id INNER JOIN korisnik kor 
			ON voz.korisnik_id = kor.korisnik_id WHERE pr.datum_prekrsaja BETWEEN '$DatumOd' AND '$DatumDo'
			GROUP BY concat(kor.ime,' ',kor.prezime) 
			ORDER BY count(concat(kor.ime,' ',kor.prezime)) desc limit 20";

	
	$ispis = mysqli_query($bp,$sql);
			echo "<div class=\"korisnici\">";
			echo "<table class=\"u-full-width\">";
	echo "<thead><tr>
		<th>Korisnik </th>
		<th>Broj prekršaja</th>";
	echo "</tr></thead>";
	
	echo "<tbody>";
	while(list($korisnik,$brojka)=mysqli_fetch_array($ispis)){		
		echo "<tr>
			<td> $korisnik </td>
			<td> $brojka </td>";
		echo "</tr>";		
	}	
	echo "</tbody>";
	echo "</table>";
	echo "</div>";		
		}
		}
?>
		</div>
<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>