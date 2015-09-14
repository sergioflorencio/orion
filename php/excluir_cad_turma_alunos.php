<?php

	include "php.php";
	$table="cad_turma_alunos";
	$where="cod_turma_alunos='".$_POST['cod_turma_alunos']."'";
	$msg="N";

	
	$sql=new sql;
	$sql->delete($table,$where,$msg);
	
	//var_dump($_POST);
	$html=new html;
	echo $html->lista_turma_mod_3($_POST['cod_turma']);
	



?>