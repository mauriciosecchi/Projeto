<?php
	session_start();
	
	if(!isset($_SESSION['logado'])){
		header("Location:login.php");
	}

?>
<?php
  include_once "functions.php";
  include_once "funcoesreserva.php";
  $db = conectadb();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
   <script type="text/javascript" src="jquery-1.7.2.js"></script>	
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.6.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>  
  <script type="text/javascript" src="js/Questrial_400.font.js"></script>
  <script type="text/javascript" src="js/bgSlider.js" ></script>
  <script type="text/javascript" src="js/script.js" ></script>
  <script type="text/javascript" src="js/pages.js"></script>
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="js/bg.js" ></script>
  <script type="text/javascript" src="js/forms.js"></script>
  <script type="text/javascript" src="js/jcarousellite.js"></script>
  <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
  <script type="text/javascript" src="js/atooltip.jquery.js"></script>
  <script type="text/javascript" src="js/js_valida.js"> </script>
 
  <!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
  <![endif]-->
	<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"  alt="" /></a>
		</div>
	<![endif]-->

<script type="text/javascript">
	$(document).ready(function(){
		$("#modalidades").change( function() {
			$("#quadras").hide();
			$("#result").html('buscando...');
			var uf = $(this).val();
							
			$.post("funcoesreserva.php", {dados: uf}, function(msg){
				   if (msg != ''){
					$("#quadras").html(msg).show();
					$("#result").html('');
				}
				else{
					$("#result").html('Sem Resultados');
				}                     
			});
		});
	});
</script>

<script type="text/javascript">
    $(document).ready(function () {
        
		var view = "<?php echo $_SESSION['logado']?>";
		var tp_usuario = "<?php echo $_SESSION['tipo_usuario']?>";
		 		
		if(tp_usuario == 1){
			$("#home").show();
			$("#reservas").show();
			$("#cadastro").show();
			$("#reservar").show();
			$("#modalidades").show();
			$("#quadras").show();
			$("#usuarios").show();
			$("#contato").show();
			$("#sair").show();
		}else if(view == 1){
			$("#home").show();
			$("#reservas").show();
			$("#cadastro").show();
			$("#reservar").show();
			$("#modalidades").hide();
			$("#quadras").hide();
			$("#usuarios").hide();
			$("#contato").show();
			$("#sair").show();
		}else if(view == 0){
			$("#home").show();
			$("#reservas").hide();
			$("#cadastro").show();
			$("#reservar").hide();
			$("#modalidades").hide();
			$("#quadras").hide();
			$("#usuarios").hide();
			$("#contato").show();
			$("#sair").show();
		}
    });
</script>	

</head>

<body>
<div id="bgSlider"></div>
<div class="extra">
	<div class="main">
		<div class="box">
			<!--header -->
			<header><br>
				<h1><a href="index.php" id="logo"></a></h1>
				<nav class="menu">
					<ul id="menu">
						<li id="home"><a href="#!/page_Home"><span></span><strong>Home</strong></a></li>
						<li id="reservas"><a href="#!/page_Reservas"><span></span><strong>Reservas</strong></a></li>
						<li id="cadastro"><a href="#!/page_Cadastro"><span></span><strong>Cadastro</strong></a></li>
						<li id="reservar"><a href="#!/page_CadReservas"><span></span><strong>Reservar</strong></a></li>
						<li id="modalidades"><a href="#!/page_Modalidade"><span></span><strong>Modalidades</strong></a></li>
						<li id="quadras"><a href="#!/page_Quadra"><span></span><strong>Quadras</strong></a></li>
						<li id="usuarios"><a href="#!/page_Usuarios"><span></span><strong>Usuarios</strong></a></li>
						<li id="contato"><a href="#!/page_Contact"><span></span><strong>Contato</strong></a></li>
						<li id="sair"><a href="login.php" onclick="" ><span></span><strong>Sair</strong></a></li>
					</ul>
				</nav>
			</header>
			<!--header end-->
			<!--content    -->

			<article id="content">
				<ul>
					<!===========================================PAGINA HOME   =======================================================>
					<li id="page_Home">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<div class="wrapper">
									<div class="col1">
										<h2>Estrutura</h2>
										<p class="quot"> A AABB fundada em xxxx, conta com uma infraestrutura completa para seus sócios dentre eles Piscinas, Quadras de Tenis, Quadra de Futebol de Salão, <img src="images/quot2.png" alt=""></p>
										<p>Texto</p>
									</div>
								</div>
							</div>
						</div>
					</li>

					<!===========================================PAGINA VISUALIZAÇAO DE RESERVAS    =======================================================>
					
					<li id="page_Reservas">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<div class="wrapper">
									<h2>Reservas</h2>
									<form name="visuForm" action="" method="post">
										<p>    <!-- Buscando modalidades -->
										<label for="nome"> Modalidade:</label>
										<?php  
										   $rs = mysql_query("SELECT * FROM modalidade");
										   montaCombo("modalidades", $rs, "id_modalidade", "desc_modalidade", '');
										 ?>
										</p>

										<p>
										<label for="nome"> Quadras:</label>
										<select id="quadras" name="quadra">Quadras:
											<option value ='-1'>Nenhuma quadra localizada</option>
										</select>
										</p>
									</form>
									    <div class="table">
										<table>
											<thead>
												<tr>
													<th class="bg"></th>
													<th><strong>Segunda</strong></th>
													<th class="bg"><strong>Terça</strong></th>
													<th><strong>Quarta</strong></th>
													<th class="bg"><strong>Quinta</strong></th>
													<th><strong>Sexta</strong></th>
													<th class="bg"><strong>Sábado</strong></th>
													<th><strong>Domingo</strong></th>
												</tr>
											</thead>
											<?php
												gerarhorarios();
											?>
					
					
					
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</li>

					<!===========================================PAGINA CADASTRO    =======================================================>

					<li id="page_Cadastro">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
						
								<h2>Meu Cadastro</h2>
								<form name="CadForm" id="Form" method="post" action="" >
								
								<?php
									if(isset($_SESSION['tipo_usuario'])){
										$estado = "estado"; 
										
										if (isset($_GET['id_usuario'])) {
											$query = "SELECT * FROM usuario WHERE id_usuario=$_GET[id_usuario]";									
											
											$result = mysql_query($query);
											if(mysql_num_rows($result) > 0){
												$rows = mysql_fetch_array($result);
												$nome = $rows['nome'];
												$sobrenome = $rows['sobrenome'];
												$apelido = $rows['apelido'];
												$cpf = $rows['cpf'];
												$rg = $rows['rg'];
												$dt_nasc = $rows['dt_nasc'];
												$dt_assoc = $rows['dt_assoc'];
												$logradouro = $rows['logradouro'];
												$cidade = $rows['cidade'];
												$estado = $rows['estado'];		
												$telefone = $rows['telefone'];
												$celular = $rows['celular'];
												$email = $rows['email'];
												$login = $rows['login'];
												$senha = $rows['senha'];
												$aprovacao = $rows['aprovacao'];
											}
										}else if(isset($_SESSION['id_usuario'])){
											$query = "SELECT * FROM usuario WHERE id_usuario = $_SESSION[id_usuario]";									
											
											$result = mysql_query($query);
											if(mysql_num_rows($result) > 0){
												$rows = mysql_fetch_array($result);
												$nome = $rows['nome'];
												$sobrenome = $rows['sobrenome'];
												$apelido = $rows['apelido'];
												$cpf = $rows['cpf'];
												$rg = $rows['rg'];
												$dt_nasc = $rows['dt_nasc'];
												$dt_assoc = $rows['dt_assoc'];
												$logradouro = $rows['logradouro'];
												$cidade = $rows['cidade'];
												$estado = $rows['estado'];		
												$telefone = $rows['telefone'];
												$celular = $rows['celular'];
												$email = $rows['email'];
												$login = $rows['login'];
												$senha = $rows['senha'];
												$aprovacao = $rows['aprovacao'];
											}
										}
									}
									else{
										$nome = '';
										$sobrenome = '';
										$apelido = '';
										$cpf = '';
										$rg = '';
										$dt_nasc = '';
										$dt_assoc = '';
										$logradouro = '';
										$cidade = '';
										$estado = '';		
										$telefone = '';
										$celular = '';
										$email = '';
										$login = '';
										$senha = '';
										$aprovacao = '';
									}
								?>	


									<div class="wrapper"> 
										<label for="nome"> Nome:</label> 
										<input class="input" <?php echo ("value= '$nome'") ?> type="text" name="nome" id="nome" onblur="validaName('nome');" onFocus="limpa_campo('nome');" >
									</div>

									<div class="wrapper"> 
										<label for="sobrenome">Sobrenome:</label> 
										<input class="input" <?php echo ("value= '$sobrenome'") ?> type="text" name="sobre" id="sobre" onblur="validaName('sobre');" onFocus="limpa_campo('sobre');" >
									</div>
									
									<div class="wrapper"> 
										<label for="apelido"> Apelido: </label> 
										<input class="input" <?php echo ("value= '$apelido'") ?> type="text" name="apelido" id="apelido" onblur="validaName('apelido');" onFocus="limpa_campo('apelido');">
									</div>

									<div class="wrapper"> 
										<label for="cpf">CPF:</label>
										<input class="input" <?php echo ("value= '$cpf'") ?> type="text" name="cpf" id="cpf" onblur="valida_Cpf('cpf');" onFocus="limpa_campo('cpf');" >
									</div>

									<div class="wrapper">
										<label for="rg">RG:</label>
										<input class="input" <?php echo ("value= '$rg'") ?> type="text" name="rg" id="rg" onblur="validaName('rg');" onFocus="limpa_campo('rg');" >
									</div>
									<div id="datas" class="clearfix">
										<div class="wrapper input-data"> 
											<label for="dt_nasc">Data Nasc:</label>
											<input class="input" <?php echo ("value= '$dt_nasc'") ?> name="dt_nasc" type="date">
										</div>
										
										<div class="wrapper input-data"> 
											<label for="dt_assoc">Data Assoc:</label>
											<input class="input" <?php echo ("value= '$dt_assoc'") ?> name="dt_assoc" id="dt_assoc" type="date">
										</div>
									</div>

									<div class="wrapper">
										<label for="logradouro">Endereço:</label>
										<input class="input" <?php echo ("value= '$logradouro'") ?> type="text" name="ender" id="ender" onblur="validaName('ender');" onFocus="limpa_campo('ender');" >
									</div>

									<div id="cidade-estado" class="clearfix">
										<div class="wrapper input-cidade"> 
											<label for="cidade">Cidade:</label> 
											<input class="input" <?php echo ("value= '$cidade'") ?> type="text" name="cidade" id="cidade" onblur="validaName('cidade');" onFocus="limpa_campo('cidade');" >
										</div>

										<div class="wrapper input-estado"> 
											<label for="estado">Estado:</label>				
										  	<select name="estado">

										        <option value="AC" <?php if (!(strcmp('AC', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>AC</option>
										        <option value="AL" <?php if (!(strcmp('AL', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>AL</option>
										        <option value="AP" <?php if (!(strcmp('AP', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>AP</option>
										        <option value="AM" <?php if (!(strcmp('AM', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>AM</option>
										        <option value="BA" <?php if (!(strcmp('BA', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>BA</option>
										        <option value="CE" <?php if (!(strcmp('CE', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>CE</option>
										        <option value="DF" <?php if (!(strcmp('DF', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>DF</option>
										        <option value="ES" <?php if (!(strcmp('ES', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>ES</option>
										        <option value="GO" <?php if (!(strcmp('GO', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>GO</option>
										        <option value="MA" <?php if (!(strcmp('MA', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>MA</option>
										        <option value="MT" <?php if (!(strcmp('MT', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>MT</option>
										        <option value="MS" <?php if (!(strcmp('MS', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>MS</option>
										        <option value="MG" <?php if (!(strcmp('MG', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>MG</option>
										        <option value="PA" <?php if (!(strcmp('PA', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>PA</option>
										        <option value="PB" <?php if (!(strcmp('PB', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>PB</option>
										        <option value="PR" <?php if (!(strcmp('PR', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>PR</option>
										        <option value="PE" <?php if (!(strcmp('PE', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>PE</option>
										        <option value="PI" <?php if (!(strcmp('PI', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>PI</option>
										        <option value="RJ" <?php if (!(strcmp('RJ', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>RJ</option>
										        <option value="RN" <?php if (!(strcmp('RN', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>RN</option>
										        <option value="RS" <?php if (!(strcmp('RS', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>RS</option>
										        <option value="RO" <?php if (!(strcmp('RO', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>RO</option>
										        <option value="RR" <?php if (!(strcmp('RR', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>RR</option>
										        <option value="SC" <?php if (!(strcmp('SC', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>SC</option>
										        <option value="SP" <?php if (!(strcmp('SP', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>SP</option>
										        <option value="SE" <?php if (!(strcmp('SE', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>SE</option>
										        <option value="TO" <?php if (!(strcmp('TO', htmlentities($estado, ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>TO</option>

									    	</select>

												
										</div>
									</div>
									
									<div id="telefones" class="clearfix">
										<div class="wrapper input-telefone">
											<label for="telefone">Telefone:</label>
											<input class="input" <?php echo ("value= '$telefone'") ?> type="text" name="fone" id="fone" onblur="validaName('fone');" onFocus="limpa_campo('fone');">
										</div>
										
										<div class="wrapper input-telefone">
											<label for="telefone">Celular:</label>
											<input class="input" <?php echo ("value= '$celular'") ?> type="text" name="cel" id="cel" onblur="validaName('cel');" onFocus="limpa_campo('cel');" >
										</div>
									</div>

									<div class="wrapper">
										<label for="email">E-mail:</label>
										<input class="input" <?php echo ("value= '$email'") ?> type="text" name="email" id="email" onblur="validaName('email');" onFocus="limpa_campo('email');" >
									</div>


									<div class="wrapper"> 
										<label for="login"> Login:</label> 
										<input class="input" <?php echo ("value= '$login'") ?> type="text" name="login" id="login" onblur="validaName('login');" onFocus="limpa_campo('login');" >
									</div>

									<div class="wrapper">
										<label for="senha">Senha:</label>
										<input class="input" <?php echo ("value= '$senha'") ?> type="password" name="senha" id="senha" onFocus="limpa_campo('senha');" >
									</div>

									<input type="submit" id="submit" name= "submit" value="Enviar">
									
									<input type="checkbox" <?php if ($aprovacao == "1"){ echo 'checked = "checked"';}?> name="OPCAO" value="1"> ATIVO
									<input type="checkbox" <?php if ($aprovacao == "0"){ echo 'checked = "checked"';}?> name="OPCAO" value="0"> INATIVO
						
													
							
								<?php
								if (isset($_POST['submit'])) {
									 		$nome = $_POST['nome'];
											$sobrenome = $_POST['sobre'];
											$apelido = $_POST['apelido'];
											$cpf = $_POST['cpf'];
											$rg = $_POST['rg'];
											$dt_nasc = $_POST['dt_nasc'];
											$dt_assoc = $_POST['dt_assoc'];
											$logradouro = $_POST['ender'];
											$cidade = $_POST['cidade'];
											$estado = $_POST['estado'];		
											$telefone = $_POST['fone'];
											$celular = $_POST['cel'];
											$email = $_POST['email'];
											$login = $_POST['login'];
											$senha = $_POST['senha'];
										
	
									if (empty($nome) || empty($sobrenome) || empty($apelido) || empty($cpf) || empty($rg) || empty($dt_nasc) || empty($dt_assoc) || empty($logradouro) || empty($cidade) || empty($estado) || empty($telefone) || empty($celular) || empty($email) || empty($login) || empty($senha)){
										 echo "<script type='text/javascript'> alert('Preencha os campos em branco!') </script>";
									}else{	
										if (isset($_SESSION['id_usuario'])){

											$sql = "UPDATE usuario SET 
											cpf= '$_POST[cpf]', 
											nome= '$_POST[nome]', 
											rg='$_POST[rg]', 
											dt_nasc = '$_POST[dt_nasc]', 
											dt_assoc = '$_POST[dt_assoc]', 
											logradouro ='$_POST[ender]', 
											cidade = '$_POST[cidade]', 
											estado = '$_POST[estado]',
											email = '$_POST[email]',
											senha = '$_POST[senha]',
											sobrenome = '$_POST[sobre]',
											telefone= '$_POST[fone]',
											celular ='$_POST[cel]',
											login = '$_POST[login]',
											apelido ='$_POST[apelido]' 
											WHERE id_usuario = $_GET[id_usuario]";										
										}else{
											$sql = "INSERT INTO `usuario` 
											(`cpf`, 
											`nome`, 
											`rg`, 
											`dt_nasc`, 
											`dt_assoc`, 
											`logradouro`, 
											`cidade`, 
											`estado`, 
											`email`, 
											`senha`, 
											`sobrenome`, 
											`telefone`, 
											`celular`, 
											`login`, 
											`apelido`) VALUES
											('$_POST[cpf]', 
											 '$_POST[nome]', 
											 '$_POST[rg]', 
											 '$_POST[dt_nasc]', 
											 '$_POST[dt_assoc]', 
											 '$_POST[ender]', 
											 '$_POST[cidade]', 
											 '$_POST[estado]', 
											 '$_POST[email]', 
											 '$_POST[senha]', 
											 '$_POST[sobre]', 
											 '$_POST[fone]', 
											 '$_POST[cel]', 
											 '$_POST[login]', 
											 '$_POST[apelido]')";
										}
										
										if (isset($_POST['OPCAO'])){
											
											if (isset($_GET['id_usuario'])){
												$checkk= "INSERT INTO `usuario` ('aprovacao') VALUES ($_POST[OPCAO])";
		    									//$valorcheck = $_POST['OPCAO'];
		    									//echo "valor " .$valorcheck;s
		    									if (isset($valorcheck)){
		    										$checkk = "UPDATE usuario SET 
													aprovacao= '$_POST[OPCAO]'
													WHERE id_usuario = $_GET[id_usuario]";
												}else{
													$checkk = "UPDATE usuario SET 
													aprovacao= '$_POST[OPCAO]'
													WHERE id_usuario = $_GET[id_usuario]";
		    									}
	    									}
	    									mysql_query($checkk);
    									}

										mysql_query($sql);
									
										if (isset($_SESSION['id_usuario'])){
											echo "<script type='text/javascript'> alert('Dados alterados com sucesso!') </script>";
										}else{
											echo "<script type='text/javascript'> alert('Cadastro Efetuado! Aguarde liberação do Administrador!''); </script>";
										}
									}
								}		
								?>
							</form>	
							</div>
						</div>
					</li>

					<!===========================================PAGINA CADASTRO DE RESERVAS    =======================================================>

					<li id="page_CadReservas">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<h2>Cadastro de Reservas</h2>
								<form name="ReservForm" id="Form" method="post" action="" onSubmit="return validaform('formcont');">
								
									<div class="wrapper"> 
										<label for="id"> ID: </label> 
										<input class="input" type="text" value="1234" disabled="disabled" onblur="if(this.value=='') this.value='1234'" onFocus="if(this.value =='ID' ) this.value=''" >
									</div>
									
									<div class="wrapper"> 
										<label for="nome"> Nome:</label> 
										<input class="input" type="text" value="Alonso da Silva" disabled="disabled" onblur="if(this.value=='') this.value='Nome'" onFocus="if(this.value =='Nome' ) this.value=''" >
									</div>
									
									<div class="wrapper"> 
										<label for="nome"> Modalidade:</label>
										<?php
												$rs = mysql_query("SELECT * FROM modalidade");
												montaCombo("escolhemodalidade", $rs, "id_modalidade", "desc_modalidade");
										?>
									</div>
									
									<div class="wrapper"> 
										<label for="nome"> Quadra:</label>
										<?php
												$rs = mysql_query("SELECT * FROM quadra q JOIN modalidade m WHERE q.id_modalidade = m.id_modalidade");
												montaCombo("escolhequadra", $rs, "id_quadra", "desc_quadra");
										?>
									</div>

									<div id="data-reserva" class="clearfix">
										<div class="wrapper input-date"> 
											<label for="dt_nasc">Data:</label>
											<input class="input" type="date">
										</div>
										
										<div class="wrapper input-time"> 
											<label for="dt_assoc">Horário:</label>
											<input class="input" type="time">
										</div>
									</div>

									<div class="wrapper1">
										<label for="desc_reserva">Observação:</label>										
										<textarea class="textarea" cols="50" rows="3" value="Insira uma observação..."  onblur="if(this.value=='') this.value='Insira uma observação...'" onFocus="if(this.value =='Insira uma observação...' ) this.value=''" ></textarea>	
									</div>
										
								</form>
													
								<input type="submit" value="Enviar Informações" value="Place order" class = "enviar_">
							</div>
						</div>
					</li>
					<!===========================================PAGINA CADASTRO DE MODALIDADES  ===================================================>
					
					<li id="page_Modalidade">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<h2>Cadastro de Modalidades</h2>
								<form name="ModalidadeForm" id="Form" method="POST" action="index.php" onSubmit="">
																	
									<div class="wrapper"> 
										<label for="modalidade"> Modalidade:</label> 
										<input class="input" type="text" value="" name="modalidade" id="modalidade" onblur="validaName('modalidade');" onFocus="limpa_campo('modalidade');">
									</div>
									
									<div class="wrapper"> 
										<input type="submit" name="submitModalidade" value="Enviar">
									</div>
									
									
									
								</form>
								
								<?php

									if(isset($_POST['submitModalidade'])){
										insereModalidade($_POST);
										echo "<script type='text/javascript'> alert('Dados inseridos com sucesso!') </script>";	
									}	
								?>
								
								
							</div>
						</div>
					</li>
					
					<!===========================================PAGINA CADASTRO DE QUADRAS  =======================================================>
					
					<li id="page_Quadra">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<h2>Cadastro de Quadras</h2>
								<form name="QuadraForm" id="Form" method="POST" action="index.php#!/page_Home" onSubmit="">
									
									<div class="wrapper"> 
										<label for="nome"> Modalidade:</label>
										<?php
												$rs = mysql_query("SELECT * FROM modalidade");
												montaCombo("modalidade", $rs, "id_modalidade", "desc_modalidade");
										?>
									</div>
									
									<div class="wrapper"> 
										<label for="quadra"> Quadra:</label> 
										<input class="input" type="text" value="" name="quadra" id="quadra" onblur="validaName('quadra');" onFocus="limpa_campo('quadra');">
									</div>
									
									<div id="data-reserva" class="clearfix">									
										
										<div class="wrapper input-time"> 
											<label for="horario_ini">Horário Inicio:</label>
											<input class="input" type="time" name="horario_ini">
										</div>
										<div class="wrapper input-time"> 
											<label for="horario_fim">Horário Fim:</label>
											<input class="input" type="time" name="horario_fim">
										</div>
										<div class="wrapper input-time"> 
											<label for="horario_base">Horário Base:</label>
											<input class="input" type="time" name="horario_base">
										</div>
									</div>
									<input type="submit" name="submitQuadra" value="Enviar">
								</form>
																
								<?php

									if(isset($_POST['submitQuadra'])){
										insereQuadra($_POST);
										echo "<script type='text/javascript'> alert('Dados inseridos com sucesso!') </script>";
											
									}	
								?>	
							</div>
						</div>
					</li>


					<!===========================================PAGINA LISTAGEM DE USUARIOS  =======================================================>
						
					<li id="page_Usuarios">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<h2>Lista de Usuários</h2>

									<?php
									      
									$_BS['PorPagina'] = 10; // Número de registros por página

									$sql = mysql_query("SELECT * FROM usuario");   // Descobrimos o total de registros encontrados $numRegistros = mysql_num_rows($sql); - See more at: http://rafaelcouto.com.br/sistema-de-busca-interna-com-php-mysql/#sthash.8kv0Ieie.dpuf
									$total = mysql_num_rows($sql);
									$paginas = (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);

									if (isset($_GET['pagina'])) {

									$pagina = (int)$_GET['pagina'];

									} else {

									$pagina = 1;

									}

									$pagina = max(min($paginas, $pagina), 1);

									$inicio = ($pagina - 1) * $_BS['PorPagina'];

									$sql = "SELECT * FROM usuario LIMIT ".$inicio.", ".$_BS['PorPagina']."";

									$query = mysql_query($sql);
									 
									echo "<div id = 'tabela_1' align = 'center'>";
									echo "<table border='2px' id = 'tab_1' align = 'center'>";
									            echo "<tr><th padding = '72px'>Nome</th><th padding = '2px'>Aprovação</th>";
									while($resultado = mysql_fetch_array($query)){
									    echo "<tr>";
									    
									    echo"<td style= 'width: 150px; padding: 10px; border: 2px;'><a href='?id_usuario=".$resultado['id_usuario']."#!/page_Cadastro'</a>" . $resultado['nome'] ."</td>";
									    echo"<td style= 'width: 150px; padding: 10px; border: 2px;'>" . $resultado['aprovacao'] ."</td>";
									    echo "</tr>";
									}
									echo "<br>";
									echo"</table>";
									echo "</div>";

									// comeca exibicao dos paginadores
									if ($total > 0) {
									echo "<div id = 'tabela_1' align = 'center'>";
										for($n = 1; $n <= $paginas; $n++) {
										echo "<a href='?pagina=".$n."#!/page_Usuarios'>".$n."</a>&nbsp;&nbsp;";
										}
									echo "</div>";
									}

									?>
							
							</div>
						</div>
					</li>

					<!===========================================PAGINA CONTATO   =======================================================>

					<li id="page_Contact">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<div class="wrapper">
									<div class="col1">
										<h2>Contato</h2>
										<p><strong>Associação Atlética Banco do Brasil<br>
												Rua: Conda - Maria Goretti<br>
												CEP: 89.801-130  - Chapecó-SC<br>
												Telefone: (49) 3322 -1140</strong></p>
												E-mail: aabb@aabb.com.br
									</div>
								</div>
								  

							</div>
						</div>
					</li>
					<li id="page_More">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<div class="wrapper">
									<h2>Read more</h2>
									<p><strong>Lorem ipsum dolor sit amet, consectetur</strong> adipisicing elit, sed do eiusmod tempor inciddunt ut labore et dolore magna aliqua nostrud exercitation. Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolorreprehenderit in voluptate velit esse cillum dolore. Duis aute irure dolorreprehenderit in voluptate.</p>
									<div class="wrapper pad_bot1">
										<figure class="left marg_right1"><img src="images/page2_img1.jpg" alt=""></figure>
										<p class="pad_bot1"><strong>Ullamco laboris nisi</strong> ut aliquip ex ea commodo consequat. Duis aute irure dolorreprehenderit in voluptate velit esse cillum dolore.</p>
										<p class="pad_bot1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inciddunt ut.</p>
									</div>
									<p class="pad_bot1"><strong>At vero eos et accusamus et iusto odio dignissimos</strong> ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inciddunt ut labore et dolore magna aliqua nostrud exercitation. Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolorreprehenderit in voluptate velit esse cillum dolore. Duis aute irure dolorreprehenderit in voluptate.</p>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</article>
			<!--content end-->
		</div>
	</div>
	<div class="block"></div>
</div>
<ul class="pagination">
							<li class="current">
							 <a href="images/editado1.jpg"></a></li>
							</a></li>
						</ul>
<div class="spinner"></div>	

<script>
$(window).load(function() {	
$('.spinner').fadeOut();
$('body').css({overflow:'inherit'})
 })
 </script>
</body>
</html>

