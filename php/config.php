<?php


///servidor de dados
	$servidor="127.0.0.1";
	$usuario="root";
	$senha="";

	
	$cnpj="";
	$razao_social="";

	$conexao=mysql_connect($servidor,$usuario,$senha)  or die(mysql_error());

	date_default_timezone_set('America/Sao_Paulo');
	$inicio=date("d/m/Y H:i:s");



$set=mysql_select_db('nico',$conexao);
$set=mysql_query("SET GLOBAL event_scheduler = ON;");
$set=mysql_query("SET @@global.event_scheduler = ON;");
	
	
	
	
	

?>
