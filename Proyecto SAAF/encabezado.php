<?php
  date_default_timezone_set('America/Mexico_City');
  include("Procesa/bd.php");
  SESSION_START();

  if (!isset($_SESSION["OK"]))
    $_SESSION["OK"] = false;

  if (!isset($_GET["op"]))
    $op = 1;
  else
    $op = $_GET["op"];

    if (!isset($_GET["msm"]))
      $msm = "";
    else
      $msm = $_GET["msm"];
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/estilo.css">

    <title>Activos Fijos</title>
  </head>
  <body>
    <div class="Margen"></div>
    <header>
      <div class="Titulo">
        <h1>Activos Fijos</h1>
      </div>
      <div class="Menu">
        <?php
          include("menu.php");
        ?>
      </div>
    </header>
    <?php
      if (isset($_SESSION["nombre"])) {
        ?>
        <div class="Usuario">
          <p><label>Usuario: </label><?php echo $_SESSION["nombre"]; ?></p>
        </div>
        <?php
      }
    ?>
    <section>
