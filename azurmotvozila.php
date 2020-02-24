<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>
      <?php
	  
if(isset($_GET['brisi'])){
	
	$id = $_GET['brisi'];
	$sql = "delete from vozilo WHERE vozilo_id=".$id;
	$ispis = mysqli_query($bp,$sql);
	
	header("Location: motvozila.php");
}	  
	  
if(isset($_GET['vozilo_id']) || isset($_GET['novi'])) {
	
		if(isset($_GET['vozilo_id'])){
		$id = $_GET['vozilo_id'];

		$sql = "SELECT * FROM vozilo WHERE vozilo_id=".$id;
		
		$ispis = mysqli_query($bp,$sql);
		list($voziloid,$korisnikid,$registracija,$marka,$tip) = 
		mysqli_fetch_array($ispis);
		
		
		} 
		else {
		$voziloid=0;
		$registracija="";
		$marka="";
		$tip="";
	}

	?>

		<form method="post" id = "vozilo" action="azurmotvozila.php" enctype="multipart/form-data" onsubmit="return ProvjeriUnose(this.id)">
			<input type="hidden" name="novi" value="<?php echo $id?>"/>
			<table class="u-full-width">				
				<tr>
					 <td>
					<label for="registracija"><strong>Registracija:</strong></label>
					</td>
					 <td>
					<input type="text" name="registracija" id="registracija" placeholder="Registracija" value="<?php echo $registracija; ?>" onkeyup="PretvoriVelika()"/>
					</td>
				</tr>
				
				<tr>
					 <td>
					<label for="marka"><strong>Marka:</strong></label>
					</td>
					 <td>
					<input type="text" name="marka" id="marka" placeholder="Marka"  value="<?php echo $marka; ?>"/>
					</td>
				</tr>		
				<tr>
					 <td>
					<label for="tip"><strong>Tip:</strong></label>
					</td>
					 <td>
					<input type="text" name="tip" id="tip" placeholder="Tip" value="<?php echo $tip; ?>"/>
					</td>
				</tr>				
				<tr>
					 <td colspan="2">
					<input type="submit" name="VoziloObrazac" id="VoziloObrazac" value="Unesi"/>
					</td>
				</tr>
				<tr>
					 <td colspan="2">
					<label for="popisgresaka" id="popisgresaka"></label>
					</td>
				</tr>				
			</table>
		</form>		
<?php
}


if(isset($_POST['VoziloObrazac'])) {

		$registracija = $_POST['registracija'];		
		$marka = $_POST['marka'];
		$tip = $_POST['tip'];		
		$id = $_POST['novi'];
		
		if ($id == 0) {
		
			$sql = "INSERT INTO vozilo (korisnik_id, registracija, marka_vozila, tip_vozila) values ('$aktivni_korisnik_id', '$registracija', '$marka', '$tip')";
		} 
		else {
			$sql = "UPDATE vozilo SET registracija='$registracija',marka_vozila='$marka',tip_vozila='$tip' WHERE vozilo_id = '$id'";
		}
		$ispis = mysqli_query($bp,$sql);
		header("Location: motvozila.php");					
	}   


?>

<?php
include("podnozje.php");
?>

	
