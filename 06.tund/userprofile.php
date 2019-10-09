<!DOCTYPE html>
<html lang="et">
  <head>
    <meta charset="utf-8">
	<title>Katselise veebi uue kasutaja loomine</title>
<?php
  require("../../../config_vp2019.php");
  require("functions_main.php");
  require("functions_user.php");
  $database = "if19_raili_pe_1";
   //Kontrollime, kas on sisseloginud
  if(!isset($_SESSION["userId"])){
	  header("Location: myindex.php");
	  exit();
	}  
	//Väljalogimine
	if(isset($_GET["logout"])){
	//sessioon kinni
	session_unset();
	session_destroy();
	header("Location: myindex.php");
	exit();
	
	}
	$userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
?>	
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <label>Minu kirjeldus</label><br>
	  <textarea rows="10" cols="80" name="description"><?php echo $mydescription; ?></textarea>
	  <br>
	  <label>Minu valitud taustavärv: </label><input name="bgcolor" type="color" value="<?php echo $mybgcolor; ?>"><br>
	  <label>Minu valitud tekstivärv: </label><input name="txtcolor" type="color" value="<?php echo $mytxtcolor; ?>"><br>
	  <input name="submitProfile" type="submit" value="Salvesta profiil">
	</form>
	
	<p>See veebileht on valminud õppetöö käigus ning ei sisalda mingisugust tõsiseltvõetavat sisu!</p>
 <hr>
  <p>Olete sisselogitud! Logi <a href="?logout=1" >välja</a></p>
</body>
</html>