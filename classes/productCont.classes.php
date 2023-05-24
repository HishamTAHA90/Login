<?php

class ProductCont extends Dbh
{
    public function search($query)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE name LIKE :query OR description LIKE :query");
        $stmt->execute(['query' => "%$query%"]);
        echo '<ul>';
        foreach ($stmt as $result) {
            echo '<li><a href="product-details.php?id=' . $result['id'] . '">' . $result['name'] . '</a> - ' . $result['description'] . ' - ' . $result['price'] . '</li>';
        }
        echo '</ul>';
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($productId)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
