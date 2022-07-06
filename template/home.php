<?php
    session_start();
    if (isset($_SESSION['username'])) {
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pocetna</title>
</head>
<body>
    <h1>Zdravo, <?php echo ucfirst($_SESSION['name']); ?></h1>
    <a href="../app/logout.php">Izloguj se</a>

    <br><br>

    <h3>Vremenska Prognoza</h3>
    <form method="GET" action="../app/openweather.php">
        <label for="city">Unesite ime grada:</label>
        <input type="text" id="city" name="city" placeholder="Npr. Novi Sad">
        <button type="submit">Pogledaj prognozu</button>
        <?php if(isset($_GET['error'])) { ?>
            <p style="color: red">
                <?php
                    echo $_GET['error'];
                ?>
            </p>
         <?php }  ?>
    </form>
</body>
</html>

<?php
    } else {
        header("Location: ../index.php");
        exit();
    }
?>
