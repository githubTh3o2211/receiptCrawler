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


    public function __construct()
    {
        if(!$this->getDbConnection())
        {
            $configFile = parse_ini_file("./config/receipConfig.default", TRUE);

            $configFileDbHost       = $configFile;
            $configFileDbUser       = $configFile;
            $configFileDbDatabase   = $configFile;
            $configFileDbPassword   = $configFile;
            $configFileSourceUrl    = $configFile;

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
}