<?php
  $userName = "Raili Pettai";
  $fullTimeNow = date("d.m.Y H:i:s");
  $hourNow = date("H:i");
  $partOfDay = "hägune aeg";
  
  if($hourNow < 8){
	 $partOfDay = "hommik";
	  
  }
  if($hourNow >= 7:00 or $hourNow <= 8:30 ){
	 $partOfDay = "hommikune tipptund";
	  
  }
    }
  if($hourNow >= 16:30 or $hourNow <= 18:00 ){
	 $partOfDay = "õhtune tipptund";
	  
  }
    }
  if($hourNow == 23:59 ){
	 $partOfDay = "minuti pärast muutub kuupäev";
	  
  }
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title>
 <?php
   echo $userName;
  ?>
   programmeerib veebi</title>
   
</head>
<body>
   <?php
     echo "<h1>" . $userName. " veebiprogrammeerimine 2019</h1>";
   ?>
  <p><B>See veebileht on loodud õppetöö käigus ja ei sisalda mingisugust tõsiseltvõetavat sisu!</B></p>
  <h2>Teise taseme pealkiri</h2><P>
  Rida katkestatakse<BR> ei jäeta rida vahele<P>
  Rida katkestatakse <P> ja järgmine rida jääb vahele<P>
  rida enne joont<HR>
  <h3>Kolmanda taseme pealkiri</h3><P>
  read peale joont<P>
  <I>kursiivis</I><P>
  <h4>Nummerdamata loendid</h4><P> 
  <UL>
  <LI>loendi 1. objekt
  <LI>loendi 2. objekt
  </UL>
  <h5>Nummerdatud loetelu</h5>
  <OL>
  <LI>loendi 1. objekt
  <LI>loendi 2. objekt
  </OL>
  <h6>Hierarhilised loendid</h6>
  <UL>
  <LI>esimene tase
  <UL>
  <LI>teine tase
  <UL>
  <LI>kolmas tase
  </UL>
  </UL>
  <LI>esimese taseme teine objekt
  </UL>
  <h4>Nupp</h4>
  <button>Vajuta mind</button>
<?php
  echo "<p>See on minu esimene PHP!</p>";
  echo "<p>Lehe avamise hetkel oli ".$fullTimeNow .", ". $partOfDay.".</p>";

?>

  
</body>
</html>