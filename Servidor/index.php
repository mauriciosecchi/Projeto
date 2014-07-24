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
<?php
	/* Responsavel por fazer a exclusao da reserva */
	if(isset ($_POST['exclui'])){
		if($_SESSION['reserva_id'] != 0){
			$sql = "DELETE FROM reserva WHERE id_reserva ='" .$_SESSION['reserva_id']."'";
			mysql_query($sql);
		}
	}
?>
<?php
	/* É executado caso o botao Relatio for acionado, opção só para o perfil administrador */
	if(isset($_POST['submit_relatorio'])){
		require_once "relatorio.php";
	}
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
 
  
<!-- Exibe combo quadras na tela de Visualização de reservas -->
<script type="text/javascript">
    $(document).ready(function () {
        
		var view = <?php echo $_SESSION['logado']?>;
		var tp_usuario = <?php echo $_SESSION['tipo_usuario']?>;
		
		if(tp_usuario == 1){
			$("#home").show();
			$("#reservas").show();
			$("#cadastro").show();
			$("#reservar").hide();
			$("#modalidade").show();
			$("#quadra").show();
			$("#usuarios").show();
			$("#contato").show();
			$("#sair").show();
		}else if(view == 1){
			$("#home").show();
			$("#reservas").show();
			$("#cadastro").show();
			$("#reservar").hide();
			$("#modalidade").hide();
			$("#quadra").hide();
			$("#usuarios").hide();
			$("#contato").show();
			$("#sair").show();
		}else if(view == 0){
			$("#home").show();
			$("#reservas").hide();
			$("#cadastro").show();
			$("#reservar").hide();
			$("#modalidade").hide();
			$("#quadra").hide();
			$("#usuarios").hide();
			$("#contato").show();
			$("#sair").show();
		} 
    });
</script>
<!--Controla os menus conforme o tipo de usuario e se está logado ou não -->
	
<script type="text/javascript">
	$(document).ready(function(){
		$("#tabreserva").hide();
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

<!-- Exibe tabela de reservas tela de Visualização de reservas -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#quadras").change( function() {
			var valor = $(this).val();
			$("#exibe1").hide();
			$("#exibe").hide();
			$.post("exibir.php", {dados: valor}, function(msg){
				if (msg != ''){
					$("#exibe").html(msg).show();	
				}
				else{
					$("#exibe").html('Sem Resultados');
				}		
			});
		});
	});
</script>

<!-- Seleciona modalidade para mostrar quadras -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#exibemodalidade").change( function() {
			var valor = $(this).val();
			$.post("exibirquadras.php", {dados: valor}, function(msg){
				if (msg != ''){
					$("#mostrar").html(msg).show();	
				}
				else{
					$("#mostrar").html('Sem Resultados');
				}		
			});
		});
	});
</script>

<!-- Avança e volta paginas na tela de Visualização de reservas -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#next").click( function(){ 
			$("#modalidades").attr('selected','selected');
			$("#quadras").attr('selected','selected');
			$("#exibe").hide();
			var quadras = $('#quadras').val();
			$.post("exibir.php", {dados: quadras, soma: 7}, function(msg){
				if (msg != ''){
					$("#exibe1").html(msg).show();	
				}
				else{
					$("#exibe1").html('Sem Resultados');
				}		
			});
		});	
		
		$("#previous").click( function(){ 
			$("#modalidades").attr('selected','selected');
			$("#quadras").attr('selected','selected');
			var quadras = $('#quadras').val();
			$("#exibe").hide();
			$.post("exibir.php", {dados: quadras, soma: -7}, function(msg){
				if (msg != ''){
					$("#exibe1").html(msg).show();	
				}
				else{
					$("#exibe1").html('Sem Resultados');
				}		
			});
		});	
		
		
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
						<li id="modalidade"><a href="#!/page_Modalidade"><span></span><strong>Modalidades</strong></a></li>
						<li id="quadra"><a href="#!/page_Quadra"><span></span><strong>Quadras</strong></a></li>
						<li id="usuarios"><a href="#!/page_Usuarios"><span></span><strong>Usuarios</strong></a></li>
						<li id="contato"><a href="#!/page_Contact"><span></span><strong>Contato</strong></a></li>
						<li id="sair"><a href="login.php"><span></span><strong>Sair</strong></a></li>
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
										<p class="quot"> 
											A AABB fundada em xxxx, conta com uma infraestrutura completa para seus sócios dentre eles Piscinas, Quadras de Tenis, Quadra de Futebol de Salão, <img src="images/quot2.png" alt="">
										</p>
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
								
								<h2>Reservas</h2>
								<form name="visuForm" id="Form" action="" method="post">
									
									<div class="mod-combo">
										<div class="wrapper">
											<label for="nome"> Modalidade:</label>
											<?php  
											   $rs = mysql_query("SELECT * FROM modalidade");
											   montaCombo("modalidades", $rs, "id_modalidade", "desc_modalidade");
											 ?>
										</div>

										<div class="wrapper">
											<label for="quadras"> Quadras:</label>
											<select class="combo" id="quadras" name="quadra" >Quadras:
												<option value ='-1'>Nenhuma quadra localizada</option>
											</select>	
										</div>
									</div>	
									<div id = "relat">
									<form action="" name="imprimeRelat" method="post">
									<?php
										if($_SESSION['tipo_usuario'] == 1){
											echo "<input type='submit' name= 'submit_relatorio' value='Relatório'>";
										}
									?>
								</div>
								</form>											
								</form>
								<div>
									<input id="previous" type="image" src="images\left_grey.png" name="left" width="36" height="36" align="left">
									<input id="next" type="image" src="images\right_grey.png" name="left" width="36" height="36" align="right" >
								</div>
								<div class="table" id="exibe">		
								</div>
								<div class="table" id="exibe1">		
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
								<form name="CadForm" id="Form" method="post" action="index.php"  onsubmit=" return valida_envia();">
								
								<?php
									/* Realiza consulta dos campos do cadastro do usuario selecionado na tela de usuarios
									 *	caso o usuário tenha perfil administrado, senão exibe as informações do usuário que está logado
									 *  no sistema, se for cadastro novo exibe em branco 
									 */
									if(isset($_SESSION['tipo_usuario'])){
										$estado = "estado"; 
										
										if (isset($_GET['id_temp_user'])) {
											$_SESSION['id_temp_user'] = $_GET['id_temp_user'];
											$query = "SELECT * FROM usuario WHERE id_usuario=$_GET[id_temp_user]";									
											
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
									if($_SESSION['logado'] == 0){
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
										<input class="input" <?php echo ("value= '$nome'") ?> obrigatorio="1" type="text" name="nome" id="nome" >
									</div>

									<div class="wrapper"> 
										<label for="sobrenome">Sobrenome:</label> 
										<input class="input" <?php echo ("value= '$sobrenome'") ?> obrigatorio="1" type="text" name="sobre" id="sobre" >
									</div>
									
									<div class="wrapper"> 
										<label for="apelido"> Apelido: </label> 
										<input class="input" <?php echo ("value= '$apelido'") ?> obrigatorio="1" type="text" name="apelido" id="apelido">
									</div>

									<div class="wrapper"> 
										<label for="cpf">CPF:</label>
										<input class="input" <?php echo ("value= '$cpf'") ?> obrigatorio="1" type="text" name="cpf" id="cpf" onblur="valida_Cpf('cpf');" onFocus="limpa_campo('cpf');">
									</div>

									<div class="wrapper">
										<label for="rg">RG:</label>
										<input class="input" <?php echo ("value= '$rg'") ?> obrigatorio="1" type="text" name="rg" id="rg" >
									</div>
									<div id="datas" class="clearfix">
										<div class="wrapper input-data"> 
											<label for="dt_nasc">Data Nasc:</label>
											<input class="input" <?php echo ("value= '$dt_nasc'") ?> obrigatorio="1" name="dt_nasc" id="dt_nasc" type="date">
										</div>
										
										<div class="wrapper input-data"> 
											<label for="dt_assoc">Data Assoc:</label>
											<input class="input" <?php echo ("value= '$dt_assoc'") ?>obrigatorio="1" name="dt_assoc" id="dt_assoc" type="date">
										</div>
									</div>

									<div class="wrapper">
										<label for="logradouro">Endereço:</label>
										<input class="input" <?php echo ("value= '$logradouro'") ?> obrigatorio="1" type="text" name="ender" id="ender" >
									</div>

									<div id="cidade-estado" class="clearfix">
										<div class="wrapper input-cidade"> 
											<label for="cidade">Cidade:</label> 
											<input class="input" <?php echo ("value= '$cidade'") ?> type="text" name="cidade" id="cidade" >
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
											<input class="input" <?php echo ("value= '$telefone'") ?>obrigatorio="1" type="text" name="fone" id="fone" >
										</div>
										
										<div class="wrapper input-telefone">
											<label for="telefone">Celular:</label>
											<input class="input" <?php echo ("value= '$celular'") ?> type="text" name="cel" id="cel" >
										</div>
									</div>

									<div class="wrapper">
										<label for="email">E-mail:</label>
										<input class="input" <?php echo ("value= '$email'") ?> obrigatorio="1" type="text" name="email" id="email" >
									</div>


									<div class="wrapper"> 
										<label for="login"> Login:</label> 
										<input class="input" <?php echo ("value= '$login'") ?> obrigatorio="1" type="text" name="login" id="login" >
									</div>

									<div class="wrapper">
										<label for="senha">Senha:</label>
										<input class="input" <?php echo ("value= '$senha'") ?> obrigatorio="1" type="password" name="senha" id="senha" >
									</div>

									<div class="wrapper">
										
									<?php
										/* Se for usuario com perfil admistrador que está logado é exibido opção para aprovar cadastros */
										
										if($_SESSION['tipo_usuario'] == 1){
											echo "<label for='status'>Situação:</label>";
											echo("<select name='aprova' class='combo' id='aprova'>");
											if ($aprovacao==1)
											{
												echo("t<option value='1' selected >ATIVO</option>");
												echo("t<option value='0' >INATIVO</option>");
											}
											else
											{
											  echo("t<option value='1' >ATIVO</option>");
											  echo("t<option value='0' selected >INATIVO</option>");
											}
											echo("</select>");
										}
										
									?>
									</div>
									  <input type="submit" id="submit" name= "submit" value="Enviar">
									  

								
							
									<?php
										/* Verificar se for realizado submit do cadastro e realiza inserção no banco de dados
										 * caso o usuario seja administrador pode realizar atualizações no outro usuario sendo que
										 * o id do outro usuario é recebido pela sessão na variavel 'id_temp_user', senão pega o id do
										 * usuario que está logado no sistema.
										 */
										if (isset($_POST['submit'])) {
											if(isset($_SESSION['tipo_usuario'])){
												if (isset($_SESSION['id_temp_user'])) {
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
													aprovacao = $_POST[aprova],
													apelido ='$_POST[apelido]'
													WHERE id_usuario = $_SESSION[id_temp_user]";
												}else if(isset($_SESSION['id_usuario'])){
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
													WHERE id_usuario = $_SESSION[id_usuario]";
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
													`tipo_usuario`,												
													`sobrenome`,
													`aprovacao`,
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
													 0,
													 '$_POST[sobre]', 
													 0,
													 '$_POST[fone]', 
													 '$_POST[cel]', 
													 '$_POST[login]', 
													 '$_POST[apelido]')";
												}
											}
											if(isset($sql)){
												mysql_query($sql);
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
								<form name="ReservForm" id="Form" method="post" action="index.php#!/page_Reservas" onSubmit="return validaform('formcont');">
								
									<?php
										/* Consulta a reserva selecionada para exibir as informações na tela de cadastro de reservas */
										$reserva_modalidade = '';
										$reserva_quadra = '';
										$reserva_data = date("Y-m-d");
										$reserva_hora = converterHora(1222);
										$reserva_nome = '';

										if(isset($_SESSION['id_usuario']) and (isset($_SESSION['reserva_data']))){
											$sql = "SELECT nome FROM usuario WHERE id_usuario = $_SESSION[id_usuario]";
											$result = mysql_query($sql);
											$linha = mysql_fetch_assoc($result);
											$reserva_nome = $linha['nome'];
											$sql = "SELECT desc_quadra, desc_modalidade FROM quadra join modalidade on modalidade.id_modalidade = quadra.id_modalidade WHERE id_quadra = $_SESSION[reserva_quadra_id]";
											$result = mysql_query($sql) or die (mysql_error()); 
											$linha = mysql_fetch_assoc($result);
											$reserva_modalidade = $linha['desc_modalidade'];
											$reserva_quadra = $linha['desc_quadra'];
											$reserva_data = date("Y-m-d", $_SESSION['reserva_data']);
											$reserva_hora = converterHora($_SESSION['reserva_hora']);
											$sql = "SELECT obs FROM reserva WHERE id_reserva = $_SESSION[reserva_id]";
											$result = mysql_query($sql) or die (mysql_error()); 
											$linha = mysql_fetch_assoc($result);
											$obs = $linha['obs'];										
						
										}
									?>
									
									<div class="wrapper"> 
										<label for="nome"> Nome:</label> 
										<input class="input" type="text" <?php echo ("value= '$reserva_nome'") ?> disabled="disabled" onblur="if(this.value=='') this.value='Nome'" onFocus="if(this.value =='Nome' ) this.value=''" >
									</div>
									
									<div class="wrapper"> 
										<label for="modalidades"> Modalidade:</label> 
										<input class="input" type="text" <?php echo ("value= '$reserva_modalidade'") ?> disabled="disabled" onblur="if(this.value=='') this.value='Modalidade'" onFocus="if(this.value =='Modalidade' ) this.value=''" >
									</div>
									
									<div class="wrapper"> 
										<label for="quadra"> Quadra:</label> 
										<input class="input" type="text" <?php echo ("value= '$reserva_quadra'") ?> disabled="disabled" onblur="if(this.value=='') this.value='Quadra'" onFocus="if(this.value =='Quadra' ) this.value=''" >
									</div>

									<div id="data-reserva" class="clearfix">
									<div class="wrapper"> 
										<label for="date">Data:</label> 
										<input class="input" id = "date" name = "date" type="text" <?php echo ("value= '$reserva_data'") ?> disabled="disabled" onblur="if(this.value=='') this.value='Data'" onFocus="if(this.value =='Data' ) this.value=''" >
									</div>
										
										<div class="wrapper"> 
										<label for="hora">Hora:</label> 
										<input class="input" id = "hora" name = "hora" type="text" <?php echo ("value= '$reserva_hora'") ?> disabled="disabled" onblur="if(this.value=='') this.value='hora'" onFocus="if(this.value =='hora' ) this.value=''" >
									</div>
									</div>

									<div class="wrapper1">
										<label for="obs">Observação:</label>										
										<input type="text" class="input" name = 'obs' cols="50" rows="3" <?php echo ("value= '$obs'")?> >	
									</div>
									<input type="submit" name= "submit_reserva" value="Enviar">
									<input type="submit" name = "exclui" value = "Cancelar Reserva">
								</form>

								<?php
									
									/* Insere reserva selecionada */
									$id_usuario = $_SESSION['id_usuario'];
									$id_quadra = $_SESSION['reserva_quadra_id'];
									$id = $_SESSION['reserva_id'];
									
									if (isset($_POST['submit_reserva'])) {
										$obs = $_POST['obs'];
														
										if (isset($_SESSION['id_usuario'])){											
											$sql = "INSERT INTO reserva (id_usuario, id_quadra, desc_reserva, obs, dt_reserva, horario) VALUES ('" . $id_usuario . "','" . $id_quadra . "', '" . $reserva_quadra . "', '" . $obs . "', '" . $reserva_data . "', '" . $reserva_hora . "')" ;
											mysql_query($sql);											
										}
									}
								?>
									
											
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
										<label for="nome"> Modalidade:</label> 
										<input class="input" type="text" value="" name="modalidade" id="modalidades" onblur="validaName('modalidade');" onFocus="limpa_campo('modalidade');">
									</div>
									
									<div class="wrapper"> 
										<input type="submit" name="submitModalidade" value="Enviar">
									</div>
									
									
									
								</form>
								
								<?php
									/* Na inserção da modalidade, chama a função insereModalidade() que está no arquivo function.php */	
									if(isset($_POST['submitModalidade'])){
										insereModalidade($_POST);
										echo "<script type='text/javascript'> alert('Dados inseridos com sucesso!') </script>";	
									}	
								?>
								
								<?php
									include_once "listarmodalidades.php";
									exibirmodalidades();
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
								<form name="QuadraForm" id="Form" method="POST" action="index.php" onSubmit="">
									
									<div class="wrapper"> 
										<label for="nome"> Modalidade:</label>
										<?php
											$rs = mysql_query("SELECT * FROM modalidade");
											montaCombo("modalidades", $rs, "id_modalidade", "desc_modalidade");
										?>
									</div>
									
									<div class="wrapper"> 
										<label for="quadra"> Quadra:</label> 
										<input class="input" type="text" value="" name="quadra" id="quadras" onblur="validaName('quadra');" onFocus="limpa_campo('quadra');">
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
									/* Na inserção da quadra, chama a função insereQuadra() que está no arquivo function.php */
									if(isset($_POST['submitQuadra'])){
										insereQuadra($_POST);
										echo "<script type='text/javascript'> alert('Dados inseridos com sucesso!') </script>";
											
									}
									/* Lista as quadras disponiveis de acordo com a Modalidade selecionada no combo */
									echo"<h2>Lista de Quadras por Modalidade</h2>";			
									echo"<label for='nome'> Modalidade:</label>";
									$rs = mysql_query("SELECT * FROM modalidade");
									montaCombo("exibemodalidade", $rs, "id_modalidade", "desc_modalidade", '');									
								?>	
								<div class="tablevini" id="mostrar">
											
								</div>
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
									 
									echo "<div class = 'tabelapadrao' align = 'center'>";
									echo "<table border='2px' class = 'tab' align = 'center'>";
									            echo "<tr><th padding = '72px'>Nome</th><th padding = '2px'>Aprovação</th>";
									while($resultado = mysql_fetch_array($query)){
									    echo "<tr>";
									    
									    echo"<td style= 'width: 150px; padding: 10px; border: 2px;'><a href='?id_temp_user=".$resultado['id_usuario']."#!/page_Cadastro'</a>" . $resultado['nome'] ."</td>";
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

