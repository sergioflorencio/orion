<?php

	include "php.php";

	//var_dump($_POST);
	$html=new html;
	$sql=new sql;
	$notas=$html->json_to_array($_POST['json']);
	//var_dump($notas);
	for($i=0;$i<count($notas);$i++){
		
		//provas
			for($j=1;$j<count($notas[$i])-3;$j++){
				//delete
					$prova=$j;
					$nota=str_replace("[","",$notas[$i]['prova'.$j]);
					$table="cad_nota";
					$where="`cod_turma_alunos`='".$notas[$i]['id']."' and `prova`='".$prova."' and `cod_curriculo_materias`='".$notas[$i]['cod_curriculo_materias']."' ";
					$msg="N";
					$sql->delete($table,$where,$msg);
				//inset
					$table="cad_nota";
					$campos="`cod_turma_alunos`, `prova`, `cod_curriculo_materias`, `nota`";
					$values="'".$notas[$i]['id']."','".$prova."','".$notas[$i]['cod_curriculo_materias']."','".$nota."'";
					$msg="N";
					$sql->insert($table,$campos,$values,$msg);
			
			}

	}
	echo "
		<div class='uk-alert uk-alert-success tm-main uk-width-medium-1-1 uk-container-center' data-uk-alert='' style=''>
			<a href='' class='uk-alert-close uk-close'></a>
			<p>O registro foi salvo com sucesso!</p>
		</div>	
	";

?>