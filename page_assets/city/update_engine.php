<?php
require_once "../../engine/dbh.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city_id = $_POST['city_id'];
    $city_name = $_POST["city_name"];
    $county_id = $_POST["county_id"];
    $description = $_POST["description"];


    $statement = $pdo->prepare("UPDATE town SET
                                town_name=:name,
                                town_description=:town_desc,
                                town_county_id=:county_id 
                                WHERE town_id=:id");
    $statement->bindValue(":id", $city_id);
    $statement->bindValue(":name", $city_name);
    $statement->bindValue(":town_desc", $description);
    $statement->bindValue(":county_id", $county_id);
    $statement->execute();
    header("Location: ../../admin.php?page=town");
}
