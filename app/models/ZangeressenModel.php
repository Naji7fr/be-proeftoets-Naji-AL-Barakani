<?php

class ZangeressenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllZangeressen()
    {
        $sql = 'SELECT  ZGRS.Id
                       ,ZGRS.Naam
                       ,ZGRS.Nettowaarde
                       ,ZGRS.Land
                       ,ZGRS.Mobiel
                       ,ZGRS.Leeftijd

                FROM   Zangeres as ZGRS
                
                ORDER BY ZGRS.Nettowaarde DESC
                
                LIMIT 5';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE 
                FROM Zangeres
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Zangeres (Naam, Nettowaarde, Land, Mobiel, Leeftijd)
                VALUES (:naam, :nettowaarde, :land, :mobiel, :leeftijd)";

        $this->db->query($sql);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':nettowaarde', $data['nettowaarde'], PDO::PARAM_INT);
        $this->db->bind(':land', $data['land'], PDO::PARAM_STR);
        $this->db->bind(':mobiel', $data['mobiel'], PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $data['leeftijd'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function getZangeresById($Id)
    {
        $sql = "SELECT  Id
                       ,Naam
                       ,Nettowaarde
                       ,Land
                       ,Mobiel
                       ,Leeftijd
                FROM   zangeres
                WHERE  Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $Id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateZangeres($post)
    {
        $sql = "UPDATE  zangeres
                SET     Naam = :naam
                       ,Nettowaarde = :nettowaarde
                       ,Land = :land
                       ,Mobiel = :mobiel
                       ,Leeftijd = :leeftijd
                WHERE  Id = :id;";

        $this->db->query($sql);
        $this->db->bind(':naam', $post['naam'], PDO::PARAM_STR);
        $this->db->bind(':nettowaarde', $post['nettowaarde'], PDO::PARAM_INT);
        $this->db->bind(':land', $post['land'], PDO::PARAM_STR);
        $this->db->bind(':mobiel', $post['mobiel'], PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $post['leeftijd'], PDO::PARAM_INT);
        $this->db->bind(':id', $post['Id'], PDO::PARAM_INT);
        
        $this->db->execute();
    }

}