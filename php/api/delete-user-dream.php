<?php
    include "../database.php";

    $database = new Database();

    if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $statement = "DELETE FROM dream WHERE id = '$id'"; 
            $preparedStatement = $database->query($statement);

            if (deleted($preparedStatement)) {
                echo '{"message": "dream ' . $id . ' was deleted successfully"}';
            } else {
                echo '{"error": "Could not delete non-existent dream"}';
            }

        }
    }

    $database->close();

    function deleted($preparedStatement) {
        return $preparedStatement->rowCount() >= 1;
    }
?>