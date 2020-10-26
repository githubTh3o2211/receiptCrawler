<?php

/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 26.10.2020
 * Time: 10:58
 */
class receiptObj
{
    public $htmlOutput;
    private $configObj;


    /**
     * receiptObj constructor.
     */
    public function __construct()
    {
        $this->configObj = new confiObj();
    }

    /**
     * @return mixed
     */
    public function getConfigObj()
    {
        return $this->configObj;
    }

    /**
     * @return mixed
     */
    public function getHtmlOutput()
    {
        $return = "<tr><td>hallo</td><td>du</td><td>da</td><td><input type='button' name='ID_123' value='save'></td><td><input type='button' value='remove' name='ID_432'></td></tr>";
        return $return;
    }
    
}