<?php

	include "php.php";
		$formulario = new formulario;
		$sql=new sql;
	
	// nota resposta para pergunta
	if(isset($_POST) and isset($_POST['act']) and $_POST['act']=='nova_resposta'){

		//pesquisar os atuais
		echo $formulario->itens_formulario($_POST['cod_formulario']);
	
	}
	
	
	//salvar formulario
	
	
	
	//salvar respostas do formulario
	if(isset($_POST) and isset($_POST['act']) and $_POST['act']=='salvar_resposta'){


		//se 'cod_formulario_resposta' == 'nova_resposta' 
		if($_POST['cod_formulario_resposta']=='nova_resposta'){
			$table="`cad_formulario_resposta`";
			$campos="`cod_formulario`, `descricao`";
			$values="'".$_POST['cod_formulario']."','".$_POST['descricao']."'";
			$msg="N";
			$sql->insert($table,$campos,$values,$msg);
		}
		
		
		
		//se 'cod_formulario_resposta' != 'nova_resposta' 
		if($_POST['cod_formulario_resposta']!='nova_resposta'){
			$table="cad_formulario_resposta";
			$campos="`cod_formulario`='".$_POST['cod_formulario']."', `descricao`='".$_POST['descricao']."' ";
			$where="cod_formulario_resposta='".$_POST['cod_formulario_resposta']."'";
			$msg="N";
			$sql->update($table,$campos,$where,$msg);
		}
		//pesquisar os atuais

		echo $formulario->itens_formulario($_POST['cod_formulario']);
	
	}
	if(isset($_POST) and isset($_POST['act']) and $_POST['act']=='excluir_resposta'){

		$table="cad_formulario_resposta";
		$where="cod_formulario_resposta='".$_POST['cod_formulario_resposta']."'";
		$msg="N";
		
		$sql->delete($table,$where,$msg);
		echo $formulario->itens_formulario($_POST['cod_formulario']);	
	}
	if(isset($_POST) and isset($_POST['act']) and $_POST['act']=='editar_formulario'){
		//var_dump($_POST);
		$formulario=new formulario;
		$formulario->editar_formulario($_POST['cod_formulario']);
	}
	if(isset($_POST) and isset($_POST['act']) and $_POST['act']=='novo_formulario'){
		//var_dump($_POST);
		$formulario=new formulario;
		$formulario->cad_formulario('' ,'','','');
	}
	if(isset($_POST) and isset($_POST['act']) and $_POST['act']=='salvar_formulario'){
		//var_dump($_POST);

		if($_POST['cod_formulario']==''){
			$table="`cad_formulario`";
			$campos="`texto_pergunta`, `texto_ajuda`, `tipo_formulario`";
			$values="'".$_POST['texto_pergunta']."','".$_POST['texto_ajuda']."','".$_POST['tipo_formulario']."'";
			$msg="N";
			$sql->insert($table,$campos,$values,$msg);
		}else{
			$table="cad_formulario";
			$campos="`texto_pergunta`='".$_POST['texto_pergunta']."', `texto_ajuda`='".$_POST['texto_ajuda']."', `tipo_formulario`='".$_POST['tipo_formulario']."' ";
			$where="cod_formulario='".$_POST['cod_formulario']."'";
			$msg="N";
			$sql->update($table,$campos,$where,$msg);
		}
		$formulario=new formulario;
		$formulario->ficha_complementar("","S");

	}
	if(isset($_POST) and isset($_POST['act']) and $_POST['act']=='salvar_ficha_complementar'){
	//	var_dump($_POST);
			include "config.php";
		$sql=new sql;
		$table="cad_ficha_complementar";
		$msg="N";
		//excluir resposta antiga

		$where=" cod_formulario='".$_POST['cod_formulario']."' and cod_aluno='".$_POST['cod_aluno']."' ";
		$sql->delete($table,$where,$msg);
		
		//se type==text, incluir resposta de texto
		if($_POST['type']=='text'){
			//1 - verificar se existe resposta
				$select="SELECT cod_formulario_resposta FROM vepinho1.cad_formulario_resposta where cod_formulario='".$_POST['cod_formulario']."' and descricao='".$_POST['texto']."';";
			//	$select="SELECT cod_formulario_resposta FROM vepinho1.cad_formulario_resposta where cod_formulario='8' and descricao='Parentes';";
				$resultado=mysql_query($select,$conexao) or die (mysql_error());
				$row = mysql_fetch_array($resultado);
					if($row[0]==null){
						$table="`cad_formulario_resposta`";
						$campos="`cod_formulario`, `descricao`";
						$values="'".$_POST['cod_formulario']."','".$_POST['texto']."'";
						$msg="N";
						$sql->insert($table,$campos,$values,$msg);
					}
			//3 - pesquisar e atualizar $_POST['cod_formulario_resposta']
				$resultado=mysql_query($select,$conexao) or die (mysql_error());
				$row = mysql_fetch_array($resultado);
					if($row[0]!=null){
						$_POST['cod_formulario_resposta']=$row[0];
					}
		
		}

		//incluir nova resposta
		$table="cad_ficha_complementar";
		$campos="`cod_formulario_resposta`, `cod_formulario`, `cod_aluno`";
		$values="'".$_POST['cod_formulario_resposta']."','".$_POST['cod_formulario']."','".$_POST['cod_aluno']."'";
		$sql->insert($table,$campos,$values,$msg);		


	}


?>