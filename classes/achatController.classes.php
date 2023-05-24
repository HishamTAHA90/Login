<?php

class AchatController extends Dbh
{

    public function addAchat($user_id, $product_id, $quantity)
    {
        $stmt = $this->connect()->prepare("INSERT INTO achat (user_id, product_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $product_id, $quantity]);
        return $this->connect()->lastInsertId();
    }
    public function getAchatsByUser($user_id)
    {
        try {
            $query = "SELECT p.name, p.price, SUM(a.quantity) , a.id 
            FROM achat a 
            INNER JOIN products p ON a.product_id = p.id 
            WHERE a.user_id = ?
            GROUP BY p.id ,p.name , p.price
            ";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$user_id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Une erreur s'est produite lors de la récupération des achats : " . $e->getMessage());
        }
    }
    public function deleteAchat($id)
    {
        $stmt = $this->connect()->prepare("DELETE FROM achat WHERE id = ? ");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
}
