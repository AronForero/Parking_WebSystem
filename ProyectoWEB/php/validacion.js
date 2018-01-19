//console.log("Cargué!");
//console.log(document.getElementById('tipo').value);
function validacion (){
 var valorplaca = document.getElementById('placa').value;
 var tipo = document.getElementById('tipo').value;
 console.log(tipo);
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
  var re7='(\\d)';
  var p = new RegExp(re1+re2+re3+re4+re5+re6,["i"]); //Para Moto
  var q = new RegExp(re1+re2+re3+re4+re5+re7,["i"]); //Para Carro


  if (valorplaca.length == 6) {   
      if (p.test(valorplaca)){
        return true;
      }
      else if (q.test(valorplaca)) {
        return true;
      }
      else {
        alert("Placa Incorrecta");
        return false;
            }
  }
  
}
