<html><head><title>Canal I�ara - Login</title>
<!DOCTYPE html PUBLIC><html xmlns="http://www.w3.org/1999/xhtml">
<!--[if IE 9]><html class="lt-ie10" lang="pt-br" > <![endif]-->
<HEAD><META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.canalicara.com/portal/css/normalize.css">
<link rel="stylesheet" href="https://www.canalicara.com/portal/css/foundation.css">
<link rel="stylesheet" href="https://www.canalicara.com/portal/css/app.css">
<script src="https://www.canalicara.com/portal/js/vendor/jquery.js"></script>
<script src="https://www.canalicara.com/portal/js/foundation/foundation.js"></script>
<script src="https://www.canalicara.com/portal/js/foundation.min.js"></script>
</HEAD><BODY>

<div class="row" align=center><div class="small-12 columns" align=center>

<fieldset><legend>Painel de controle</legend><label><a href='https://www.canalicara.com/admin'><font color=#cc0000>

<?php
require "portal_config_bdconnect.php";
session_start();

// Recupera o login e senha (com criptografia)
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

// Usu�rio n�o forneceu a senha ou o login
if(!$login || !$senha)	{	echo "Digite a senha e login!";	exit;	}

// Executa a consulta no banco de dados.
$sql = "SELECT id, nome, login, senha, nivel FROM admin_usuarios WHERE login = '" . $login . "' AND ativo = 'S'";
$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
$total = mysqli_num_rows($res);

// Caso o usu�rio tenha digitado um login v�lido o n�mero de linhas ser� 1..
if($total)	{

    // Obt�m os dados do usu�rio, para poder verificar a senha e passar os demais dados para a sess�o
    $dados = mysqli_fetch_array($res);

    // Agora verifica a senha
    if(strcmp($senha, $dados["senha"]))	{
        // TUDO OK! Agora, passa os dados para a sess�o e redireciona o usu�rio
        $_SESSION["id_usuario"]		= $dados["id"];
        $_SESSION["nome_usuario"]	= stripslashes($dados["nome"]);
        $_SESSION["login"]		    = stripslashes($dados["login"]);
        $_SESSION["nivel"]		    = $dados["nivel"];
        header("Location: portal_admin.php");
        exit;
    }
    // Senha inv�lida
	else	{	echo "Senha inv�lida!";	exit;	}
}

// Login inv�lido
else	{	echo "Usu�rio n�o cadastrado!";	exit;	}

?></a></font></label></fieldset></div></div>