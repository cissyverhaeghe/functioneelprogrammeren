<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "autoload.php";

SaveFormData($dbm, $logger, $ms);

function SaveFormData($dbm, $logger, $ms)
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //controle CSRF token
        if (!key_exists("csrf", $_POST)) die("Missing CSRF");
        if (!hash_equals($_POST['csrf'], $_SESSION['lastest_csrf'])) die("Problem with CSRF");

        $_SESSION['lastest_csrf'] = "";

        //sanitization
        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        $table = $pkey = $update = $insert = $where = $str_keys_values = "";

        //get important metadata
        if (!key_exists("table", $_POST)) die("Missing table");
        if (!key_exists("pkey", $_POST)) die("Missing pkey");

        $table = $_POST['table'];
        $pkey = $_POST['pkey'];

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER'];
        CompareWithDatabase($table, $pkey, $dbm, $ms);

        //Validaties voor het registratieformulier
        if ($table == "user") {
            ValidateUsrPassword($_POST['usr_password'], $ms);
            ValidateUsrEmail($_POST['usr_email'], $ms);
            CheckUniqueUsrEmail($_POST['usr_email'], $dbm);
        }

        //terugkeren naar afzender als er een fout is
        if ($ms->CountNewErrors() > 0) {
            $_SESSION['OLD_POST'] = $_POST;
            header("Location: " . $sending_form_uri);
            exit();
        }

        //insert or update?
        if ($_POST["$pkey"] > 0) $update = true;
        else $insert = true;

        if ($update) $sql = "UPDATE $table SET ";
        if ($insert) $sql = "INSERT INTO $table SET ";

        //make key-value string part of SQL statement
        $keys_values = [];

        foreach ($_POST as $field => $value) {
            //skip non-data fields
            if (in_array($field, ['table', 'pkey', 'afterinsert', 'afterupdate', 'csrf'])) continue;

            //handle primary key field
            if ($field == $pkey) {
                if ($update) $where = " WHERE $pkey = $value ";
                continue;
            }

            if ($field == "usr_password") //encrypt usr_password
            {
                $value = password_hash($value, PASSWORD_BCRYPT);
                $keys_values[] = " $field = '$value' ";

                $ms->AddMessage("infos", "Bedankt voor uw registratie");
            } else //all other data-fields
            {
                $keys_values[] = " $field = '$value' ";
            }

        }

        $str_keys_values = implode(" , ", $keys_values);

        //extend SQL with key-values
        $sql .= $str_keys_values;

        //extend SQL with WHERE
        $sql .= $where;

        $logger->Log($sql);
        //run SQL
        $result = $dbm->ExecuteSQL($sql);

        //output if not redirected
        print $sql;
        print "<br>";
        print $result->rowCount() . " records affected";

        //redirect after insert or update
        if ($insert and $_POST["afterinsert"] > "") header("Location: ../" . $_POST["afterinsert"]);
        if ($update and $_POST["afterupdate"] > "") header("Location: ../" . $_POST["afterupdate"]);
    }
}
