<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>

<?php
echo '
<div class="korisnici">
<table class="u-full-width">
<thead>
	<tr>
		<th>ID</th>
		<th>Naziv kategorije</th>
		<th>Opis</th>
		<th>Radnja</th>
	</tr>
</thead>
<tbody>
';

$sql= "SELECT kategorija_id, naziv, opis FROM kategorija";
if($aktivni_korisnik_tip==1 && isset($_GET["moderator"])){
	$sql.=" where moderator_id=".$aktivni_korisnik_id;
}
$ispis= mysqli_query($bp , $sql);
$ukupno = mysqli_num_rows($ispis);
$stranica=ceil($ukupno/$vel_str);

$sql.=" limit ".$vel_str;
if(isset($_GET["stranica"])){
	
	$sql.=" offset ".($_GET["stranica"]-1)*$vel_str;
}
$ispis= mysqli_query($bp , $sql);

while ($red= mysqli_fetch_array($ispis)) {
	$katid=$red['kategorija_id'];
	$katnaziv=$red['naziv'];
	$pregled = "<a href='kategorije.php?pregled=$katid&naziv=$katnaziv'>Pregled godine</a>";
	if($aktivni_korisnik_tip==1 && isset($_GET["moderator"])){
	$pregled .=" - <a href='moderatorKatPrekrsaji.php?kategorijaprek_id=$katid&prekrsaji=1'>Prekšaji </a>";
	}
	if($aktivni_korisnik_tip==0){
       $pregled .=" - <a href='azurkategorija.php?kategorija_id=$katid'>Uredi</a>";
		} 
	echo '<tr>
			<td>'. $red['kategorija_id'].'</td>
			<td>'. $red['naziv'].'</td>
			<td>'. $red['opis'].'</td>
			<td>'.$pregled.'</td>
			
		</tr>';
	
}
echo '<tr><td colspan="4">Stranica: ';
for($str=1;$str<=$stranica;$str++){
	echo ' <a href="kategorije.php?stranica='.$str.'">'.$str.'</a>';
}
echo '</td>';
echo '</tr>';
echo '</tbody>';


?>
<?php
echo'					
</table>';

	if($aktivni_korisnik_tip==0){
		echo "<p><a href='azurkategorija.php?nova'>Dodaj novu kategoriju</p>";
	}
	

echo'</div>
';



if(isset($_GET["pregled"])){
$sql="SELECT year(pr.datum_prekrsaja) AS 'godina', COUNT(year(pr.datum_prekrsaja)) as 'brojprekrsaja' FROM prekrsaj pr WHERE pr.kategorija_id = ".$_GET["pregled"]." GROUP BY  year(pr.datum_prekrsaja)";

echo '<div class="korisnici">
<table class="u-full-width">
<thead>
	<tr>
		<th>Kategorija</th>
		<th>Godina</th>
		<th>Broj prekršaja</th>
	</tr>
</thead><tbody>';					
					$rezultat = mysqli_query($bp, $sql);
					
					while ($red = mysqli_fetch_array($rezultat)){
						
						echo '<tr>
								<td>'.$_GET['naziv'].'</td>
								<td>'.$red['godina'].'</td>
								<td>'.$red['brojprekrsaja'].'</td>
							  </tr>';
					}
					
echo'</tbody>					
</table>
</div>
';

					
}
?>

<?php
zatvoriVezuNaBazu($bp);
	include('podnozje.php');
?>	