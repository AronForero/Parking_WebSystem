console.log("Cargué!");
//console.log(document.getElementById('placa').value);
function validacion (){
  var valorplaca = document.getElementById('placa').value;
  console.log(valorplaca);
  if (valorplaca.length<6) {
    alert("Placa incorrecta");
    return false;
  }
  if (valorplaca.length>6) {
    alert("Placa incorrecta");
    return false;
  }

  var re1='([a-z])';	// Any Single Word Character (Not Whitespace) 1
  var re2='([a-z])';	// Any Single Word Character (Not Whitespace) 2
  var re3='([a-z])';	// Any Single Word Character (Not Whitespace) 3
  var re4='(\\d)';	// Any Single Digit 1
  var re5='(\\d)';	// Any Single Digit 2
  var re6='([a-z])';	// Any Single Word Character (Not Whitespace) 4

  var p = new RegExp(re1+re2+re3+re4+re5+re6,["i"]); //Arreglar la exprecion regular para poder meter motos y carros
  //O poner un if para evaluar un checkbox o algo asi para saber si es carro o moto
  if (valorplaca.length == 6) {
    if (p.test(valorplaca)) {
      return true;
    }
    else {
      alert("Placa incorrecta");
      return false;
    }
  }

}
