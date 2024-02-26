<?php
	include "../database.php";
	include "../response.php";

    if (checkParameters()) {
        $database = new Database();
        
        $username = $_POST["username"];

        $statement = "SELECT id, password FROM user WHERE username = '$username'";
        $preparedStatement = $database->query($statement);
        $result = $preparedStatement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $id = $result["id"];
            $password = $result["password"];

            if ($password === $_POST["password"]) {
                $title = $_POST["title"];
                $content = $_POST["content"];
                $is_lucid = isset($_POST["is_lucid"]) ? 'TRUE' : 'FALSE';

                $content = escapeCharacters($content);

                $statement = "INSERT INTO dream (title, content, is_lucid, user_id) VALUES ('$title', '$content', $is_lucid, $id)";
                $preparedStatement = $database->query($statement);
                echo '{"OK": "The dream has been submitted"}';
            } else {
                echo '{"error": "Invalid password"}';
            }
        } else {
            echo '{"error": "Invalid/missing parameters"}';
        }


    } else {
        echo '{"error": "Invalid/missing parameters"}';
    }

    $database->close();

    function checkParameters() {
        return isset($_POST["username"]) && 
               isset($_POST["password"]) && 
               isset($_POST["title"]) && 
               isset($_POST["content"]);
    }

    function escapeCharacters($content) {
        $content = addslashes($content);
        $content = str_replace("\\", "\\\\", $content); # yes
        $content = str_replace(PHP_EOL, "\\\\n", $content); # I have gone
        $content = str_replace("\\\'", "\\'", $content); # out of my mind
        return $content;
    }
?>