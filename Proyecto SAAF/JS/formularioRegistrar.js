function validarRegistro() {
  cor = document.getElementById("correo").value;
  exp = /.com$/i;
  if (!exp.exec(cor)){
    alert("El correo electronico debe de terminar en .com");
    return false;
  }

  noms = document.getElementById("nombres").value;
  apes = document.getElementById("apellidos").value;
  exp = /^[a-zA-ZñÑáéíóú.\s]+$/;
  if (!exp.exec(noms)){
    alert("El nombre(s) no puede contener numeros y caracteres especiales");
    return false;
  }
  if (!exp.exec(apes)){
    alert("El apellido(s) no puede contener numeros y caracteres especiales");
    return false;
  }
  /*
  tel = document.getElementById("telefono").value;
  if (tel != "") {
    exp = /^[0-9\s]+$/;
    if (!exp.exec(tel)){
      alert("El telefono solo puede tener numeros y espacios");
      return false;
    }
  }
  */
  dep = document.getElementById("departamento").value;
  if (dep == 0) {
    alert("Selecione un departamento");
    return false;
  }

  pass01 = document.getElementById("password01").value;
  pass02 = document.getElementById("password02").value;
  if (pass01 != pass02) {
    alert("Las contraseñas deben de ser iguales");
    document.getElementById("password02").value = "";
    return false;
  }

  return true;
}
