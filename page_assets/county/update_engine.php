<!-- Modal -->
<?php
require_once "../../engine/dbh.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $county_id = $_POST["county_id"];
    $county_name = $_POST["county_name"];
    $statement = $pdo->prepare("UPDATE county SET county_name=:name WHERE county_id=:id");
    $statement->bindValue(":id", $county_id);
    $statement->bindValue(":name", $county_name);
    $statement->execute();
    header("Location: ../../admin.php?page=county");
}

?>