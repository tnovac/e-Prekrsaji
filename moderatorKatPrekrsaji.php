<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>
	<?php

	if(isset($_GET['kategorija_id'])){
		
	$idkat = $_GET['kategorija_id'];
		
	$sql="SELECT year(prekrsaj.datum_prekrsaja) AS 'godina', COUNT(year(prekrsaj.datum_prekrsaja)) as 'brojprekrsaja' FROM prekrsaj WHERE prekrsaj.kategorija_id = ".$idkat." GROUP BY  year(prekrsaj.datum_prekrsaja)";
			
			
	$ispis = mysqli_query($bp,$sql);
	
				echo "<div class=\"korisnici\">";

			echo "<table class=\"u-full-width\">";
	echo "<thead><tr>
		<th>Godina</th>
		<th>Broj prekršaja</th>";
	echo "</tr></thead>";
	
	echo "<tbody>";

	while(list($godina,$prekrs)=mysqli_fetch_array($ispis)){

		echo "<tr>
			<td> $godina </td>
			<td > $prekrs</td>";
			
		} 	
		
	echo "</tbody>";	
	echo "</table>";	
	}

	if(isset($_GET['prekrsaji']) && isset($_GET['kategorijaprek_id'])){
		
		$idkat=$_GET['kategorijaprek_id'];
	$sql="SELECT COUNT(*) FROM prekrsaj,vozilo, kategorija WHERE prekrsaj.vozilo_id = vozilo.vozilo_id AND kategorija.kategorija_id = prekrsaj.kategorija_id";
	if($aktivni_korisnik_tip == 1 && isset($_GET['prekrsaji'])){
		$sql.=" AND kategorija.kategorija_id=".$idkat;
	}
	$ispis = mysqli_query($bp,$sql);
	$red=mysqli_fetch_array($ispis);
	$broj_redaka=$red[0];
	$vel_str=5;
	$broj_str=ceil($broj_redaka/$vel_str);
	
	$sql="SELECT prekrsaj.prekrsaj_id, kategorija.naziv, vozilo.marka_vozila, prekrsaj.naziv,	prekrsaj.opis,prekrsaj.`status`,prekrsaj.novcana_kazna,prekrsaj.datum_prekrsaja,prekrsaj.vrijeme_prekrsaja,prekrsaj.datum_placanja,prekrsaj.vrijeme_placanja,prekrsaj.slika,
	prekrsaj.video
	FROM prekrsaj,vozilo, kategorija WHERE prekrsaj.vozilo_id = vozilo.vozilo_id AND kategorija.kategorija_id = prekrsaj.kategorija_id";
	if($aktivni_korisnik_tip == 1  && isset($_GET['prekrsaji'])){
		$sql.=" AND kategorija.kategorija_id=".$idkat;
	}

	$sql.=" ORDER BY prekrsaj.prekrsaj_id LIMIT ".$vel_str;
	if(isset($_GET['str'])){
		$sql=$sql." OFFSET ".(($_GET['str']-1)*$vel_str);
		$aktivna=$_GET['str'];
	}
	else $aktivna = 1;
	
	$ispis = mysqli_query($bp,$sql);
	echo "<div class=\"korisnici\">";
	echo "<table class=\"u-full-width\">";
	echo "<thead><tr>
	 <th>Kategorija</th>
	 <th>Vozilo</th> 
	 <th>Naziv</th> 
	 <th>Status</th> 
	 <th>Iznos kazne</th> 
	 <th>Datum i vrijeme prekršaja</th> 
	 <th>Datum i vrijeme plaćanja</th> 
	 <th>Slika</th> 
	 <th>Video </th> 
	 <th>Radnja</th>";
	echo "</tr></thead>";
	
	echo "<tbody>";
	while(list($id,$kategorijanaz,$vozilonaz,$preknaz,$opis,$status,$novkazna,$datum_prekrsaja,$vrijeme_prekrsaja,
	$datum_placanja, $vrijeme_placanja,$slika,$video)=mysqli_fetch_array($ispis)){
		$datum_prekrsaja=date("d.m.Y",strtotime($datum_prekrsaja));
		$datum_placanja=date("d.m.Y",strtotime($datum_placanja));
		echo "<tr> <td> $kategorijanaz </td> <td> $vozilonaz </td> <td> $preknaz</td> <td> $status</td> <td> $novkazna </td> <td>$datum_prekrsaja $vrijeme_prekrsaja</td> <td>$datum_placanja $vrijeme_placanja</td>
		 <td><figure><img src='$slika' width='70' height='100'/> </figure> </td>";
			echo " <td>";
			if($video != ""){
				echo "<video width='240' height='130' controls>";
				echo "<source src='$video' type='video/mp4'>";
				echo "<source src='$video' type='video/webm'>";
				echo "</video>";
				}
			echo "</td>";			
			if(($aktivni_korisnik_tip == 2 || $aktivni_korisnik_tip == 0) && $status=="N"){
			$radnja="<a href='placanjeprekrsaja.php?prekrsaj_id=$id&iznos=$novkazna'>PLAĆANJE</a>";
			}
			else
			{
				$radnja="";
			}
			
			if($aktivni_korisnik_tip==1	|| $aktivni_korisnik_tip==0){
				$radnja="<a href='azurprekrsaji.php?azuriraj=$id'>Uredi</a>";
			}
			echo " <td>$radnja</td>";
		echo "</tr>";		
	}	
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
	}
?>

	
		</div>
<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>