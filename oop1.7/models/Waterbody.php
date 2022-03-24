<?php

abstract class Waterbody
{
    private $wat_id;
    private $wat_name;
    private $wat_type;
    private $wat_img;
    private $wat_depth;

    /**
     * @return mixed
     */
    public function getWatDepth()
    {
        return $this->wat_depth;
    }

    /**
     * @param mixed $wat_depth
     */
    public function setWatDepth($wat_depth): void
    {
        $this->wat_depth = $wat_depth;
    }

    abstract public function getType();

    /**
     * @return mixed
     */
    public function getWatId()
    {
        return $this->wat_id;
    }

    /**
     * @param mixed $wat_id
     */
    public function setWatId($wat_id): void
    {
        $this->wat_id = $wat_id;
    }

    /**
     * @return mixed
     */
    public function getWatName()
    {
        return $this->wat_name;
    }

    /**
     * @param mixed $wat_name
     */
    public function setWatName($wat_name): void
    {
        $this->wat_name = $wat_name;
    }

    /**
     * @return mixed
     */
    public function getWatType()
    {
        return $this->wat_type;
    }

    /**
     * @param mixed $wat_type
     */
    public function setWatType($wat_type): void
    {
        $this->wat_type = $wat_type;
    }

    /**
     * @return mixed
     */
    public function getWatImg()
    {
        return $this->wat_img;
    }

    /**
     * @param mixed $wat_img
     */
    public function setWatImg($wat_img): void
    {
        $this->wat_img = $wat_img;
    }

    public function replaceValues($output)
    {

        foreach ($this as $key => $value) {
            $output = str_replace("@$key@", $value, $output);
        }
        return $output;
    }

    public function getSubTitle()
    {
        if ($this->getType() === 'Rivier') {
            return "Locatie: " . $this->getWatLocation();
        } else return "Oppervlakte: " . number_format($this->getWatSurface()) . " km²";
    }


}