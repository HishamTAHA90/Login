<?php
include "classes/dbh.classes.php";
include "classes/productCont.classes.php";
include "classes/product.classes.php";
// Récupérer l'ID du produit à partir de l'URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
} else {
    // Si l'ID du produit n'est pas présent dans l'URL, rediriger vers la page d'accueil ou afficher un message d'erreur.
    header('Location: index.php');
    exit;
}

// Instancier la classe ProductCont pour interagir avec la base de données
$productCont = new ProductCont();

// Récupérer les informations du produit à partir de la base de données
$product = $productCont->getProductById($productId);
if (!$product) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Details - <?php echo $product['name']; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .product-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-bottom: 40px;
        }

        .product-section h1 {
            font-size: 36px;
            margin-bottom: 10px;
            color: #333;
        }

        .product-section p {
            font-size: 18px;
            margin: 0;
            color: #666;
        }

        .product-section .product-description {
            margin-top: 20px;
        }

        .product-section .product-price {
            margin-top: 10px;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .button:hover {
            background-color: #0062cc;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
        }

        form input[type="number"] {
            width: 100px;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #0062cc;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="product-section">
            <h1><?php echo $product['name']; ?></h1>
            <p class="product-description">Description: <?php echo $product['description']; ?></p>
            <p class="product-price">Prix: <?php echo $product['price']; ?>€</p>
            <a href="pager.php" class="button">Retourner</a>
        </div>
        <form method="post" action="includes/add-achat.inc.php">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <label for="quantity">Quantité:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1">
            <input type="submit" value="Ajouter au panier">
        </form>
    </div>
</body