<?php


class MessageService
{


    private $errors = [];
    private $input_errors = [];
    private $infos = [];


    public function __construct()
    {
        if (key_exists('errors', $_SESSION)) $this->errors = $_SESSION['errors'];
        if (key_exists('input_errors', $_SESSION)) $this->input_errors = $_SESSION['input_errors'];
        if (key_exists('infos', $_SESSION)) $this->infos = $_SESSION['infos'];

        var_dump($_SESSION['infos']);

        unset($_SESSION['errors']);
        unset($_SESSION['input_errors']);
        unset($_SESSION['infos']);


    }

    public function CountErrors()
    {
        return count($this->errors);
    }

    public function CountInputErrors()
    {
        return count($this->input_errors);
    }

    public function CountInfos()
    {
        return count($this->infos);
    }

    public function CountNewErrors()
    {
        return count($_SESSION['errors']);
    }

    public function CountNewInputErrors()
    {
        if (isset($_SESSION['input_errors'])) return count($_SESSION('input_errors'));
        else return 0;
    }

    public function CountNewInfos()
    {
        return count($_SESSION('infos'));
    }

    /**
     * @return mixed
     */
    public function GetInputErrors()
    {
        return $this->input_errors;
    }

    public function AddMessage($type, $msg, $key = null)
    {
        global $logger;
        if ($key) $_SESSION[$type][$key] = $msg;
        else $_SESSION[$type][] = $msg;

        $logger->Log("storing in session: $type, $key, $msg");
        $logger->Log(var_export($_SESSION, true));

    }

    public function ShowErrors()
    {
        if ($this->CountErrors() > 0) {
            foreach ($this->errors as $error) {
                {
                    print '<div class="error">' . $error . '</div>';
                }
            }
        }
    }

    public function ShowInfos()
    {
        if ($this->CountInfos() > 0) {

            foreach ($this->infos as $info) {
                {
                    print '<div class="msgs">' . $info . '</div>';
                }
            }
        }
    }
}