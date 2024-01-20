<?php
    include "../database.php";

    $database = new Database();

    if ($_SERVER["REQUEST_METHOD"] === "PUT") {
        if (checkParameters()) {
            $id = $_GET["id"];
            $title = $_GET["title"];
            $content = $_GET["content"];
            $is_lucid = isset($_GET["is_lucid"]) ? 'TRUE' : 'FALSE';

            $statement = "UPDATE dream SET title = '$title', content = '$content', is_lucid = $is_lucid WHERE id = '$id'"; 
            $preparedStatement = $database->query($statement);

            if (updated($preparedStatement)) {
                echo '{"message": "dream ' . $id . ' was edited successfully"}';
            } else {
                echo '{"error": "Could not edit dream"}';
            }

        } else { 
            echo '{"error": "Invalid/missing parameters"}';
        }
    }

    function checkParameters() {
        return isset($_GET["id"]) && 
               isset($_GET["title"]) && 
               isset($_GET["content"]) &&
               isset($_GET["is_lucid"]);
    }

    function updated($preparedStatement) {
        return $preparedStatement->rowCount() >= 1;
    }
?>