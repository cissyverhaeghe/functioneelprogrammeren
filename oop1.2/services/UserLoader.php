<?php

class UserLoader
{
    public function createUserFromData(array $userData)
    {
        $user = new User();
        $user->setUsrId($userData['usr_id']);
        $user->setUsrEmail($userData['usr_email']);
        $user->setUsrVoornaam($userData['usr_voornaam']);
        $user->setUsrNaam($userData['usr_naam']);

        return $user;
    }
}