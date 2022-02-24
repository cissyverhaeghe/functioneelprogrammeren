<?php

class User
{
    private $usr_id;
    private $usr_voornaam;
    private $usr_naam;
    private $usr_email;

    /**
     * @return mixed
     */
    public function getUsrId()
    {
        return $this->usr_id;
    }

    /**
     * @param mixed $usr_id
     */
    public function setUsrId($usr_id): void
    {
        $this->usr_id = $usr_id;
    }

    /**
     * @return mixed
     */
    public function getUsrVoornaam()
    {
        return $this->usr_voornaam;
    }

    /**
     * @param mixed $usr_voornaam
     */
    public function setUsrVoornaam($usr_voornaam): void
    {
        $this->usr_voornaam = $usr_voornaam;
    }

    /**
     * @return mixed
     */
    public function getUsrNaam()
    {
        return $this->usr_naam;
    }

    /**
     * @param mixed $usr_naam
     */
    public function setUsrNaam($usr_naam): void
    {
        $this->usr_naam = $usr_naam;
    }

    /**
     * @return mixed
     */
    public function getUsrEmail()
    {
        return $this->usr_email;
    }

    /**
     * @param mixed $usr_email
     */
    public function setUsrEmail($usr_email): void
    {
        $this->usr_email = $usr_email;
    }

    public function getVoornaam()
    {
        return strtoupper($this->getUsrVoornaam());
    }

    public function getNaam()
    {
        return strtoupper($this->getUsrNaam());
    }


}