<?php
	include("zaglavlje.php");
	
	$bp=spojiSeNaBazu();
?>
<?php
	if(isset($_GET['logout'])){
		unset($_SESSION["aktivni_korisnik"]);
		unset($_SESSION['aktivni_korisnik_ime']);
		unset($_SESSION["aktivni_korisnik_tip"]);
		unset($_SESSION["aktivni_korisnik_id"]);
		session_destroy();
		header("Location:index.php");
	}

	$greska="";
	if(isset($_POST['submit'])){
		$kor_ime=mysqli_real_escape_string($bp,$_POST['korisnicko_ime']);
		$lozinka=mysqli_real_escape_string($bp,$_POST['lozinka']);
		if(!empty($kor_ime)&&!empty($lozinka)){
			$sql="SELECT korisnik_id,tip_id,ime,prezime FROM korisnik WHERE korisnicko_ime='$kor_ime' AND lozinka='$lozinka'";
			$rs=izvrsiUpit($bp,$sql);
			
			if(mysqli_num_rows($rs)==0)$greska="Ne postoji korisnik s navedenim korisničkim imenom i lozinkom";
			else{
				list($id,$tip,$ime,$prezime)=mysqli_fetch_array($rs);
				$_SESSION['aktivni_korisnik']=$kor_ime;
				$_SESSION['aktivni_korisnik_ime']=$ime." ".$prezime;
				$_SESSION["aktivni_korisnik_id"]=$id;
				$_SESSION['aktivni_korisnik_tip']=$tip;
				header("Location:index.php");
			}
		}
		else $greska = "Molim unesite korisničko ime i lozinku";
	}
	
?>


<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>

