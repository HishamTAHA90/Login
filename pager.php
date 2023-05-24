<?php
session_start();
include "classes/dbh.classes.php";
include "classes/productCont.classes.php";
include "classes/product.classes.php";

?>
<!DOCTYPE html>
<html>

<head>
    <title>Page de recherche de produits</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <?php
    if (isset($_SESSION['id'])) {


    ?>
        <button><a href="#"><?php echo strtoupper($_SESSION['username']); ?></a></button>
        <button><a href="includes/logout.inc.php">Logout</a></button>
    <?php
    }


    ?>


    <div class="container">
        <form method="GET">
            <label for="search">Recherche de produits :</label>
            <input type="text" id="search" name="search">
            <input type="submit" value="Rechercher" name="searchs">
        </form>
        <div class="products">
            <h2>Résultats de recherche :</h2>
            <?php

            if (isset($_GET['search'])) {
                $search = $_GET['search'];
            } else {
                $search = ' ';
            }

            // Create a new product object
            $product = new ProductCont();

            // Search for products
            $product->search($search);

            ?>
        </div>
    </div>
</body>

</html>