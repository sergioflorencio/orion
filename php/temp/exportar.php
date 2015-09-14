<?php
function xls($formato,$json){
			$json=str_replace("[","",$json);
			$json=str_replace("]","",$json);
			$json=explode('},{',$json);
			for($i=0;$i<count($json);$i++){
				$json[$i]=str_replace("{","",$json[$i]);
				$json[$i]=str_replace("}","",$json[$i]);
				$json[$i]=str_replace("'",'"',$json[$i]);
				$array[$i]="{".$json[$i]."}";
				if($i==0){
					$keys=$array[$i];
				}
				$array[$i]=json_decode($array[$i],true);
			}
			$keys=json_decode($keys,true);
			$keys=array_keys($keys);


			$table= "<table>";
				for($c=0;$c<count($keys);$c++){
					$table.= "<th>";
					$table.= $keys[$c];
					$table.= "</th>";
				}
			for($l=0;$l<count($array);$l++){
				$table.= "<tr>";
				for($c=0;$c<count($keys);$c++){
					$table.= "<td>";
					$table.= $array[$l][$keys[$c]];
					$table.= "</td>";
				}
				$table.= "</tr>";				
			}
			$table.= "</table>";
			$table= "\xEF\xBB\xBF".$table;
			$nome_arquivo="arquivo.".$formato;
			$file = fopen($nome_arquivo,"w");
			fwrite($file,$table);
			fclose($file); 
			echo "<a href='php/temp/".$nome_arquivo."' download='".$nome_arquivo."' class='uk-badge uk-badge-notification' style='color: rgb(255, 255, 255); padding: 2px 15px;'><i class='uk-icon-cloud-download'></i> download (".$nome_arquivo.")</a>";			
}
//css_($_POST['json']);
function html($formato,$html){
			$nome_arquivo="arquivo.".$formato;
			$file = fopen($nome_arquivo,"w");
			fwrite($file,$html);
			fclose($file); 
			echo "<a href='php/temp/".$nome_arquivo."' download='".$nome_arquivo."' class='uk-badge uk-badge-notification' style='color: rgb(255, 255, 255); padding: 2px 15px;'><i class='uk-icon-cloud-download'></i>  download (".$nome_arquivo.")</a>";			
}
	if(isset($_POST) and $_POST['base']=="json"){
		xls($_POST['formato'],$_POST['json']);
	
	}
	if(isset($_POST) and $_POST['base']=="html"){

		html($_POST['formato'],$_POST['json']);
	
	}

?> 