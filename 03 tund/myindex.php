<?php
  $userName = "Raili Pettai";
  $photoDir = "../photos/";
  $fullTimeNow = date("d.m.Y H:i:s");
  $hourNow = date("H");
  //$partOfDay = "hägune aeg";
  
  
	  



// suurem kui 7 ja vaiksem kui 8
  if($hourNow >= 7 and $hourNow <= 8 ){
	 $partOfDay = "hommikune tipptund";
	  
  }
  if($hourNow >= 12 and $hourNow <= 16 ){
	 $partOfDay = "kool";
	  
  }
// suurem kui 16 ja vaiksem kui 18
  if($hourNow >= 16 and $hourNow <= 18 ){
	 $partOfDay = "õhtune tipptund";
	  
  }
    if($hourNow >= 18 and $hourNow <= 23 ){
	 $partOfDay = "vaba aeg";
	  
  }
  if($hourNow == 23 ){
  $partOfDay = "tunni aja pärast muutub kuupäev";
  }
	  
  if( $hourNow <= 7 ){
	 $partOfDay = "hommikune tipptund";
	  
  } require("header.php")
  //info semestri kulgemise kohta
  $semesterStart= new DateTime("2019-9-2");
  $semesterEnd = new DateTime ("2019-12-13");
  $semesterDuration = $semesterStart -> diff($semesterEnd);
  //echo $semesterStart; // objekti sedasi näidata ei saa
  //var_dump($semesterStart);
  //echo $semesterStart -> timezone;
  $today = new DateTime ("now");
  $fromSemesterStart = $semesterStart -> diff($today);
 // var_dump($fromSemesterStart);
  //echo $fromSemesterStart -> days;
  //echo ;
  //<p>Semester on täies hoos: <meter min="0" max="110" value= "15">17%</meter></p>
  
  $semesterInfoHTML = "<p>Info semestri kohta pole kättesaadav.</p>";
  if ($fromSemesterStart -> format("%r%a")> 0 and $fromSemesterStart -> format("%r%a") <= $semesterDuration -> format("%r%a")){
	 $semesterInfoHTML ="<p>Semester on täies hoos:" ;
  $semesterInfoHTML .= '<meter min="0" '; 
  $semesterInfoHTML .= 'max="'. $semesterDuration -> format ("%r%a") .'" ';
  $semesterInfoHTML .= ' value="' .$fromSemesterStart -> format("%r%a") .'" >';
  $semesterInfoHTML .= round($fromSemesterStart -> format("%r%a") / $semesterDuration -> format("%r%a") * 100 , 1). "%";
  $semesterInfoHTML .= "</meter></p>";
  }
  
  //juhusliku foto kasutamine
 
  $photoList = ["tlu_astra_600x400_1.jpg", "tlu_terra_600x400_1.jpg", "tlu_terra_600x400_2.jpg", "tlu_terra_600x400_3.jpg" ];//array ehk massiiv
  
  $allFiles = array_slice(scandir($photoDir),2);
  
  //var_dump($allFiles);
  // Hakkan kontrollima kas on pildid
  $photoTypsAllowed = ["image/jpge", "image/png"];
  //var_dump ($photoList);
  // kontrollin, kas on pildil
  foreach ($allFiles as $file) {
	  $fileInfo = getimagesize($photoDir .$file);
	  //var_dump($fileInfo);
	  if (in_array($fileInfo["mime"], $photoTypeAllowed) == true){
		  array_push($photoList, $file); 
	  }
  }
  
  //echo $photoList[2];
  $photoCount = count($photoList);
  $randomImgHTML = ""; 
  if ($photoCount > 0){$photoNum = mt_rand(0,$photoCount - 1);
  $randomImgHTML = '<img src"' . $photoDir . $photoList[$photoNum] . '" alt="juhuslik foto">';
  }else {
	  $randomImgHTML = "<p> Kahjuks pilte pole</p>";
  }
  
  $photoNum = mt_rand(0,$photoCount - 1);
  $randomImgHTML = '<img src"' . $photoDir . $photoList[$photoNum] . '" alt="juhuslik foto">';
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
	 echo $semesterInfoHTML;
	 echo $randomImgHTML;
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
  <hr>
  <img src="../photos/tlu_astra_600x400_1.jpg" alt="Juhuslik foto">
  

  
</body>
</html>