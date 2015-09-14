<?php

	include "php.php";
	
	$table="cad_curriculo_materias";
	$campos="cod_curriculo,cod_materia";
	$values="'".$_POST['cod_curriculo']."','".$_POST['cod_materia']."'";
	$msg="N";
	
	$sql=new sql;
	$sql->insert($table,$campos,$values,$msg);
	
	$cadastro=new cadastros;
	$cadastro->cad_curriculo_materias($_POST['cod_curriculo']);	
	


?>