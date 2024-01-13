<?php
	include "../database.php";
	include "../response.php";
	include "../dream.php";

    $database = new Database();

    $username = $_GET["username"];

    $statement = "SELECT id FROM user WHERE username = '$username'";
    $preparedStatement = $database->query($statement);

    $result = $preparedStatement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $id = $result["id"];
        $statement = "SELECT title, content, is_lucid, date FROM dream WHERE user_id = '$id'";
        $preparedStatement = $database->query($statement);

        $preparedStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Dream", array("title", "content", "is_lucid", "date"));
        $dreams = new Dreams();
        while ($row = $preparedStatement->fetch()) {
        $dreams->add($row);
        }

        $response = new Response($dreams);
        $response->send();
    } else {
        echo '{"error": "invalid user id"}';
    }

?>