<?php
	include "../database.php";
	include "../response.php";
	include "../dream.php";

    $database = new Database();

    $username = $_GET["username"];

    $statement = "SELECT id FROM user WHERE username = '$username'";
    $result = $database->query($statement, false);
    $id = $result["id"];

    $statement = "SELECT a.id, a.title, a.content, a.is_lucid, a.date FROM dream as A INNER JOIN user as B ON (A.user_id = B.id) WHERE b.id = " . $id;

    $dreams = $database->query($statement, true); 

    $dreamsArray = new Dreams();
    foreach ($dreams as $dream) {
        $test = new Dream($dream["id"], $dream["title"], $dream["content"], $dream["is_lucid"], $dream["date"]); 
        $dreamsArray->add($test);
    }

    $response = new Response($dreamsArray);
    $response->send();
?>