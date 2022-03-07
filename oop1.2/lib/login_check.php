<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "autoload.php";


if (LoginCheck()) {
    $container = new Container($configuration);
    $userLoader = $container->getUserLoader();
    $email = $_POST['usr_email'];
    $sql = "SELECT * FROM user WHERE usr_email='$email' ";
    $data = GetData($sql);
    $user = new User();
    foreach ($data as $row) {
        {
            $user->setUsrId($row['usr_id']);
            $user->setUsrEmail($row['usr_email']);
            $user->setUsrVoornaam($row['usr_voornaam']);
            $user->setUsrNaam($row['usr_naam']);
        }}
//    var_dump($user);
//    $user = $userLoader->createUserFromData($data);

//    die;
    $_SESSION['user'] = $user;

    $_SESSION['msgs'][] = "Welkom " . $_SESSION['user']->getUsrVoornaam();

    header("Location: ../steden.php");

} else {
    header("Location: ../no_access.php");
    unset($_SESSION['user']);
}

function LoginCheck()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //controle CSRF token
        if (!key_exists("csrf", $_POST)) die("Missing CSRF");
        if (!hash_equals($_POST['csrf'], $_SESSION['lastest_csrf'])) die("Problem with CSRF");

        $_SESSION['lastest_csrf'] = "";

        //sanitization
        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER'];

        //Validaties voor het loginformulier
        if (true) {
            if (!key_exists("usr_email", $_POST) or strlen($_POST['usr_email']) < 5) {
                $_SESSION['errors']['usr_email'] = "De login is niet correct ingevuld";
            }
            if (!key_exists("usr_password", $_POST) or strlen($_POST['usr_password']) < 8) {
                $_SESSION['errors']['usr_password'] = "Het wachtwoord is niet correct ingevuld";
            }
        }

        //terugkeren naar afzender als er een fout is
        if (key_exists("errors", $_SESSION) and count($_SESSION['errors']) > 0) {
            $_SESSION['OLD_POST'] = $_POST;
            header("Location: " . $sending_form_uri);
            exit();
        }

        //search user in database
        $email = $_POST['usr_email'];
        $ww = $_POST['usr_password'];

        $sql = "SELECT * FROM user WHERE usr_email='$email' ";
        $data = GetData($sql);

        if (count($data) > 0) {
            foreach ($data as $row) {
                if (password_verify($ww, $row['usr_password'])) return true;
            }
        }

        return false;
    }
}
