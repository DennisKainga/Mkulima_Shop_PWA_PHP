<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $first_name = $_POST['sys_user_first_name'];
    $last_name = $_POST['sys_user_last_name'];
    $phone = $_POST["sys_user_mobile"];
    $town = $_POST["sys_user_town_id"];
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];
    $password_repeat = $_POST['password_repeat'];
    $to_admin = $_POST["to_admin"] ?? "to_index";
    $rank = $_POST["rank"] ?? "customer";

    if ($password != $password_repeat) {
        header("Location: ../register.php?mess=no_match");
        exit;
    }

    require_once "dbh.inc.php";

    if (empty($first_name) || empty($last_name) || empty($password) || empty($password_repeat) || empty($email)) {
        header("Location: ../register.php?mess=empty_inputs");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?mess=invalidemail");
        exit;
    }

    if ($password !== $password_repeat) {
        header("Location: ../register.php?mess=passwordsdonotmatch");
        exit;
    }

    function userexist($pdo, $email)
    {
        $statement = $pdo->prepare("SELECT * FROM login WHERE login_email = :email");
        $statement->bindValue(":email", $email);
        $statement->execute();
        $resultdata = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($resultdata) {
            return true;
        } else {
            return false;
        }
    }

    function authenticate($pdo, $email, $password, $rank)
    {
        $statement = $pdo->prepare("INSERT INTO login(login_email,login_password,login_rank)
        VALUES(:email,:passwd,:login_rank)");
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passwd', password_hash($password, PASSWORD_DEFAULT));
        $statement->bindValue(":login_rank", $rank);
        $statement->execute();
        return $pdo->lastInsertId();
    }

    function adduser($pdo, $first_name, $last_name, $phone, $town, $login_id)
    {

        $statement = $pdo->prepare("INSERT INTO sys_user
        
        (sys_user_first_name, sys_user_last_name, sys_user_mobile, sys_user_town_id, sys_user_login_id)
        
        VALUES
        
        (:fname,:lname,:phone,:town,:login_id)");

        $statement->bindValue(":fname", $first_name);
        $statement->bindValue(":lname", $last_name);
        $statement->bindValue(":phone", $phone);
        $statement->bindValue(":town", $town);
        $statement->bindValue(":login_id", $login_id);
        $statement->execute();
    }
    if (!userexist($pdo, $email)) {

        $user_login_id =  authenticate($pdo, $email, $password, $rank);

        adduser($pdo, $first_name, $last_name, $phone, $town, $user_login_id, $rank);

        if ($to_admin  == "to_admin") {
            header("Location: ../admin.php?page=user");
        }
        if ($to_admin == "to_index") {
            header("Location: ../index.php?mess=sucess");
        } else {
            header("Location: ../admin.php?page=user");
        }
    } else {
        header("Location: ../index.php?mess=userexists");
        exit;
    }
} else {
    header('Location: ../index.php?mess=error');
}
