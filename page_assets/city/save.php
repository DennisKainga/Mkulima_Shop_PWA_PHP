<?php
require_once "../../engine/dbh.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city_name = $_POST["city_name"];
    $description = $_POST["description"];
    $county_id = $_POST["county_id"];

    $statement = $pdo->prepare("INSERT INTO town(town_name,town_description,town_county_id) VALUES(:name,:desc,:county_id)");
    $statement->bindValue(":name", $city_name);
    $statement->bindValue(":desc", $description);
    $statement->bindValue(":county_id", $county_id);
    $statement->execute();
    header("Location: ../../admin.php?page=town");
}
