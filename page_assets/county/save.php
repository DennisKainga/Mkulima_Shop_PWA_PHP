<?php
require_once "../../engine/dbh.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $county_name = $_POST["county_name"];
    $statement = $pdo->prepare("INSERT INTO county (county_name) VALUES(:name)");
    $statement->bindValue(":name", $county_name);
    $statement->execute();
    header("Location: ../../admin.php?page=county");
}
