function convocatoria() {
  arch = document.getElementById("convoctoria").value;
  if (!extencionPDF(arch, "Nuevo documento de la convoctoria", "convoctoria"))
    return false;
  return true;
}

function solicitudEnviar() {
  arch = document.getElementById("solicitud").value;
  if (!extencionPDF(arch, "Nuevo documento de la solicitud", "solicitud"))
    return false;
  return true;
}
function extencionPDF(doc, nom, id){
  var expExt = /(.pdf)$/i;
  if (doc != "") {
    if (!expExt.exec(doc)){
      alert("El documento de la "+nom+" debe de ser PDF, por favor vuelva a subir el documento");
      document.getElementById(id).value = "";
      return false;
    }
  }
  return true;
}
