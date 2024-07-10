function cambiarContraseña(passAct) {
  oldPass = document.getElementById("passOld").value;
  neoPass01 = document.getElementById("passNeo").value;
  neoPass02 = document.getElementById("passNeoR").value;

  if (oldPass != passAct) {
    alert("Tu contraseña actual es incorrecta");
    document.getElementById("passOld").value="";
    return false;
  }

  if (neoPass01 != neoPass02) {
    alert("Tus contraseñas nuevas no coinciden");
    document.getElementById("passNeoR").value = "";
    return false;
  }

  return true;
}
