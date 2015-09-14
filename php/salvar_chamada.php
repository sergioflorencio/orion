<?php

		include "php.php";

	//	var_dump($_POST);
		$html=new html;
		$sql=new sql;
		$chamada=$html->json_to_array($_POST['json']);
		//var_dump($chamada);
		
		$datas=explode("|", $_POST['datas']);
		//var_dump($datas);
		
		//var_dump($chamada);
		for($i=0;$i<count($chamada);$i++){
			
					//delete

						$table="cad_chamada";
						$where="`cod_turma_alunos`='".$chamada[$i]['id']."' and `cod_curriculo_materias`='".$_POST['cod_curriculo_materias']."' ";
						$msg="N";
						$sql->delete($table,$where,$msg);
						
				for($j=0;$j<count($datas)-1;$j++){

					//inset
					if($chamada[$i]['data_'.$j]=="checked"){ $presenca=1;}else{ $presenca=0;}
						$table="cad_chamada";
						$campos="`cod_turma_alunos`, `cod_curriculo_materias`, `Data`, `presenca`";
						$values="'".$chamada[$i]['id']."','".$_POST['cod_curriculo_materias']."','".$datas[$j]."','".$presenca."' ";
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