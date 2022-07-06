<?php
session_start();
if (! isset($_SESSION['username'])) {
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uloguj se</title>
</head>
<body>
    <h2>Prijavi se:</h2>
    <form action="app/login.php" method="post" >
        <label for="username">Korisnicko ime: </label>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="password">Lozinka: </label>
        <input type="password" name="password" id="password">
        <br><br>
        <?php if (isset($_GET['error'])) { ?>
            <p style="color: red">
                <?php echo $_GET['error']; ?>
            </p>
        <?php } ?>
        <button type="submit">Uloguj se</button>
    </form>
</body>
</html>

<?php
    } else {
    header("Location: template/home.php");
    exit();
    }
?>