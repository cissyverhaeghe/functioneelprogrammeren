<?php

class River extends Waterbody
{
    private $wat_location;


    /**
     * @return mixed
     */
    public function getWatLocation()
    {
        return $this->wat_location;
    }

    /**
     * @param mixed $wat_location
     */
    public function setWatLocation($wat_location): void
    {
        $this->wat_location = $wat_location;
    }

    public function getType()
    {
        return 'Rivier';
    }
}