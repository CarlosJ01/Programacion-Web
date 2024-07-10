function formularioNuevoActivo(fchAct) {
  console.log(fchAct);
  nom = document.getElementById("nombre").value.trim();
  can = document.getElementById("cantT").value;
  fchAct = new Date(fchAct);
  fch = new Date(document.getElementById("fecha").value);
  tpo = document.getElementById("tipo").value;

  if (nom == "") {
    alert("El nombre no puede estar vacio");
    document.getElementById("nombre").value = "";
    return false;
  }

  if (can <= 0) {
    alert("Ingrese una cantidad");
    document.getElementById("cantT").value = 1;
    return false;
  }

  if ((fch.getTime()/1000/60/60/24) - (fchAct.getTime()/1000/60/60/24) > 0) {
    alert("La Fecha no puede ser mayor a la actual");
    return false;
  }

  if (tpo == 0) {
    alert("Seleccione un tipo");
    return false;
  }

  return true;
}
