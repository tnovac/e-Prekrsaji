<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>
	
	<?php

    $sql="SELECT COUNT(vozilo_id) FROM vozilo";
	
		if($aktivni_korisnik_tip==2 || $aktivni_korisnik_tip==1){
		$sql.=" WHERE korisnik_id=".$aktivni_korisnik_id;
	}
	
	$ispis = mysqli_query($bp,$sql);
	$red=mysqli_fetch_array($ispis);
	$broj_redaka=$red[0];
	$vel_str=5;
	$broj_str=ceil($broj_redaka/$vel_str);
	
	$sql="SELECT * FROM vozilo";
	if($aktivni_korisnik_tip==2  || $aktivni_korisnik_tip==1){
		$sql.=" WHERE korisnik_id=".$aktivni_korisnik_id;
	}
	$sql.=" ORDER BY vozilo_id LIMIT ".$vel_str;
	if(isset($_GET['str'])){
		$sql=$sql." OFFSET ".(($_GET['str']-1)*$vel_str);
		$aktivna=$_GET['str'];
	}
	else $aktivna = 1;
	
    $ispis = mysqli_query($bp,$sql);
	echo "<div class=\"korisnici\">";

	echo "<table class=\"u-full-width\">";  
	echo "<th>Registarska oznaka</th>
		 <th>Marka vozila</th>
		 <th>Tip vozila</th>
		 <th>Opcije</th>";
	echo "</tr></thead>";		
	echo "<tbody>";
	while(list($voziloid,$korisnikid,$rega,$marka,$tip)=mysqli_fetch_array($ispis)){
		echo "<tr>	   
			 <td> $rega </td>
			 <td> $marka </td>
			 <td> $tip </td>";			
			if($aktivni_korisnik_tip!=-1){
				echo " <td> <a href='azurmotvozila.php?vozilo_id=$voziloid'>Ažuriraj</a> | <a href='azurmotvozila.php?brisi=$voziloid'>Obriši</a> | <a href='prekrsaji.php?vozilo_id=$voziloid'>Prekršaji</a> </td>";	
			}	
			else echo " <td></td>";
		echo "</tr>";
	}
	
	 echo "<tr>";
			echo " <td colspan='4' >Stranice: ";
			if ($aktivna != 1) { 
			$prethodna = $aktivna - 1;
			echo "<a href=\"motvozila.php?str=" .$prethodna . "\">&lt;</a>";	
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
			echo "' href=\"motvozila.php?str=" .$i . "\"> $glavnastr </a>";
			}
			if ($aktivna < $broj_str) {
			$sljedeca = $aktivna + 1;
			echo "<a href=\"motvozila.php?str=" .$sljedeca . "\">&gt;</a>";	
			}
			echo "</td>";
			echo "</tr>";
	echo "</tbody>";
	echo "</table>";
	echo "<br/>";
	
	echo "<p><a href='azurmotvozila.php?novi=1'>Novo vozilo</a></p>";

?>
		</div>
<?php
include("podnozje.php");
?>
