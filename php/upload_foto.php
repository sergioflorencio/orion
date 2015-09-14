<?php

	include "php.php";
//  $imagens=new imagens;
//	$imagens->upload($_POST['cod_item']);
//	$imagens->listar($_POST['cod_item']);
//	var_dump($_GET);
//	var_dump($_POST);
//	var_dump($_FILES);
	
	

if (isset($_FILES['foto'])){

		//Mover foto	
		$arquivo = $_FILES['foto'];
		
		if($arquivo['size']>0){
		
		  $novonome = md5(mt_rand(1,10000).$arquivo['name']).'.jpg';
		  $dir = "fotos/";
		  if (!file_exists($dir))
		  {
			mkdir("../".$dir, 0755);  
		  }
		  $caminho = $dir.$novonome;
		  move_uploaded_file($arquivo['tmp_name'],"../".$caminho);
		
		
		
		//update cadastro de aluno
		$table="cad_aluno";
		$campos="endfoto='".$caminho."'";
		$where="cod_aluno='".$_POST['cod_aluno']."'";
		$msg="N";
		$sql=new sql;
		$sql->update($table,$campos,$where,$msg);

		
		}

		$html=new html;
		$html->foto($_POST['cod_aluno']);
		
 }	
	
	


?>