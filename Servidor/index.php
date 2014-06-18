<?php
	session_start();
	
	if(isset($_SESSION['logado'])){
		if($_SESSION['logado'] != 1)
			header("Location:login.php");
	}
	else{
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
						<li><a href="#!/page_Home"><span></span><strong>Home</strong></a></li>
						<li><a href="#!/page_Reservas"><span></span><strong>Reservas</strong></a></li>
						<li><a href="#!/page_Cadastro"><span></span><strong>Cadastro</strong></a></li>
						<li><a href="#!/page_CadReservas"><span></span><strong>Reservar</strong></a></li>
						<li><a href="#!/page_Quadra"><span></span><strong>Quadras</strong></a></li>
						<li><a href="#!/page_Contact"><span></span><strong>Contato</strong></a></li>
						
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
									<form action="" method="post">
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
								<form name="CadForm" id="Form" method="post" action="index.php#!/page_Home" >
								
								<?php
									$estado = "estado"; 
									if(isset($_SESSION['id_usuario'])){
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
										}
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
											<select name="estado" <?php echo ("value= '$estado'") ?>>
												<option value="AC">AC</option> 
												<option value="AL">AL</option>
												<option value="AP">AP</option>
												<option value="AM">AM</option> 
												<option value="BA">BA</option>
												<option value="CE">CE</option>
												<option value="DF">DF</option>
												<option value="ES">ES</option>
												<option value="GO">GO</option>
												<option value="MA">MA</option>
												<option value="ME">MT</option>
												<option value="MS">MS</option>
												<option value="MG">MG</option>
												<option value="PA">PA</option>
												<option value="PB">PB</option>
												<option value="PR">PR</option>
												<option value="PE">PE</option>
												<option value="PI">PI</option>
												<option value="RJ">RJ</option>
												<option value="RN">RN</option>
												<option value="RO">RO</option>
												<option value="RR">RR</option>
												<option value="RS">RS</option>
												<option value="SC">SC</option>
												<option value="SP">SP</option>
												<option value="SE">SE</option>
												<option value="TO">TO</option>
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
	
									if ($nome && $sobrenome && $apelido && $cpf && $rg && $dt_nasc && $dt_assoc && $logradouro && $cidade && $estado && $telefone && $celular && $email && $login && $senha) {
										
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
												montaCombo("escolhemodalidade", $rs, "id_modalidade", "desc_modalidade", '');
										?>
									</div>
									
									<div class="wrapper"> 
										<label for="nome"> Quadra:</label>
										<?php
												$rs = mysql_query("SELECT * FROM quadra q JOIN modalidade m WHERE q.id_modalidade = m.id_modalidade");
												montaCombo("escolhequadra", $rs, "id_quadra", "desc_quadra", '');
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
					
					<!===========================================PAGINA CADASTRO DE MODALIDADES  =======================================================>
					
					<li id="page_Quadra">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<h2>Cadastro de Quadras</h2>
								<form name="ReservForm" id="Form" method="POST" action="index.php#!/page_Home" onSubmit="">
									
									<div class="wrapper"> 
										<label for="nome"> Modalidade:</label>
										<?php
												$rs = mysql_query("SELECT * FROM modalidade");
												montaCombo("modalidade", $rs, "id_modalidade", "desc_modalidade", '');
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
									<input type="submit" name="submit" value="Enviar">
								</form>
								
								
								<! aqui tem problema, onde esta comentado nesse php >
								
								<?php

								//	if(isset($_POST['submit'])){
								//		insereModalidade($_POST);
								//		echo "<script type='text/javascript'> alert('Dados inseridos com sucesso!') </script>";
										
								//	}	
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