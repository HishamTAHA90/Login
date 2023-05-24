<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1,
        p {
            background-color: #333;
            color: #fff;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        li {
            background-color: #eee;
            border: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
        }

        li:last-child {
            margin-bottom: 0;
        }

        form {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #f44336;
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 8px 16px;
        }

        button a {
            background-color: #4CAF50;
            border: none;
            color: #fff;
            cursor: pointer;
            display: block;
            margin: auto;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
        }

        button a:hover,
        input[type="submit"]:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <h1>Votre Panier</h1>

    <?php
    include "classes/dbh.classes.php";
    include "classes/achatController.classes.php";
    include "classes/login.classes.php";
    include "classes/loginCont.classes.php";



    $achatController = new AchatController();
    $user_id = '';
    session_start();
    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];

        $achats = $achatController->getAchatsByUser($user_id);

        $total = 0;

        echo '<ul>';
        foreach ($achats as $result) {
            $prix = $result['price'];
            $quantite = $result['SUM(a.quantity)'];
            $produit_prix = $prix * $quantite;
            echo '<li>'   . $result['name'] . ' -  Prix : '  . $result['price'] . '€ -  Quantité : ' . $result['SUM(a.quantity)'] . ' - ' . ' prix de la produit : ' . $produit_prix . '€' . '
        <form method="POST" action="delete-achat.php">
        <input type="hidden" name="delete_id" value="' . $result['id'] . '">
            <input type="submit" value="Supprimer">
        </form>
        </li>';
            $total += $produit_prix;
        }
        echo '</ul>';

        echo '<p> Total : ' . $total . '€ </p>';
    } else {
        echo "il y un erreur";
    }
    ?>


    <button><a href="pager.php">Retourner</a></button>

</body>

</html>