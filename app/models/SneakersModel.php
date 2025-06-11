<?php

class SneakersModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllSneakers()
    {
        $sql = 'SELECT Id, Merk, Model, Type, Prijs FROM Sneakers ORDER BY Merk DESC';
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Sneakers (Merk, Model, Type, Prijs, IsActief, DatumAangemaakt, DatumGewijzigd)
                VALUES (:merk, :model, :type, :prijs, 1, SYSDATE(6), SYSDATE(6))";
        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM Sneakers WHERE Id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

}