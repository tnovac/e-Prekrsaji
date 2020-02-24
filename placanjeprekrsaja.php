<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>
	
	<?php

	if(isset($_GET['prekrsaj_id'])){
		$prekrsaj_id=$_GET['prekrsaj_id'];
		$vozilo_id=$_GET['vozilo_id'];
		$iznos=$_GET['iznos'];		
		$datum = date("d.m.Y");
		$vrijeme = date("H:i:s");
		?>
		
		 <div class="korisnici">
		<form method="post" id="placanje" action="placanjeprekrsaja.php" enctype="multipart/form-data" onsubmit="return ProvjeriUnose(this.id)">
			<input type="hidden" name="novi" value="<?php echo $prekrsaj_id; ?>"/>
			<input type="hidden" name="vozid" value="<?php echo $vozilo_id; ?>"/>
			<table class="u-full-width">				
				<tr>
					 <td>
					<label for="datum"><mark>Datum:</mark></label>
					</td>
					 <td>
					<input type="text" name="datum" id="datum" value="<?php echo $datum;?>"/>
					</td>
				</tr>
				
				<tr>
					 <td>
					<label for="vrijeme"><mark>Vrijeme:</mark></label>
					</td>
					 <td>
					<input type="text" name="vrijeme" id="vrijeme" value="<?php echo $vrijeme; ?>"/>
					</td>
				</tr>		
				<tr>
					 <td>
					<label for="iznos"><mark>Iznos:<mark></label>
					</td>
					 <td>
					<input type="text" name="iznos" id="iznos" readonly="readonly" value="<?php echo $iznos; ?>"/>
					</td>
				</tr>				
				<tr>
					 <td colspan="2" >
					<input type="submit" name="PrekrsajPlacanje" id="PrekrsajPlacanje" value="Plati"/>
					</td>
				</tr>
			</table>
		</form>		
		</div>
		<?php		
	}
	
	
	if(isset($_POST['PrekrsajPlacanje'])){
		$poruka="";
		$id=$_POST['novi'];
		$vozilo_id=$_POST['vozid'];
		$datum = $_POST['datum'];		
		
		$datum = date("Y-m-d",strtotime($datum));
		$vrijeme=$_POST['vrijeme'];		
				
		$sql = "UPDATE prekrsaj SET status = 'P', datum_placanja='$datum',vrijeme_placanja='$vrijeme' WHERE prekrsaj_id='$id'";
		$ispis = mysqli_query($bp,$sql);
		
		header("Location: prekrsaji.php?vozilo_id=$vozilo_id");
	}
?>
<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>