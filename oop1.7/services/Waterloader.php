<?php

class Waterloader implements ItemInterface
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Waterbody[]
     */
    public function getItems()
    {
        $waterbodiesData = $this->queryForItems();

        $cities = array();
        foreach ($waterbodiesData as $waterData) {
            $waterbodies[] = $this->createItemFromData($waterData);
        }

        return $waterbodies;
    }

    /**
     * @param $id
     * @return Waterbody|null
     */

    public function findOneById($id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM water WHERE wat_id =' . $id);
        $statement->execute(array('wat_id' => $id));
        $cityArray = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$waterArray) {
            return null;
        }

        return $this->createItemFromData($waterArray);
    }

    public function createItemFromData($data)
    {

        if ($data['type'] == 'rivier') {
            $waterBody = new River();
            $waterBody->setWatLocation($data['wat_location']);
        } else {
            $waterBody = new Sea();
        }

        $waterBody->setWatId($data['wat_id']);
        $waterBody->setWatImg($data['wat_location']);
        $waterBody->setWatName($data['wat_name']);
        $waterBody->setWatType($data['wat_type']);

        return $waterBody;
    }

    public function queryForItems()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM water');
        $statement->execute();
        $waterArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $waterArray;
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        return $this->pdo;
    }
}