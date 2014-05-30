function validaName(campo){
		var name = document.getElementById(campo);

		if(name.value == ""){
			name.focus();
			name.value= "Preenchimento obrigatório deste campo.";
			return false;
		}
}

function tem_numeros(texto){
	var numeros="0123456789";
		for(i=0; i<texto.length; i++){
    	 	if (numeros.indexOf(texto.charAt(i),0)!=-1){
      	 		return 1;
    		}
   		}
  		return 0;
 }

 function limpa_campo(campo){
    var name = document.getElementById(campo);
    
        if(name.value == "Preenchimento obrigatório deste campo."){
        name.value= "";
        }
 }

 function valida_Cpf(campo) {
	
	CPF = document.getElementById('cpf').value;
	var Soma;
    var Resto;
    Soma = 0;
    if (CPF == ""){
    	document.getElementById('cpf').value="Preenchimento obrigatório deste campo.";
		CPF.focus();
    	return false;
    }
     
    for (i=1; i<=9; i++){
     Soma = Soma + parseInt(CPF.substring(i-1, i)) * (11 - i);
    }
    Resto = (Soma * 10) % 11;
     
    if ((Resto == 10) || (Resto == 11)) {
    	Resto = 0;	
    } 
    if (Resto != parseInt(CPF.substring(9, 10)) ) {
    	document.getElementById('cpf').value="CPF incorreto! Digite novamente!";
		CPF.focus();
    	return false;
    }
    Soma = 0;
    for (i = 1; i <= 10; i++){
    	Soma = Soma + parseInt(CPF.substring(i-1, i)) * (12 - i);
    }
    Resto = (Soma * 10) % 11;
     
    if ((Resto == 10) || (Resto == 11)){
		Resto = 0;
	}
    if (Resto != parseInt(CPF.substring(10, 11) ) ) {
    	document.getElementById('cpf').value="CPF incorreto! Digite novamente!";
    	return false;
    }
}