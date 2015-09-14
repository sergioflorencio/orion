<?php
 include "config.php";
 include "php.php";
 

	echo "
			<!-- menu -->

			<div id='menu' class='uk-offcanvas' style=''>
				<div class='uk-offcanvas-bar'>
				". file_get_contents("menu.php")."
				</div>
			</div>";

	echo "<!-- principal -->
	
		<div class='uk-grid uk-panel uk-panel-box uk-panel-box-primary uk-container-center uk-text-center' style=''>
			<div class='uk-width-1-2' style=''>
	
			<div class='uk-grid uk-width-1-1'>
				<div id='principal' class='uk-navbar' style=''>
					<nav class='' id='xxx' data-uk-sticky>
							<a style='font-size: 30px; padding: 5px; width: 20px; height: 20px;' href='#menu' data-uk-offcanvas=''>
								<i style='margin: 2px;' class='uk-icon-bars'></i>
							</a>
					</nav>
				</div>
			</div>

			
			<div id='principal' class='uk-width-1-1' style=''>
				<div id='cadastro'></div>
			</div>


			<div class='uk-grid  uk-width-1-1' style='padding: 20px;'>			
					"; 


			if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id'])){
				if(isset($_POST) and $_POST!=null and isset($_GET['act']) and $_GET['act']=='cadastros'){
					$keys=array_keys($_POST);
					$sql=new sql;
					$sql->salvar($_GET['mod'],$keys[0]);
				}		
				$$_GET['act']=new $_GET['act'];
				$$_GET['act']->$_GET['mod']($_GET['id']);
			 }			



echo	"	
			</div>

		</div>";





 ?>