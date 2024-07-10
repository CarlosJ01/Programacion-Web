function mostraralerta(){
    alert('hizo clic!');
  }
/*function hacerclic(){
    document.getElementsByTagName('p')[1].onclick=mostraralerta;
}*/
function hacerclic(){
  var lista=document.querySelectorAll("p");
    for(var f=0; f<lista.length; f++){
      lista[f].onclick=mostraralerta;
    }
}

function mostraralerta(){
  alert('hizo clic!');
}

window.onload=hacerclic;
