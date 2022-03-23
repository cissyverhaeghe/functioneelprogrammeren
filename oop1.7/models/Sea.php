<?php

class Sea extends Waterbody
{

    protected $wat_surface;

    public function getType()
    {
        return 'Sea';
    }

    /**
     * @return mixed
     */
    public function getWatSurface()
    {
        return $this->wat_surface;
    }

    /**
     * @param mixed $wat_surface
     */
    public function setWatSurface($wat_surface): void
    {
        $this->wat_surface = $wat_surface;
    }


}