<?php
//Sessiooni kasutamise algatamine
session_start();
var_dump($_SESSION);

function signUp($name, $surname, $email, $gender, $birthDate, $password){
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO vpusers (firstname, lastname, birthdate, gender, email, password) VALUES(?,?,?,?,?,?)");
	echo $conn->error;
	
	//tekitame parooli räsi (hash) ehk krüpteerime
	$options = ["cost" => 12, "salt" => substr(sha1(rand()), 0, 22)];
	$pwdhash = password_hash($password, PASSWORD_BCRYPT, $options);
	
	$stmt->bind_param("sssiss", $name, $surname, $birthDate, $gender, $email, $pwdhash);
	
	if($stmt->execute()){
		$notice = "Kasutaja salvestamine õnnestus!";
	} else {
		$notice = "Kasutaja salvestamisel tekkis tehniline tõrge: " .$stmt->error;
	}
	
	$stmt->close();
	$conn->close();
	return $notice;
}
  function signIn($email, $password){
	$notice = "";
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("SELECT password FROM vpusers WHERE email=?");
	echo $conn->error;
	$stmt->bind_param("s", $email);
	$stmt->bind_result($passwordFromDb);
	if($stmt->execute()){
		//kui päring õnnestus
	  if($stmt->fetch()){
		//kasutaja on olemas
		if(password_verify($password, $passwordFromDb)){
		  //kui salasõna klapib
		  $stmt->close();
		  $stmt = $conn->prepare("SELECT id, firstname, lastname FROM vpusers WHERE email=?");
		  echo $conn->error;
		  $stmt->bind_param("s", $email);
		  $stmt->bind_result($idFromDb, $firstnameFromDb, $lastnameFromDb);
		  $stmt->execute();
		  $stmt->fetch();
		  $notice = "Sisse logis " .$firstnameFromDb ." " .$lastnameFromDb ."!";
		  //Salvestame kasutaja kohta loetud info sessiooni
		  $_SESSION["txtColor"];
		  $_SESSION["bgColor"];
		  $_SESSION["userId"] = $idFromDb;
		  $_SESSION ["userFirstname"] = $firstnameFromDb;
		  $_SESSION ["userLastname"] = $lastnameFromDb;
		  
		  // Enne sisselogitutele mõeldud lehetedele jõudmist sulgeme AB ühenduse 
		  $stmt->close();
		  $conn->close();
		  // Liigume soovitud lehele 
		  header("Location: home.php");
		  //et siin miskit rohkem ei tehtaks 
		  exit();
		} else {
		  $notice = "Vale salasõna!";
		}//kas password_verify
	  } else {
		$notice = "Sellist kasutajat (" .$email .") ei leitud!";
		//kui sellise e-mailiga ei saanud vastet (fetch ei andnud midagi), siis pole sellist kasutajat
	  }//kas fetch õnnestus
	} else {
	  $notice = "Sisselogimisel tekkis tehniline viga!" .$stmt->error;
	  //veateade, kui execute ei õnnestunud
	}//kas execute õnnestus
	
	$stmt->close();
	$conn->close();
	return $notice;
  }//sisselogimine lõppeb