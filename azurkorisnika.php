<?php
	include('zaglavlje.php');
	$bp=spojiSeNaBazu();
?>
      <?php
	
	
	if(isset($_POST['KorisnikObrazac'])) {
		if (isset($_POST['tip'])) {
			$tip = $_POST['tip'];
		} else  {
			$tip = 2;
		}	
		
		$poruka = "";
		$kor_ime = $_POST['kor_ime'];
				
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$lozinka = $_POST['lozinka'];

		$email = $_POST['email'];
		
		
		$postojeca = $_POST['slikahidden'];
		
		$mjesto = "korisnici/";	

		$ime_dat = basename($_FILES['slika']['name']);
		
		if($ime_dat != ""){
		$slika = $mjesto.$ime_dat;	
		$stavi = move_uploaded_file($_FILES['slika']['tmp_name'],$slika);
		}
		else
		{
			if($postojeca != ""){
				$slika = $postojeća;
			}
			else
			{
				$slika = "korisnici/nophoto.jpg";
			}
			
		}
		
		$id = $_POST['novi'];
		
		if ($id == 0) {
		
			$sql = "INSERT INTO korisnik 
			(tip_id, korisnicko_ime, lozinka, ime, prezime, email, slika)
			VALUES
			($tip, '$kor_ime', '$lozinka', '$ime', '$prezime', '$email', '$slika');
			";
		} else {
			$sql = "UPDATE korisnik SET 				 
				ime='$ime',
				prezime='$prezime',
				lozinka='$lozinka',
				email = '$email',
				tip_id = '$tip',
				slika = '$slika'
				WHERE korisnik_id = '$id'
			";
		}

		$ispis = mysqli_query($bp, $sql);
		header("Location: korisnici.php");		
	}
	
	if(isset($_GET['korisnik'])) {
		$id = $_GET['korisnik'];
		if ($aktivni_korisnik_tip==2) {
			$id = $_SESSION["aktivni_korisnik_id"]; 
		}
		$sql = "SELECT * FROM korisnik WHERE korisnik_id='$id'";
		
		$ispis = mysqli_query($bp,$sql);
		list($id, $tip, $kor_ime,$lozinka,$ime,$prezime,$email, $slika) = 
		mysqli_fetch_array($ispis);
		
		
	} else {
		$kor_ime = "";
		$ime = "";
		$tip = 2;
		$prezime = "";
		$lozinka = "";
		$email = "";
		$slika = "";
	}
	?>
<div class="korisnici">
		<form method="post" action="azurkorisnika.php" id="korisnikadmin" enctype="multipart/form-data"  onsubmit="return ProvjeriUnose(this.id)">
			<div>
			<input type="hidden" name="novi" id="novi" value="<?php echo $id?>"/>
			<input type="hidden" name="slikahidden" id="slikahidden" value="<?php echo $slika?>"/>
			
			<table class="u-full-width">
				<tr>
					 <td><label id="lblkor_ime" for="kor_ime">Korisničko ime:</label></td>
					 <td><input type="text" name="kor_ime" id="kor_ime" placeholder="Korisničko ime" 
						<?php 
							if (isset($id)) {
								echo "readonly='readonly'";
							}	?>
						
						value="<?php echo $kor_ime; ?>"/></td>
				</tr>
				
				<tr>
					 <td><label id="lblime" for="ime">Ime:</label></td>
					 <td><input type="text" name="ime" id="ime" placeholder="Ime"  value="<?php echo $ime?>"/></td>
				</tr>
				
				<tr>
					 <td><label id="lblprezime" for="prezime">Prezime:</label></td>
					 <td><input type="text" name="prezime" id="prezime" placeholder="Prezime" value="<?php echo $prezime?>"/></td>
				</tr>
				
				<tr>
					 <td><label id="lbllozinka" for="lozinka" >Lozinka:</label></td>
					 <td><input type="text" name="lozinka" id="lozinka" placeholder="Lozinka" value="<?php echo $lozinka?>"/></td>
				</tr>
				<tr>
					 <td>
					<label for="tipkorisnik"><mark>Tip korisnika:</mark></label>
					</td>
					 <td>
					<select name="tip" id="tip">
					<?php
					$sql = "SELECT tip_id, naziv FROM tip_korisnika";
					$ispis = mysqli_query($bp,$sql);;
					while(list($idtip,$nazivtip)=mysqli_fetch_array($ispis)){
						echo "<option value='$idtip'";
						if($idtip==$tip){
							echo " selected";
						}
						echo ">$nazivtip</option>";
					}
					?>
					
					</select>
					</td>
				</tr>	
				<tr>
					 <td><label id="lblemail" for="email">email:</label></td>
					 <td><input type="text" name="email" id="email" placeholder="E-mail" value="<?php echo $email?>"/></td>
				</tr>
				
				<tr>
					 <td><label for="slika">Slika:</label></td>
					 <td><input type="file" name="slika" id="slika" /></td>
				</tr>
				<tr>
					 <td colspan="2"><input type="submit" name="KorisnikObrazac" value="Pošalji"/></td>
				</tr>
				<tr>
					 <td colspan="2">
					<label for="popisgresaka" id="popisgresaka"></label>
					</td>
				</tr>
			</table>
			</div>
		</form>		
<?php

?>
		</div>
<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>