function peticion() {
  canDis = document.getElementById("canDis").value;
  can = document.getElementById("can").value;
  edi = document.getElementById("edif").value;
  nom = document.getElementById("nomLug").value.trim();


  if (parseInt(can) > parseInt(canDis)) {
    alert("No existe esa cantidad disponible");
    return false;
  }
  if (parseInt(can) <= 0) {
    alert("Ingrese la cantidad deseada");
    document.getElementById("can").value = 1;
    return false;
  }

  if (edi == 0) {
    alert("Seleccione un edificio");
    return false;
  }

  if (nom == "") {
    alert("Ingrese el nombre del lugar");
    return false;
  }

  return true;
}
