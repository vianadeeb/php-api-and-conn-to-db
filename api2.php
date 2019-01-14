<?php

	$user = "vian";
	$pass = "123";

	try {
		$conn = new PDO('mysql:host=localhost;dbname=jsondb', $user, $pass);
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		// die();
	}



	$select = $conn->query("SELECT * FROM `student` ORDER BY id DESC"); // query

	
	while($row = $select->fetch()){

		$dataTOShow[] =  array( "name"=>$row["name"],"salary"=>$row["salary"],"age"=>$row["age"]);
	
	}



	

	$json =  json_encode($dataTOShow, JSON_UNESCAPED_UNICODE);
	echo $json;

	 $data = json_decode($json,true);


	echo '<h2>'.$data[0]["name"].'</h2>';

	 echo $data[0]["email"];


	 if(isset($_REQUEST["edit"])){

	 	$id = intval($_GET["edit"]);



	 	$select = $conn->prepare("SELECT * FROM users WHERE id=?");
	 	$select->execute(array($id));


	 	if ($select->rowCount()== 1){
	 		$update = $conn->query("UPDATE users SET phone=07712123,email='saasasd' WHERE id=$id ");

			if($update){
				echo json_encode(array("msg"=>"successful"));
	 		}


	 	}else{

	 		echo json_encode(array("msg"=>"user not found"));
	 	}

		



	 }




?>