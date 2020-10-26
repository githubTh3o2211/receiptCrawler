<?php

/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 09.10.2020
 * Time: 16:05
 */
class mysqlConnector
{
    private $user;
    private $host;
    private $pw;
    private $db;
    private $connection;

    /**
     * mysqlConnector constructor.
     * @param $user
     * @param $host
     * @param $pw
     * @param $db
     */
    function __construct($user, $host, $pw, $db)
    {
        if(empty($this->connection))
        {
            $this->user         = $user;
            $this->host         = $host;
            $this->pw           = $pw;
            $this->db           = $db;
            
            $dsn                = "mysql:dbname=" .  $this->db . ";host=" .  $this->host;
            $this->connection   = new PDO($dsn, $this->user, $this->pw);
        }
    }

    public function insertInto ($data)
    {
        
    }

    public function checkRezept ($data)
    {
        $fireQuery      = $this->connection->query("SELECT COUNT(forcast.link) as anzahl FROM rezepte.forecast as forcast WHERE forcast.link LIKE" . $data)->execute()->fetchAll();
        $returnValue    = $fireQuery > 0 ? TRUE : FALSE;
        
        return $returnValue;
    }
}