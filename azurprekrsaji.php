<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
	include("func.php");
?>
      <?php
if(isset($_GET['azuriraj']) || isset($_GET['novi'])) {
	
		if(isset($_GET['azuriraj'])){
		$id = $_GET['azuriraj'];

		$sql= "SELECT * FROM prekrsaj WHERE prekrsaj_id=$id";
		
		$ispis = mysqli_query($bp,$sql);
		list($prekid,$katid,$voziloid,$naziv,$opis,$status,$kazna,$datumpr,$vrijemepr,$datumpl,$vrijemepl,$slika,$video) = 
		mysqli_fetch_array($ispis);
		$datumpr = date("d.m.Y",strtotime($datumpr));		
	} else {
		$id=0; 
		$katid = "";
		$voziloid = "";
		$naziv = "";
		$opis = "";
		$status = "";
		$kazna = "";
		$datumpr = "";
		$vrijemepr = "";
		$datumpl = "";
		$vrijemepl = "";
		$slika = "";
		$video = "";
	}
	?>
	<div class="korisnici">
		<form method="POST" action="azurprekrsaji.php" id="prekrsaj" enctype="multipart/form-data" onsubmit="return ProvjeriUnose(this.id)">
			<input type="hidden" name="novi" value="<?php echo $id?>"/>
			<table  class="u-full-width">				
				<tr>
					 <td>
					<label for="kategorija"><mark>Kategorija:</mark></label>
					</td>
					 <td>
					<select name="kategorija" id="kategorija">
					<?php
					$sql= "SELECT * FROM kategorija";
					if($aktivni_korisnik_tip==1){
						$sql.=" WHERE moderator_id=".$aktivni_korisnik_id;
					}
					
					$ispis = mysqli_query($bp,$sql);
					while(list($idkat,$idmod,$nazivkat,$opiskat)=mysqli_fetch_array($ispis)){
						echo "<option value='$idkat'";
						if($idkat==$katid){
							echo " selected";
						}
						echo ">$nazivkat</option>";
					}
					?>					
					</select>
					</td>
				</tr>
				
				<tr>
					 <td>
					<label for="vozilo"><mark>Vozilo:<mark></label>
					</td>
					 <td>
					<select name="vozilo" id="vozilo">
					<?php
					$sql= "SELECT vozilo_id, registracija FROM vozilo order by registracija asc";
					$ispis = mysqli_query($bp,$sql);
					while(list($idvoz,$reg)=mysqli_fetch_array($ispis)){
						echo "<option value='$idvoz'";
						if($idvoz==$voziloid){
							echo " selected";
						}
						echo ">$reg</option>";
					}
					?>					
					</select>
					</td>
				</tr>		
				<tr>
					 <td>
					<label for="naziv"><mark>Naziv:</mark></label>
					</td>
					 <td>
					<input type="text" name="naziv" id="naziv" placeholder="Naziv" value="<?php echo $naziv; ?>"/>
					</td>
				</tr>
				<tr>
					 <td>
					<label for="opis"><mark>Opis:</mark></label>
					</td>
					 <td>
					<textarea name="opis" id="opis" placeholder="Opis"><?php echo $opis; ?></textarea>
					</td>
				</tr>
				<tr>
					 <td>
					<label for="kazna"><mark>Kazna:</mark></label>
					</td>
					 <td>
					<input type="text" name="kazna" id="kazna" placeholder="Iznos kazne" value="<?php echo $kazna; ?>"/>
					</td>
				</tr>
				<tr>
					 <td>
					<label for="datum"><mark>Datum:</mark></label>
					</td>
					 <td>
					<input type="text" name="datum" id="datum" placeholder="Datum" value="<?php echo $datumpr; ?>"/>
					</td>
				</tr>
				
				<tr>
					 <td>
					<label for="vrijeme"><mark>Vrijeme:</mark></label>
					</td>
					 <td>
					<input type="text" name="vrijeme" id="vrijeme" placeholder="Vrijeme" value="<?php echo $vrijemepr; ?>"/>
					</td>
				</tr>
				<tr>
					 <td>
					<label for="slika"><mark>Slika:</mark></label>
					</td>
					 <td>
					<input type="text" name="slika" id="slika" placeholder="Slika" value="<?php echo $slika; ?>"/>
					</td>
				</tr>
				<tr>
					 <td>
					<label for="video"><mark>Video:</mark></label>
					</td>
					 <td>
					<input type="text" name="video" id="video" value="<?php echo $video?>"/>
					</td>
				</tr>				
				<tr>
					 <td colspan="2">
					<input type="submit" name="PrekrsajiObrazac" id="PrekrsajiObrazac" value="Unesi"/>
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
}


if(isset($_POST['PrekrsajiObrazac'])) {
		$poruka="";
		$id = $_POST['novi'];
		$katid = $_POST['kategorija'];
		$voziloid = $_POST['vozilo'];
		
		$naziv = $_POST['naziv'];
		
		$opis = $_POST['opis'];

		$kazna = $_POST['kazna'];

		$datumpr = $_POST['datum'];
		
		$datumpr = date("Y-m-d",strtotime($datumpr));
		$vrijemepr = $_POST['vrijeme'];
		
		$slika = $_POST['slika'];		
				
		$video = $_POST['video'];
		
		if ($id == 0) {
		
		$sql= "INSERT INTO prekrsaj values ('','$katid', '$voziloid', '$naziv', '$opis','N','$kazna','$datumpr','$vrijemepr',
		null,null,'$slika','$video')";
		} else {
			$sql= "UPDATE prekrsaj SET 				 
				kategorija_id='$katid',
				vozilo_id='$voziloid',
				naziv='$naziv',
				opis='$opis',
				novcana_kazna='$kazna',
				datum_prekrsaja='$datumpr',
				vrijeme_prekrsaja='$vrijemepr',
				slika='$slika',
				video='$video'
				WHERE prekrsaj_id = '$id'
			";
		}
		$ispis = mysqli_query($bp,$sql);
		header("Location: prekrsaji.php");		
			
	} 
	
	
	


	
?>
		</div>
    </div>
<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>

	
