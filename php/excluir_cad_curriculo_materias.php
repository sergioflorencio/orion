<?php

	include "php.php";
	$table="cad_curriculo_materias";
	$where="cod_curriculo_materias='".$_POST['cod_curriculo_materias']."'";
	$msg="N";

	
	$sql=new sql;
	$sql->delete($table,$where,$msg);
	
//	var_dump($_POST);
	$cadastro=new cadastros;
	$cadastro->cad_curriculo_materias($_POST['cod_curriculo']);	
	



?>