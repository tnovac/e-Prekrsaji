<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>
      <?php
	  

if(isset($_GET['kategorija_id']) || isset($_GET['nova'])) {
	
		if(isset($_GET['kategorija_id'])){
		$id = $_GET['kategorija_id'];

		$sql = "SELECT * FROM kategorija WHERE kategorija_id=$id";
		
		$ispis = mysqli_query($bp,$sql);;
		list($kategid,$moderatorid,$naziv,$opis) = mysqli_fetch_array($ispis);		
	} else {
		$id=0;
		$moderatorid="";
		$naziv="";
		$opis="";
	}

	?>

  <div class="korisnici">
		<form method="post" action="azurkategorija.php" id="kategorija" enctype="multipart/form-data" onsubmit="return ProvjeriUnose(this.id)">
			<input type="hidden" name="novi" value="<?php echo $id?>"/>
			<table class="u-full-width">				
				<tr>
					 <td>
					<label for="moderator"><mark>Moderator:</mark></label>
					</td>
					<td id="lijevo">
					<select name="moderator" id="moderator">
					<?php
					$sql = "SELECT korisnik_id, concat(ime,' ',prezime) FROM korisnik WHERE tip_id = 1";
					$ispis = mysqli_query($bp,$sql);;
					while(list($idmod,$nazivmod)=mysqli_fetch_array($ispis)){
						echo "<option value='$idmod'";
						if($idmod==$moderatorid){
							echo " selected";
						}
						echo ">$nazivmod</option>";
					}
					?>
					
					</select>
					</td>
				</tr>		
				<tr>
					 <td>
					<label for="naziv"><mark>Naziv:</mark></label>
					</td>
					<td id="lijevo">
					<input type="text" name="naziv" id="naziv" placeholder="Naziv" value="<?php echo $naziv; ?>"/>
					</td>
				</tr>
				<tr>
					 <td>
					<label for="opis"><mark>Opis:</mark></label>
					</td>
					<td id="lijevo">
					<textarea name="opis" id="opis" placeholder="Opis"><?php echo $opis?></textarea>
					</td>
				</tr>				
				<tr>
					 <td colspan="2">
					<input type="submit" name="KategorijaObrazac" id="KategorijaObrazac" value="Unesi"/>
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
if(isset($_POST['KategorijaObrazac'])) {

		$id = $_POST['novi'];
		$moderator = $_POST['moderator'];
		$naziv = $_POST['naziv'];	
		$opis = $_POST['opis'];
		
		if ($id == 0) {		
			$sql = "INSERT INTO kategorija (moderator_id, naziv, opis) values ('$moderator', '$naziv', '$opis')";
		} else {
			$sql = "UPDATE kategorija SET moderator_id='$moderator',naziv='$naziv',opis='$opis'WHERE kategorija_id = '$id'";
		}
		$ispis = mysqli_query($bp,$sql);;
		header("Location: kategorije.php");					
	}   
?>
</div>
<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>


	
