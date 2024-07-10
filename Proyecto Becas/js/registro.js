function registro() {
  num = document.getElementById("numeroControl").value;
  pass01 = document.getElementById("password1").value;
  pass02 = document.getElementById("password2").value;


  exp = /^C?[0-9]{8}$/;
  if (!exp.exec(num)){
    alert("Registre correctamente su numero de control");
    return false;
  }

  if (pass01!=pass02) {
    alert("Las contraseñas no coinciden");
    document.getElementById("password2").value = "";
    return false;
  }

  if (pass01.length < 5) {
    alert("La contraseña debe de tener por lo menos 5 caracteres");
    return false;
  }

  return true;
}
