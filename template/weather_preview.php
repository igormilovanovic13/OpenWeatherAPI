<?php
    session_start();
    if (isset($_SESSION['username'])) {
?>

<h1><?php echo $_GET['name'] ?></h1>
<div>
    <img src="http://openweathermap.org/img/wn/<?php echo $_GET['icon'] ?>@2x.png" alt="">
    <p>
        Trenutno vreme: <?php echo ucfirst($_GET['desc']) ?>
    </p>
    <p>
        Temperatura: <?php echo $_GET['temp'] ?>&#8451;
    </p>
    <p>
        Stvarni osecaj: <?php echo $_GET['feels_like'] ?>&#8451;
    </p>
    <p>
        Min. temp: <?php echo $_GET['min_temp'] ?>&#8451;
    </p>
    <p>
        Max. temp: <?php echo $_GET['max_temp'] ?>&#8451;
    </p>
</div>
<a href="../index.php">Vrati se nazad.</a>

<?php
    } else {
        header("Location: ../index.php");
        exit();
    }
?>
