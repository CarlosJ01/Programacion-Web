<?php
  switch ($op) {
    //Principal
    case 1:
    case 2:
    case 3:
      ?>
      <a href="index.php?op=1" <?php if ($op==1) echo 'id="ventanaActual"'; ?>>Login</a>
      <a href="index.php?op=2" <?php if ($op==2) echo 'id="ventanaActual"'; ?>>Registro</a>
      <a href="index.php?op=3" <?php if ($op==3) echo 'id="ventanaActual"'; ?>>Administracion</a>
      <?php
      break;

    //Usuario
    case 10:
    case 11:
    case 12:
    case 20:
    case 21:
    case 30:
    case 40:
        ?>
        <a href="index.php?op=10" <?php if ($op==10 || $op==11 || $op==12) echo 'id="ventanaActual"'; ?>>Inicio</a>
        <a href="index.php?op=20" <?php if ($op==20 || $op==21) echo 'id="ventanaActual"'; ?>>Peticion</a>
        <a href="index.php?op=30" <?php if ($op==30) echo 'id="ventanaActual"'; ?>>Asignaciones</a>
        <a href="index.php?op=40" <?php if ($op==40) echo 'id="ventanaActual"'; ?>>Otros</a>
        <a href="salir.php" <?php if ($op==60) echo 'id="ventanaActual"'; ?>>Salir</a>
        <?php
      break;
    //Admin
    case 100:
    case 101:
    case 120:
    case 121:
      ?>
      <a href="index.php?op=100" <?php if ($op==100 || $op==101) echo 'id="ventanaActual"'; ?>>Inicio</a>
      <a href="index.php?op=110" <?php if ($op==110) echo 'id="ventanaActual"'; ?>>Almacen</a>
      <a href="index.php?op=120" <?php if ($op==120 || $op==121) echo 'id="ventanaActual"'; ?>>Peticiones</a>
      <a href="index.php?op=130" <?php if ($op==130) echo 'id="ventanaActual"'; ?>>Asignaciones</a>
      <a href="index.php?op=140" <?php if ($op==140) echo 'id="ventanaActual"'; ?>>Historial</a>
      <a href="salir.php" <?php if ($op==150) echo 'id="ventanaActual"'; ?>>Salir</a>
      <?php
      break;

    case 110:
    case 111:
    case 112:
    case 113:
        ?>
        <a href="index.php?op=110" <?php if ($op==110 || $op==111) echo 'id="ventanaActual"'; ?>>Almacen</a>
        <a href="index.php?op=112" <?php if ($op==112) echo 'id="ventanaActual"'; ?>>Nuevo Activo</a>
        <a href="index.php?op=113" <?php if ($op==113) echo 'id="ventanaActual"'; ?>>Tipo Activo</a>
        <a href="index.php?op=100" <?php if ($op==100) echo 'id="ventanaActual"'; ?>>Inicio</a>
        <?php
      break;

    case 130:
    case 131:
    case 132:
    case 133:
    case 134:
    case 135:
    case 136:
    case 137:
    case 138:
        ?>
        <a href="index.php?op=130" <?php if ($op==130) echo 'id="ventanaActual"'; ?>>Todas</a>
        <a href="index.php?op=131" <?php if ($op==131 || $op==134) echo 'id="ventanaActual"'; ?>>Activo</a>
        <a href="index.php?op=132" <?php if ($op==132 || $op==135) echo 'id="ventanaActual"'; ?>>Usuario</a>
        <!--<a href="index.php?op=133" <?php /*if ($op==133) echo 'id="ventanaActual"'; */?>>Edificio</a>-->
        <a href="index.php?op=136" <?php if ($op==136) echo 'id="ventanaActual"'; ?>>Buscar Usuario</a>
        <a href="index.php?op=137" <?php if ($op==137 || $op==138) echo 'id="ventanaActual"'; ?>>Buscar Activo</a>
        <a href="index.php?op=100" <?php if ($op==100) echo 'id="ventanaActual"'; ?>>Inicio</a>
        <?php
      break;

    case 140:
    case 141:
    case 142:
    case 143:
        ?>
        <a href="index.php?op=140" <?php if ($op==140 || $op==142) echo 'id="ventanaActual"'; ?>>Usuarios</a>
        <a href="index.php?op=141" <?php if ($op==141 || $op==143) echo 'id="ventanaActual"'; ?>>Activos</a>
        <a href="index.php?op=100" <?php if ($op==100) echo 'id="ventanaActual"'; ?>>Inicio</a>
        <?php
      break;
  }
?>
