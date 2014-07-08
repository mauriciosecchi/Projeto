<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer

require("phpmailer/class.phpmailer.php");
// Inicia a classe PHPMailer

 include_once "functions.php";
  $db = conectadb(); 

  //pega a variavel via post
  if (isset($_POST['submit'])) {
  $login = $_POST['login'];
  $email = $_POST['email'];

$confirmacao = mysql_query("SELECT * FROM usuario WHERE login = '$login' AND email = '$email'"); //verifica se o login e a email conferem
  
  while ($row = mysql_fetch_array($confirmacao)) {
    $login = $row["login"]; //adiciona a variavel $login o login do usuario
    $senha = $row["senha"]; //adiciona a variavel $senha a senha do usuario
    $email = $row["email"]; //adiciona a variavel $email o email do usuario
  }
 
$contagem = mysql_num_rows($confirmacao); //traz o resultado da pesquisa acima
 
if ( $contagem == 1 ) {


$mail = new PHPMailer();

$remetente = "email do remetente"; // Aqui vai do email remetente o qual aparecerá no e-mail enviado;
$senharemetente = "senha do remetente"; // senha da conta de e-mail do remetente;

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->SMTPSecure  =  "tls" ;
$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP (mudar o dominio EX: smtp.dominio.com)
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->SMTP_PORT = 587;  
$mail->Username = "$remetente"; // Usuário do servidor SMTP
$mail->Password = "$senharemetente"; // Senha do servidor SMTP

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->From = "$remetente"; // Seu e-mail
$mail->FromName = "AABB"; // Seu nome
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress("$email", "$login" );
$mail->AddAddress("$email");
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
// Define os dados técnicos da Mensagem

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->IsHTML(true); // Define que o e-mail será enviado como HTML

$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)


// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$quebra = "<br>"; 

$mail->Subject  = "Recuperação Senha AABB"; // Assunto da mensagem
$mail->Body = "Senha enviada em " . date("d/m/Y");
$mail->Body .= $quebra; 
$mail->Body .= $quebra; 
$mail->Body .= "Seguem seus dados abaixo: ";
$mail->Body .= $quebra;
$mail->Body .= $quebra;
$mail->Body .= "Seu login é: " . $login ;
$mail->Body .= $quebra;
$mail->Body .= "Sua senha é: " . $senha ;
$mail->Body .= $quebra;
$mail->Body .= $quebra; 
$mail->Body .= "E-mail automático! Não responda este e-mail";

//$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n ";

// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

// Envia o e-mail
$enviado = $mail->Send();

// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultado
      if ($enviado) {
        echo "Sua senha foi enviada com sucesso para o e-mail: " . $email; 

      } else {
        echo "Não foi possível enviar o e-mail.<br /><br />";
        echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
      }
}
}
?>

<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Recuperação de Senha</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset_login.css">
        <link rel="stylesheet" href="assets/css/supersized_login.css">
        <link rel="stylesheet" href="assets/css/style_login.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>-->
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <!--[endif]-->

    </head>
    
    <body>
        <div id="logo">

        </div>    
        <div class="page-container">
            <h1>Recuperar Senha</h1>
            <form action="" method="post">
               <label for="login">Login:</label>
               <input type="text" name="login"><br><br>
               <label for="email">E-mail:</label> 
               <input type="text" name="email" size="50">

               <button type="submit" name="submit">Enviar Dados</button>

           </form>
           
            <!--<a class = "link" href="#">Esqueci minha senha</a>
            <a class = "link" href="#" style="margin-left:65px;" >Cadastre-se</a>-->
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>
</html>