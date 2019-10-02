<?php 
    function singUP ($name, $surname,$email,$gender,$birthDate,$password){
	$notice = "väga hea";
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn-> prepare("INSERT INTO vpusers (firstname, lastname, birthdate, gender, email, password) VALUES(?,?,?,?,?,?)");
	echo $conn -> error;
	// Tekitame parooli räsi (hash) ehk krüpteerime
	$options = ["cost" => 12, "salt" => substr(sha1(rand()), 0, 22) ];
	$pwdhash = password_hash ($password, PASSWORD_BCRYPT, $options);
	$stmt -> bind_param("sssiss", $name, $surname,  $birthDate , $gender, $email, $pwdhash);
	
	if ($stmt -> execute()){
		$notice = "Kasutaja salvestamine õnnestus!";
		
	}else{
		$notice = "Kasutaja salvestamine ebaõnnestus!" .$stmt = error;
	}
	$stmt->close();
	$conn->close(); 
	return $notice;
}