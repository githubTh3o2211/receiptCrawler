<?php

/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 12.10.2020
 * Time: 19:30
 */
class htmlWorker
{

    /**
     * Übergibt ein DOMobject und extrahiert die Rezepte
     * @param $obj
     * @return array
     */
    public static function extractToInsert ($obj)
    {
        $resultRezeptArray      = array();

        $objStart = $obj->children;
        
        foreach ($objStart as $objKey => $objValue)
        {
            $zutatenList            = array();
            
            $searchResult           = $objValue->children[0]->children;
            $searchResultType       = $objValue->children[0]->children[0]->plaintext;
            $searchResultValue      = $objValue->children[0]->children[1];

            # LINK ZUM REZEPT
            $searchResultValueLink  = $objValue->children[0]->children[1]->children[0]->attr["href"];

            # TITEL DES REZEPTS
            $searchResultValueText  = $objValue->children[0]->children[1]->plaintext;

            $zutatenList = htmlWorker::extractToInsertIngedents($searchResultValueLink, $zutatenList);

            $linkExplode        = explode("/", $searchResultValueLink);
            $idExplode          = explode("=", $linkExplode[2]);
            $idExplodeResult    = $idExplode[1];

            $checkDB = 

            $resultRezeptArray[] = array(
                "link"      => $searchResultValueLink,
                "text"      => html_entity_decode($searchResultValueText),
                "zutaten"   => $zutatenList,
            );

            unset($zutatenList);
        }

    }


    /**
     * @param $link
     * @param $resultRezepte
     * @return mixed
     */
    public static function extractToInsertIngedents ($link, array $resultRezepte)
    {
        $domObj     = htmlWorker::getDOM(url, $link, "DIGGING");
        $searchList = $domObj->find("div");
        
        foreach ($searchList as $ulKey => $ulValue)
        {
            $classCheck = $ulValue->attr["class"];

            if ($classCheck != "mod-article__text mod-text")
                continue;
            
            $childUl = $ulValue->children[1]->children;
            
            
            foreach ($childUl as $chKey => $chValue)
            {
                $resultRezepte[] = $chValue->plaintext;
            }
        }

        return $resultRezepte;
    }

    /**
     * Übergibt die main URL und Suchstring.
     * Gibt eine variable mit dem HTML zurück.
     * @param $url
     * @param $ajaxStr
     * @param string $type
     * @return bool|simple_html_dom
     */
    public static function getDOM($url, $ajaxStr, $type = "SEARCH" )
    {

        $dom = $type == "SEARCH" ? file_get_html($url . "/informieren/rezept-datenbank?recsearch_category=0&recsearch_term=" . $ajaxStr) : file_get_html($url . $ajaxStr);

        return $dom;
    }
}