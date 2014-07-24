 function limpa_campo(campo){
    var name = document.getElementById(campo);
    
        if(name.value == "Preenchimento obrigatório!" || name.value == "CPF incorreto! Digite novamente!"){
        name.value= "";
        }
 }

 function valida_envia(){ 
    //valido o nome
	test = 0;	
    if (document.CadForm.nome.value == ""){ 
        alert("Preencha o campo nome"); 
        document.CadForm.nome.focus(); 
        test = 1;
		return false; 
    } 
    if(document.CadForm.sobre.value == ""){
        alert("Preencha o campo sobrenome"); 
        document.CadForm.sobre.focus();
		test = 1;
		return false; 
    }
    if(document.CadForm.apelido.value == ""){
        alert("Preencha o campo apelido"); 
        document.CadForm.apelido.focus();
		test = 1;
        return false;  
    }
    if(document.CadForm.rg.value == ""){
        alert("Preencha o campo RG");
        document.CadForm.rg.focus();
		test = 1;
        return false; 
    }
    if(document.CadForm.dt_nasc.value == ""){
        alert("Preencha o campo Data Nasc.");
        document.CadForm.dt_nasc.focus();
		test = 1;
        return false;  
    }
    if(document.CadForm.dt_assoc.value == ""){
        alert("Preencha o campo Data Associação");
        document.CadForm.dt_assoc.focus();
		test = 1;
        return false; 
    }
    if(document.CadForm.cpf.value == ""){        
        alert("Preencha o campo CPF"); 
        document.CadForm.cpf.focus();
		test = 1;
        return false;  
	}
	 if(document.CadForm.cpf.value == "Preenchimento obrigatório!"){        
        alert("CPF é um campo obrigatório!"); 
        document.CadForm.cpf.focus();
        test = 1;
        return false;  
    }
    if(document.CadForm.cpf.value == "CPF incorreto! Digite novamente!"){        
        alert("Preencha Corretamente o CPF!"); 
        document.CadForm.cpf.focus();
        test = 1;
        return false;  
    }
    if(document.CadForm.ender.value == ""){        
        alert("Preencha o campo Endereço");
        document.CadForm.ender.focus();
        test = 1;
		return false; 
	}
    if(document.CadForm.cidade.value == ""){        
        alert("Preencha o campo Cidade");
        document.CadForm.cidade.focus();
		test = 1;
        return false; 
	}
    if(document.CadForm.fone.value == ""){        
        alert("Preencha o campo Telefone"); 
        document.CadForm.fone.focus();
        test = 1;
		return false; 
	}
    if(document.CadForm.email.value == ""){        
        alert("Preencha o campo Email");
        document.CadForm.email.focus();
		test = 1;
        return false; 
	}
    if(document.CadForm.login.value == ""){        
        alert("Preencha o campo Login");
        document.CadForm.login.focus();
		test = 1;
        return false; 
	}
    if(document.CadForm.senha.value == ""){        
        alert("Preencha o campo Senha"); 
        document.CadForm.senha.focus();
		test = 1;
        return false; 
	}
	
    //o formulário se envia 
    if(test == 0){
		alert("Formulário enviado com sucesso!"); 
		document.CadForm.submit();
		return true;
	}
	else{
		alert("Erro!");
		return false;
	}
	 
} 


 
 //Função para validar CPF 
 
 function valida_Cpf(campo) {
	
	CPF = document.getElementById('cpf').value;
	var Soma;
    var Resto;
    Soma = 0;
    if (CPF == ""){
    	document.getElementById('cpf').value="Preenchimento obrigatório!";
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

