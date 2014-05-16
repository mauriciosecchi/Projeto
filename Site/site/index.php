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
				<h1><a href="index.html" id="logo"></a></h1>
				<nav class="menu">
					<ul id="menu">
						<li><a href="#!/page_Home"><span></span><strong>Home</strong></a></li>
						<li><a href="#!/page_Reservas"><span></span><strong>Reservas</strong></a></li>
						<li><a href="#!/page_Cadastro"><span></span><strong>Cadastro</strong></a></li>
						<li><a href="#!/page_CadReservas"><span></span><strong>Reservar</strong></a></li>
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
								
									<div class="wrapper"> 
										<label for="id"> ID: </label> 
										<input class="input" type="text" value="ID"  onblur="if(this.value=='') this.value='ID'" onFocus="if(this.value =='ID' ) this.value=''" >
									</div>
									
									<div class="wrapper"> 
										<label for="nome"> Nome:</label> 
										<input class="input" type="text" value="Nome"  onblur="if(this.value=='') this.value='Nome'" onFocus="if(this.value =='Nome' ) this.value=''" >
									</div>

									<div class="wrapper"> 
										<label for="sobrenome">Sobrenome:</label> 
										<input class="input" type="text" value="Sobrenome"  onblur="if(this.value=='') this.value='Sobrenome'" onFocus="if(this.value =='Sobrenome' ) this.value=''" >
									</div>
									
									<div class="wrapper"> 
										<label for="cpf">CPF:</label>
										<input class="input" type="text" value="CPF" onblur="if(this.value=='') this.value='CPF'" onFocus="if(this.value =='CPF' ) this.value=''" >
									</div>

									<div class="wrapper">
										<label for="rg">RG:</label>
										<input class="input" type="text" value="RG"  onblur="if(this.value=='') this.value='RG'" onFocus="if(this.value =='RG' ) this.value=''" >
									</div>
									<div id="datas" class="clearfix">
										<div class="wrapper input-data"> 
											<label for="dt_nasc">Data Nasc:</label>
											<input class="input" type="date">
										</div>
										
										<div class="wrapper input-data"> 
											<label for="dt_assoc">Data Assoc:</label>
											<input class="input" type="date">
										</div>
									</div>

									<div class="wrapper">
										<label for="logradouro">Endereço:</label>
										<input class="input" type="text" value="Endereço"  onblur="if(this.value=='') this.value='Endereço'" onFocus="if(this.value =='Endereço' ) this.value=''" >
									</div>

									<div id="cidade-estado" class="clearfix">
										<div class="wrapper input-cidade"> 
											<label for="cidade">Cidade:</label> 
											<input class="input" type="text" name="cidade" value="Cidade"  onblur="if(this.value=='') this.value='Cidade'" onFocus="if(this.value =='Cidade' ) this.value=''" >
										</div>

										<div class="wrapper input-estado"> 
											<label for="estado">Estado:</label>
											<select name="escolheestado" value="Estado">
												<option value "0">Selec:</option>
												<option value "1">AC</option> 
												<option value="2">AL</option>
												<option value="3">AP</option>
												<option value="4">AM</option> 
												<option value="5">BA</option>
												<option value="6">CE</option>
												<option value="7">DF</option>
												<option value="8">ES</option>
												<option value="9">GO</option>
												<option value="10">MA</option>
												<option value="11">MT</option>
												<option value="12">MS</option>
												<option value="13">MG</option>
												<option value="14">PA</option>
												<option value="15">PB</option>
												<option value="16">PR</option>
												<option value="17">PE</option>
												<option value="18">PI</option>
												<option value="19">RJ</option>
												<option value="20">RN</option>
												<option value="21">RO</option>
												<option value="22">RR</option>
												<option value="23">RS</option>
												<option value="24">SC</option>
												<option value="25">SP</option>
												<option value="26">SE</option>
												<option value="27">TO</option>
											</select>		
										</div>
									</div>
									
									<div id="telefones" class="clearfix">
										<div class="wrapper input-telefone">
											<label for="telefone">Telefone:</label>
											<input class="input" type="text" value="Telefone"  onblur="if(this.value=='') this.value='Telefone'" onFocus="if(this.value =='Telefone' ) this.value=''" >
										</div>
										
										<div class="wrapper input-telefone">
											<label for="telefone">Celular:</label>
											<input class="input" type="text" value="Celular"  onblur="if(this.value=='') this.value='Celular'" onFocus="if(this.value =='Celular' ) this.value=''" >
										</div>
									</div>

									<div class="wrapper">
										<label for="email">E-mail:</label>
										<input class="input" type="text" value="E-mail"  onblur="if(this.value=='') this.value='E-mail'" onFocus="if(this.value =='E-mail' ) this.value=''" >
									</div>

									<div class="wrapper">
										<label for="senha">Senha:</label>
										<input class="input" type="password" value="Password"  onblur="if(this.value=='') this.value='Password'" onFocus="if(this.value =='Password' ) this.value=''" >
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

								<div class="wrapper1">
									<form name="FormContato" id="Form">
									<div>
										<div class="wrapper1"> 
										<label for="nome"> Nome:</label> 
										<input class="input" type="text" value="Nome"  onblur="if(this.value=='') this.value='Nome'" onFocus="if(this.value =='Nome' ) this.value=''" >
									</div>

									<div class="wrapper1"> 
										<label for="sobrenome">Sobrenome:</label> 
										<input class="input" type="text" value="Sobrenome"  onblur="if(this.value=='') this.value='Sobrenome'" onFocus="if(this.value =='Sobrenome' ) this.value=''" >
									</div>
									</div>
									</form>
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

