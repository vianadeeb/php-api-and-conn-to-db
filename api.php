<?php

	$user = "vian";
	$pass = "123";

	try {
		$conn = new PDO('mysql:host=localhost;dbname=jsondb', $user, $pass);
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		// die();
	}



	$select = $conn->query("SELECT * FROM `student` ORDER BY id DESC LIMIT 1"); // query

	
	while($row = $select->fetch()){

		$dataTOShow[] =  array( "name"=>$row["name"],"salary"=>$row["salary"],"age"=>$row["age"]);
		
		
	}



	

	$json =  json_encode($dataTOShow, JSON_UNESCAPED_UNICODE);
	 $data = json_decode($json,true);
     //  print_r($data);

	 if(!isset($_REQUEST["add"]) && !isset($_REQUEST["edit"]) && !isset($_REQUEST["delete"])){
		echo $json;
	 }
	



	   if(isset($_REQUEST["edit"])){

	 	$id = intval($_GET["edit"]);



     	$select = $conn->prepare("SELECT * FROM student WHERE id=?");
	 	$select->execute(array($id));

		$name = "sdfsd";
		$salary = 120;
		$age = "sdfsdf";
 	    if ($select->rowCount() >= 1){
	 		$update = $conn->query("UPDATE student SET name='$name',salary='$salary',age='$age' WHERE id=$id ");

	 		if($update){
				echo json_encode(array("msg"=>"successful"));
	 		}


	 	}else{

	 		echo json_encode(array("msg"=>"user not found"));
	 	}

		



	}


	if (isset($_REQUEST["add"])) {
		
		$add = $conn->prepare("INSERT INTO `student`(`name`, `salary`, `age`) VALUES (?,?,?)");
		$add->execute(array("vian",600,23));

		if ($add) {
			echo json_encode(array("msg"=>"successful"));
		}
	}


	if(isset($_REQUEST["delete"])){

		$id = intval($_GET["delete"]);

		$delete = $conn->prepare("DELETE FROM student WHERE id=?");
		$delete->execute(array($id));

		if($delete){
			echo json_encode(array("msg"=>"deleted"));
		}
	}


	if(isset($_POST["name"])){
		echo $_POST["name"];
	}


?>