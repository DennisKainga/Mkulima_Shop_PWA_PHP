<?php

function security_error($mess, $pdo)
{
    unset($pdo);
    header("Location: ../index.php?mess=$mess");
    exit;
}

function success_redirect($rank, $pdo)
{
    unset($pdo);
    header("Location: ../index.php");
    exit;
}

function verify_inputs($input_password, $username)
{
    //This will check to verify password no blank submissions on form return true if not empty
    if (empty($input_password) || empty($username)) {
        return false;
    } else {
        return true;
    }
}

//This function will return data if any row matches email or id number provided else returns false
function check_user($pdo, $email)
{
    $statement = $pdo->prepare("SELECT * FROM login WHERE login_email=:email");
    $statement->bindValue(":email", $email);
    $statement->execute();
    $resultdata = $statement->fetch(PDO::FETCH_ASSOC);
    if ($resultdata) {
        return $resultdata;
    } else {
        return false;
    }
}


//This verifies is password of selected user is correct
function verify_password($hashed, $input_password)
{
    if (password_verify($input_password, $hashed)) {
        return true;
    } else {
        return false;
    }
}

function get_userinfo($pdo, $uid)
{

    $statement = $pdo->prepare("SELECT * FROM sys_user WHERE sys_user_login_id=:id");
    $statement->bindValue(":id", $uid);
    $statement->execute();
    $userinfo = $statement->fetch(PDO::FETCH_ASSOC);
    if ($userinfo) {
        return $userinfo;
    } else {
        return false;
    }
}


function startUserSession($userdata, $input_password, $pdo)
{
    if (verify_password($userdata["login_password"], $input_password)) {
        $set_userinfo = get_userinfo($pdo, $userdata["login_id"]);
        session_start();
        $_SESSION["uid"] = $set_userinfo["sys_user_login_id"];
        $_SESSION["name"] = $set_userinfo["sys_user_first_name"] . ' ' . $set_userinfo["sys_user_first_name"];
        $_SESSION["phone"] = $set_userinfo["sys_user_mobile"];
        $_SESSION["rank"] = $userdata["login_rank"];
        return $userdata["login_rank"];
    } else {
        return False;
    }
}

//DRIVER CODE

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $input_password = $_POST['password'];
    require_once "../engine/dbh.inc.php";
    if (verify_inputs($input_password, $username)) {
        $UserResult = check_user($pdo, $username);
        if ($UserResult) {
            $UserRank = startUserSession($UserResult, $input_password, $pdo);
            if ($UserRank) {
                if ($UserRank == "customer") {
                    success_redirect('index', $pdo);
                } else if ($UserRank == "admin") {
                    success_redirect('admin', $pdo);
                } else if ($UserRank == "farmer") {
                    success_redirect('farmer', $pdo);
                } else {
                    security_error('contactus', $pdo);
                }
            } else {
                security_error('wrongpwd', $pdo);
            }
        } else {
            security_error('nouser', $pdo);
        }
    } else {
        security_error('emptyinputs', $pdo);
    }
}
