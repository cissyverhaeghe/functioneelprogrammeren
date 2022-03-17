<?php


class Container
{
    private $configuration;

    private $credentials;

    private $pdo;

    private $cityLoader;

    private $userLoader;

    private $waterLoader;

    private $dbManager;

    private $logger;

    private $messageService;



    public function __construct(array $configuration, $credentials)
    {
        $this->configuration = $configuration;
        $this->credentials = $credentials;
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
            $this->userLoader = new UserLoader();
        }
        return $this->userLoader;
    }

    /**
     * @return DBManager
     */
    public function getDBManager()
    {
        if ($this->dbManager === null) {
            $this->dbManager = new DBManager($this->credentials, $this->logger);
        }
        return $this->dbManager;
    }

    /**
     * @return Logger
     */
    public function getLogger()
    {
        if ($this->logger === null) {
            $this->logger = new Logger();
        }
        return $this->logger;
    }

    /**
     * @return MessageService
     */
    public function getMessageService()
    {
        if ($this->messageService === null) {
            $this->messageService = new MessageService();
        }
        return $this->messageService;
    }

    /**
     * @return mixed
     */
    public function getWaterLoader()
    {
        if ($this->WaterLoader === null) {
            $this->WaterLoader = new Waterloader($this->getPDO());
        }
        return $this->WaterLoader;
    }
}