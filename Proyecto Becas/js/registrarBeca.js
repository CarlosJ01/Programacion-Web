function solicitar(num) {
  if (num >= 1) {
    alert("Ya tienes una solicitud de beca para este periodo");
    return false;
  }
  arch1 = document.getElementById("ingresos").value;
  arch2 = document.getElementById("domicilio").value;
  arch3 = document.getElementById("solicitud").value;

  if (!extencionPDF(arch1, "Comprobante de ingresos", "ingresos"))
    return false;

  if (!extencionPDF(arch2, "Comprobante de domicilio", "domicilio"))
    return false;

  if (!extencionPDF(arch3, "Solicitud con carta motivo", "solicitud"))
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
