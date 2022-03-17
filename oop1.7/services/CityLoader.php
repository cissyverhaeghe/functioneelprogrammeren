<?php

class CityLoader implements ItemInterface
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * @return City[]
     */
    public function getItems()
    {
        $citiesData = $this->queryForItems();

        $cities = array();
        foreach ($citiesData as $cityData) {
            $cities[] = $this->createItemFromData($cityData);
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

        return $this->createItemFromData($cityArray);
    }

    public function createItemFromData($data)
    {
        $city = new City();
        $city->setImgId($data['img_id']);
        $city->setImgFilename($data['img_filename']);
        $city->setImgTitle($data['img_title']);
        $city->setImgWidth($data['img_width']);
        $city->setImgHeight($data['img_height']);
        $city->setImgLanId($data['img_lan_id']);

        return $city;
    }

    public function queryForItems()
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