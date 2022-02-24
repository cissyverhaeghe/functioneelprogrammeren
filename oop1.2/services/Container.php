<?php


class Container
{
    private $configuration;

    private $pdo;

    private $cityLoader;

    private $userLoader;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return PDO
     */
    public function getPDO()
    {
        if ($this->pdo === null) {
            $this->pdo = new PDO($this->configuration['db_dsn'], $this->configuration['db_user'], $this->configuration['db_pass']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    /**
     * @return CityLoader
     */
    public function getCityLoader()
    {
        if ($this->cityLoader === null) {
            $this->cityLoader = new CityLoader($this->getPDO());
        }
        return $this->cityLoader;
    }

    /**
     * @return UserLoader
     */
    public function getUserLoader()
    {
        if ($this->userLoader === null) {
            $this->userLoader = new UserLoader($this->getPDO());
        }
        return $this->userLoader;
    }


}