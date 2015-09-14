<?php

	include "php.php";
		$formulario = new formulario;
		$sql=new sql;

	//incluir novo
		$table="cad_preceptoria";
		$campos="`cod_aluno`, `cod_usuario`, `data`, `texto`";
		$values="'".$_POST['cod_aluno']."','".$_POST['cod_usuario']."','".date('Y-m-d  H:i:s')."','".$_POST['texto']."'";
		$msg="N";
		$sql->insert($table,$campos,$values,$msg);
		

		$preceptorias=new preceptorias;
		echo $preceptorias->listar_preceptarias($_POST['cod_aluno']);

		
?>