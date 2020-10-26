<?php

/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 26.10.2020
 * Time: 11:06
 */
class confiObj
{
    private $dbConnection;
    private $isInstalled;

    private $config;
    private $configDbUser;
    private $configDbDatabase;
    private $configDbHost;
    private $configDbPassword;

    private $configSourceUrl;


    /**
     * confiObj constructor.
     */
    public function __construct()
    {
        if(!$this->getDbConnection())
        {
            $configFile = parse_ini_file("./config/receiptConfig.default", TRUE);

            $this->setConfigDbHost($configFile["db"]["host"]);
            $this->setConfigDbUser($configFile["db"]["user"]);
            $this->setConfigDbDatabase($configFile["db"]["database"]);
            $this->setConfigDbPassword($configFile["db"]["password"]);

            $this->setConfigSourceUrl($configFile["url"]["url"]);


            $initDBconnect = new mysqlConnector(
                $this->getConfigDbUser(),
                $this->getConfigDbHost(),
                $this->getConfigDbPassword(),
                $this->getConfigDbDatabase()
            );

            $this->setDbConnection($initDBconnect);

            $this->setIsInstalled(TRUE);

        }
    }

    /**
     * @return mixed
     */
    public function getIsInstalled()
    {
        $return = empty($this->isInstalled) ? FALSE : $this->isInstalled;

        return $return;
    }

    /**
     * @param mixed $isInstalled
     */
    public function setIsInstalled($isInstalled)
    {
        $this->isInstalled = $isInstalled;
    }

    /**
     * @return mixed
     */
    public function getDbConnection()
    {
        return $this->dbConnection;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @param mixed $configDbDatabase
     */
    public function setConfigDbDatabase($configDbDatabase)
    {
        $this->configDbDatabase = $configDbDatabase;
    }

    /**
     * @param mixed $configDbHost
     */
    public function setConfigDbHost($configDbHost)
    {
        $this->configDbHost = $configDbHost;
    }

    /**
     * @param mixed $configDbPassword
     */
    public function setConfigDbPassword($configDbPassword)
    {
        $this->configDbPassword = $configDbPassword;
    }

    /**
     * @param mixed $configDbUser
     */
    public function setConfigDbUser($configDbUser)
    {
        $this->configDbUser = $configDbUser;
    }

    /**
     * @param mixed $configSourceUrl
     */
    public function setConfigSourceUrl($configSourceUrl)
    {
        $this->configSourceUrl = $configSourceUrl;
    }

    /**
     * @param mixed $dbConnection
     */
    public function setDbConnection($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    /**
     * @return mixed
     */
    public function getConfigDbDatabase()
    {
        return $this->configDbDatabase;
    }

    /**
     * @return mixed
     */
    public function getConfigDbHost()
    {
        return $this->configDbHost;
    }

    /**
     * @return mixed
     */
    public function getConfigDbPassword()
    {
        return $this->configDbPassword;
    }

    /**
     * @return mixed
     */
    public function getConfigDbUser()
    {
        return $this->configDbUser;
    }

    /**
     * @return mixed
     */
    public function getConfigSourceUrl()
    {
        return $this->configSourceUrl;
    }
}