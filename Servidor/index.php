<?php
	session_start();
	include_once "functions.php";
	if(isset($_SESSION['logado'])){
		if($_SESSION['logado'] != 1)
			header("Location:login.php");
	}
	else{
		header("Location:login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
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
									<div class="wrapper"> 
										<label for="quadra"> Quadra:</label> 
										<select class="combo" name="escolhequadra" value="Quadra">
												<option value "0">Selecione a quadra:</option>
												<option value "1">Quadra Tenis 1</option> 
												<option value="2">Quadra Tenis 2</option>
												<option value="3">Quadra Futebol 7</option>
												<option value="4">Quadra Voleibol</option> 
											</select>		
									</div>
									<div id="data-reserva" class="clearfix">
										<div class="wrapper input-date"> 
											<label for="dt_nasc">Data:</label>
											<input class="input" type="date">
										</div>
									</div>
									<div class="table">
										<table>
											<thead>
												<tr>
													<th class="bg"></th>
													<th><strong>Domingo</strong></th>
													<th class="bg"><strong>Segunda</strong></th>
													<th><strong>Terça</strong></th>
													<th class="bg"><strong>Quarta</strong></th>
													<th><strong>Quinta</strong></th>
													<th class="bg"><strong>Sexta</strong></th>
													<th><strong>Sábado</strong></th>
												</tr>
											</thead>
											<?php
												include_once "funcoesreserva.php";
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
								<form name="CadForm" id="Form" method="post" action="" onSubmit="return validaform('formcont');">
								
								<?php
									$estado = "Estado"; 
									if(isset($_SESSION['id_usuario'])){
										$query = "SELECT * FROM usuario WHERE id_usuario = $_SESSION[id_usuario]";
										$teste = conectadb();
									

										$result = query($query, $teste);
										if(mysql_num_rows($result) > 0){
											$rows = mysql_fetch_assoc($result);
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
										<input class="input" <?php echo ("value= '$nome'") ?> type="text" id="nome" onblur="validaName('nome');" onFocus="limpa_campo('nome');" >
									</div>

									<div class="wrapper"> 
										<label for="sobrenome">Sobrenome:</label> 
										<input class="input" <?php echo ("value= '$sobrenome'") ?> type="text" id="sobre" onblur="validaName('sobre');" onFocus="limpa_campo('sobre');" >
									</div>
									
									<div class="wrapper"> 
										<label for="apelido"> Apelido: </label> 
										<input class="input" <?php echo ("value= '$apelido'") ?> type="text" id="apelido" onblur="validaName('apelido');" onFocus="limpa_campo('apelido');">
									</div>

									<div class="wrapper"> 
										<label for="cpf">CPF:</label>
										<input class="input" <?php echo ("value= '$cpf'") ?> type="text" id="cpf" onblur="valida_Cpf('cpf');" onFocus="limpa_campo('cpf');" >
									</div>

									<div class="wrapper">
										<label for="rg">RG:</label>
										<input class="input" <?php echo ("value= '$rg'") ?> type="text" id="rg" onblur="validaName('rg');" onFocus="limpa_campo('rg');" >
									</div>
									<div id="datas" class="clearfix">
										<div class="wrapper input-data"> 
											<label for="dt_nasc">Data Nasc:</label>
											<input class="input" <?php echo ("value= '$dt_nasc'") ?> type="date">
										</div>
										
										<div class="wrapper input-data"> 
											<label for="dt_assoc">Data Assoc:</label>
											<input class="input" <?php echo ("value= '$dt_assoc'") ?> type="date">
										</div>
									</div>

									<div class="wrapper">
										<label for="logradouro">Endereço:</label>
										<input class="input" <?php echo ("value= '$logradouro'") ?> type="text" id="ender" onblur="validaName('ender');" onFocus="limpa_campo('ender');" >
									</div>

									<div id="cidade-estado" class="clearfix">
										<div class="wrapper input-cidade"> 
											<label for="cidade">Cidade:</label> 
											<input class="input" <?php echo ("value= '$cidade'") ?> type="text" name="cidade" id="cidade" onblur="validaName('cidade');" onFocus="limpa_campo('cidade');" >
										</div>

										<div class="wrapper input-estado"> 
											<label for="estado">Estado:</label>
											<select name="escolheestado" <?php echo ("value= '$estado'") ?>>
											
												<option value "AC">AC</option> 
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
											<input class="input" <?php echo ("value= '$telefone'") ?> type="text" id="fone" onblur="validaName('fone');" onFocus="limpa_campo('fone');">
										</div>
										
										<div class="wrapper input-telefone">
											<label for="telefone">Celular:</label>
											<input class="input" <?php echo ("value= '$celular'") ?> type="text" id="cel" onblur="validaName('cel');" onFocus="limpa_campo('cel');" >
										</div>
									</div>

									<div class="wrapper">
										<label for="email">E-mail:</label>
										<input class="input" <?php echo ("value= '$email'") ?> type="text" id="email" onblur="validaName('email');" onFocus="limpa_campo('email');" >
									</div>


									<div class="wrapper"> 
										<label for="login"> Login:</label> 
										<input class="input" <?php echo ("value= '$login'") ?> type="text" id="login" onblur="validaName('login');" onFocus="limpa_campo('login');" >
									</div>

									<div class="wrapper">
										<label for="senha">Senha:</label>
										<input class="input" <?php echo ("value= '$senha'") ?> type="password" id="senha" onFocus="limpa_campo('senha');" >
									</div>

								</form>
													
								<input type="submit" value="Enviar Informações" value="Place order" class = "enviar_">
										
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
					
					<!===========================================PAGINA CADASTRO DE MODALIDADES  =======================================================>
					
					<li id="page_Quadra">
						<div class="box1">
							<div class="inner">
								<a href="#" class="close" data-type="close"><span></span></a>
								<h2>Cadastro de Quadras</h2>
								<form name="ReservForm" id="Form" method="post" action="" onSubmit="return validaform('formcont');">
									
									<div class="wrapper"> 
										<label for="nome"> Modalidade:</label>
										<?php
												$rs = mysql_query("SELECT * FROM modalidade");
												montaCombo("escolhemodalidade", $rs, "id_modalidade", "desc_modalidade");
										?>
									</div>
									
									<div class="wrapper"> 
										<label for="nome"> Quadra:</label> 
										<input class="input" type="text" value="" onblur="if(this.value=='') this.value='Quadra'" onFocus="if(this.value =='Quadra' ) this.value=''" >
									</div>
									
									<div id="data-reserva" class="clearfix">									
										<div class="wrapper input-time"> 
											<label for="dt_assoc">Horário Base:</label>
											<input class="input" type="time">
										</div>
										<div class="wrapper input-time"> 
											<label for="dt_assoc">Horário Inicio:</label>
											<input class="input" type="time">
										</div>
										<div class="wrapper input-time"> 
											<label for="dt_assoc">Horário Fim:</label>
											<input class="input" type="time">
										</div>
									</div>
										
								</form>
													
								<input type="submit" value="Cadastrar" value="Place order" class = "enviar_">
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
								    <div class="wrapper">
									<iframe width="400" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/ms?t=h&amp;msa=0&amp;msid=205805511263589055805.0004f9f4638a25cb9a954&amp;source=embed&amp;ie=UTF8&amp;ll=-27.099973,-52.608547&amp;spn=0.011461,0.012875&amp;z=15&amp;output=embed"></iframe><br /><small>Visualizar <a href="https://www.google.com/maps/ms?t=h&amp;msa=0&amp;msid=205805511263589055805.0004f9f4638a25cb9a954&amp;source=embed&amp;ie=UTF8&amp;ll=-27.099973,-52.608547&amp;spn=0.011461,0.012875&amp;z=15" style="color:#0000FF;text-align:left">AABB - Chapecó-SC</a> em um mapa maior</small>
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
>>>>>>> 61131e6f8566fc1d9afaf4fa4194e8a60aca58d5
</html>

