<?php

class CityLoader
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * @return City[]
     */
    public function getCities()
    {
        $citiesData = $this->queryForCities();

        $cities = array();
        foreach ($citiesData as $cityData) {
            $ships[] = $this->createShipFromData($cityData);
        }

        return $cities;
    }

    /**
     * @param $id
     * @return City|null
     */

    public function findOneById($id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM images WHERE img_id =' . $id);
        $statement->execute(array('img_id' => $id));
        $cityArray = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$cityArray) {
            return null;
        }

        return $this->createCityFromData($cityArray);
    }

    private function createCityFromData(array $cityData)
    {
        $city = new City();
        $city->setImgId($cityData['img_id']);
        $city->setImgFilename($cityData['img_filename']);
        $city->setImgTitle($cityData['img_title']);
        $city->setImgWidth($cityData['img_width']);
        $city->setImgHeight($cityData['img_height']);
        $city->setImgLanId($cityData['img_lan_id']);

        return $city;
    }

    private function queryForCities()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM images');
        $statement->execute();
        $citiesArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $citiesArray;
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        return $this->pdo;
    }
}