function MascaraData(data_nascimento){
	if(mascaraInteiro(data_nascimento)==false){
		event.returnValue = false;
	}	
	return formataCampo(data_nascimento, '00/00/0000', event);
}

function ValidaData(data_nascimento){
	exp = /\d{2}\/\d{2}\/\d{4}/
	if(!exp.test(data_nascimento.value))
		alert('Data Invalida!');			
}
function formataCampo(campo, Mascara, evento) { 
	var boleanoMascara; 
	
	var Digitato = evento.keyCode;
	exp = /\-|\.|\/|\(|\)| /g
	campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
	var posicaoCampo = 0;	 
	var NovoValorCampo="";
	var TamanhoMascara = campoSoNumeros.length;; 
	
	if (Digitato != 8) { // backspace 
		for(i=0; i<= TamanhoMascara; i++) { 
			boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
								|| (Mascara.charAt(i) == "/")) 
			boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
								|| (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
			if (boleanoMascara) { 
				NovoValorCampo += Mascara.charAt(i); 
				  TamanhoMascara++;
			}else { 
				NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
				posicaoCampo++; 
			  }	   	 
		  }	 
		campo.value = NovoValorCampo;
		  return true; 
	}else { 
		return true; 
	}
}
function valida(form) {
			if (form.nome.value=="") {
				alert("O campo nome esta vazio");
				form.nome.focus();
				return false;
			}
			if (form.nascimento.value=="") {
				alert("O campo nascimento esta vazio");
				form.nome.focus();
				return false;
       
			}
			if (form.email.value=="") {
				alert("O campo email esta vazio");
				form.nome.focus();
				return false;
			}
			if (form.telefone.value=="") {
				alert("O campo telefone esta vazio");
				form.nome.focus();
				return false;
			}

              


		}