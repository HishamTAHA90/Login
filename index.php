<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>

<body>


    <button><a href="#">Signup</a></button>
    <button><a href="#">Login</a></button>


    <section>
        <div class="su">
            <h1>SignUp</h1>
            <form action="includes/signup.inc.php" method="POST">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
                <br>
                <button type="submit" name="submit">S'inscrire</button>
            </form>
        </div>
        <div class="li">
            <h1>Sign in</h1>
            <form action="includes/login.inc.php" method="POST">
                <input type="text" name="username" placeholder="Nom d'utilisateur">
                <input type="password" name="password" placeholder="Mot de passe">
                <br>
                <button type="submit" name="submit">Se connecter</button>
            </form>
        </div>
    </section>
</body>

</html>