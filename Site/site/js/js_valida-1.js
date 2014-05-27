function validaName(campo){
		var name = document.getElementById(campo);

		if(name.value == ""){
			name.focus();
			name.value= "Preenchimento obrigatório deste campo.";
			setaatributo(nome);
			return false;
		}

		if(name.value.length < 3){
			name.value= "O nome deve conter ao menos três caracteres.";
			name.focus();
			setaatributo(nome);
			return false;
		}
		if (tem_numeros(name.value)){
			name.value= "O nome não pode conter números.";
			name.focus();
			setaatributo(nome);
			return false;
		}
		if(name.value != "Preenchimento obrigatório deste campo."){
			tiraborda(nome);
			return true;
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

 function setaatributo(campo){
 	campo.setAttribute("style", "border: 1px solid red");

 }

 function tiraborda(campo){
 	campo.setAttribute("style", "border: 1px solid light-gray");

 }