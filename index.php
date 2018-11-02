<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kean'Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Kean Store</h1>
    <?php include 'partes/header.php' ?>

    <?php if(isset($_SESSION["correo"])){ ?>
        <p>Bienvenido, <?php echo $_SESSION["nombre"]?> <?php echo $_SESSION["apellidoP"]?> <?php echo $_SESSION["apellidoM"]?> </p>
    <?php } ?>
</body>
</html>