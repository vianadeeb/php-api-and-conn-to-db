


<?php


    $pass = '$2y$10$y2mT1s7G.O5ZDwB9ki8jXuTErY7p9GTY4ItbEkQNqjiYGl/tBaQrW';


    if(password_verify("123",$pass)){
        echo json_encode(array("msg"=>"correct"));
    }else{

        echo "wrong";
    }
    if(isset($_POST["name"])){

        $name = $_POST["name"];

        $password =  password_hash($name,PASSWORD_DEFAULT);

    


    }else{
         echo "error";
    }
?>
<form method="post">


    <input type="text" name="name">

    <button name="submit">submit</button>

</form>