<?php

	include "php.php";
	
	$table="cad_turma_alunos";
	$campos="cod_aluno,cod_turma";
	$values="'".$_POST['cod_aluno']."','".$_POST['cod_turma']."'";
	$msg="S";
	
	$sql=new sql;
	$sql->insert($table,$campos,$values,$msg);

	
	$html=new html;
	echo $html->lista_turma_mod_3($_POST['cod_turma']);

?>