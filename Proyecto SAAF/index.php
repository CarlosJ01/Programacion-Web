<?php
  include("encabezado.php");

  if ($_SESSION["OK"] == false) {
    switch ($op) {
      case 1:
          include("login.php");
        break;
      case 2:
          include("registro.php");
        break;
      case 3:
          include("loginAdmin.php");
        break;
    }
  }
  else {
    if ($_SESSION["tipo"] == "Normal") {
      switch ($op) {
        case 10:
            include("bienvenidaUsuario.php");
          break;
        case 11:
            include("cambiarContraseña.php");
          break;
        case 20:
            include("disponibles.php");
          break;
        case 21:
            include("pedir.php");
          break;
        case 30:
            include("asignaciones.php");
          break;
        case 40:
            include("buscarOtros.php");
          break;
      }
    }else if ($_SESSION["tipo"] == "Administrador"){
      switch ($op) {
        case 100:
            include("bienvenidaAdmin.php");
          break;
        case 101:
            include("cambiarContraseña.php");
          break;
        case 110:
            include("almacen.php");
          break;
        case 111:
            include("editarActivo.php");
          break;
        case 112:
            include("nuevoActivo.php");
          break;
        case 113:
            include("nuevoTipoActivo.php");
          break;
        case 120:
            include("peticiones.php");
          break;
        case 121:
            include("asignarActivo.php");
          break;
        case 130:
            include("asignacionesTodas.php");
          break;
        case 131:
            include("asignacionesActivo.php");
          break;
        case 132:
            include("asignacionesUsuarios.php");
          break;
        /*case 133:
            include("asignacionesEdificio.php");
          break;*/
        case 134:
            include("asignacionesActivoIndividual.php");
          break;
        case 135:
            include("asignacionUsuario.php");
          break;
        case 136:
            include("buscarUsuario.php");
          break;
        case 137:
            include("buscarActivo.php");
          break;
        case 138:
            include("activosBuscarLike.php");
          break;
        case 140:
            include("historialUsuarios.php");
          break;
        case 141:
            include("historialActivos.php");
          break;
        case 142:
            include("historialUsuario.php");
          break;
        case 143:
            include("historialActivo.php");
          break;
        }
    }
  }
  include("pie.php");
?>
