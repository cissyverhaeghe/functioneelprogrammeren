<?php

class Logger
{
    private $fp;
    private $logfile;

    /**
     * @param $fp
     * @param $logfile
     */
    public function __construct()
    {
        $this->setFp(fopen($_SERVER["DOCUMENT_ROOT"] . "/functioneelprogrammeren\oop1.7\log\log.txt", "a+"));
        $this->logfile = $_SERVER["DOCUMENT_ROOT"] . "/functioneelprogrammeren\oop1.7\log\log.txt";
    }

    public function Log($msg)
    {
        fwrite($this->fp, date("d-m-Y H:i:s") . ': ' . $msg . '\r\n');
    }

    public function ShowLog()
    {
        return file_get_contents($this->logfile);
    }


    /**
     * @return mixed
     */
    public function getFp()
    {
        return $this->fp;
    }

    /**
     * @param mixed $fp
     */
    public function setFp($fp): void
    {
        $this->fp = $fp;
    }

    /**
     * @return string
     */
    public function getLogfile(): string
    {
        return $this->logfile;
    }

    /**
     * @param string $logfile
     */
    public function setLogfile(string $logfile): void
    {
        $this->logfile = $logfile;
    }


}
