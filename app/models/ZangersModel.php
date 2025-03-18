<?php

class ZangersModel
{
    private $db;

    public function __construct()
    {
        /** Door het maken van een database instantie
         *  kunnen we de database functies gebruiken
         *  en hebben we een verbinding met de database
         */
        $this->db = new Database();
    }

    public function getAllZangers()
    {
        $sql = 'SELECT ZNGS.Naam
                      ,ZNGS.Nettowaarde
                      ,ZNGS.Land
                      ,ZNGS.Mobiel
                      ,ZNGS.Leeftijd
                      ,ZNGS.IsActief
                      ,ZNGS.Opmerking
                      ,ZNGS.DatumAangemaakt
                      ,ZNGS.DatumGewijzigd
        
                FROM Zangeres as ZNGS
                
                ORDER BY ZNGS.Leeftijd DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}
