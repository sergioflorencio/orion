<body style="margin-bottom: 100px;">
<div class="uk-width-1-1 uk-container-center uk-text-center" style="padding-left: 20px; padding-right: 20px;">
	<div class="uk-grid">
		<div class="uk-width-large-1-1 uk-width-small-1-1 uk-width-medium-1-1 uk-visible-small">
			<a class="" href="index.php">
				<img class="uk-margin uk-margin-remove" src="imagens/logo.png" title="VEPinho" alt="VEPinho" height="30" width="90">
			</a>
		</div>	
		<!-- Menus 1 --->
		<div class="uk-width-1-1 " style="margin-bottom: 30px; margin-top: 30px;text-align: left;">
			<a href="#offcanvas-1" class="uk-navbar-toggle uk-hidden-large" data-uk-offcanvas></a>
			<a class="uk-visible-large" href="index.php">
				<img class="uk-margin uk-margin-remove" src="imagens/logo.png" title="VEPinho" alt="VEPinho" height="30" width="90">
			</a>
			<div id="offcanvas-1" class="uk-offcanvas">
				<div class="uk-offcanvas-bar uk-offcanvas-bar-show">
					<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav >
					<?php 

					$menus->menu();
					// include("menu.php") 

					?>
					</ul>
				</div>

			</div>	
			<ul class="uk-subnav uk-subnav-pill uk-navbar-flip">
<?php if($_SESSION['tipo_usuario']=="administrador"){?>			
				<li class=''><a href='?act=pesquisa&mod=cad_usuario&id='><i class='uk-icon-users'></i> Usuários</a></li>
<?php }?>	
				<li class=''><a href='?login=logout'><i class='uk-icon-sign-out'></i> Logout</a></li>
			</ul>		
		
		</div>

		<div class="uk-width-large-1-4 uk-width-small-1-1 uk-width-medium-1-4 ">
			<div class="uk-grid">
				<!-- Menus 2 --->
				<div class="uk-width-1-1 " style="margin-bottom: 30px; margin-top: 30px;text-align: left;">
						<div id='principal' class='' style="padding-left: 5px; padding-right: 5px;">
							<div class='' style='style="text-align: left; margin: 5px 10px;"'>
								<div class="tm-nav uk-visible-large uk-panel uk-panel-box " style="border-radius: 0px; padding-left: 0px; padding-right: 0px;padding-bottom: 0px;">
									<h3 class="uk-panel-title" style="margin-left: 0px;margin-right: 0px;background-color: transparent;margin-top: -10px;"><i class="uk-icon-bars"></i> Menu</h3>
									<div class="tm-nav-wrapper">
										<ul class="uk-nav  uk-nav-parent-icon" style="color: #fff !important;"  data-uk-nav="{multiple:true}">
										   <?php 

												$menus->menu();
										   ?>									
										</ul>
									</div>
								</div>	

				
							</div>
						</div>
				</div>
			</div>
		</div>
		<!-- Principal --->
		<?php
		if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id'])){
		
		?>

				<div class="uk-width-1-1 uk-width-large-3-4 uk-width-small-1-1 uk-width-medium-1-1" style="padding-left: 15px;  border-radius: 0px; top: 30px;text-align: left;" >
					<div id='cadastro'></div>
					<div class="uk-grid uk-panel uk-panel-box " style="margin-left: 0px; margin-top: 30px; margin-bottom: 15px;  padding-left: 0px; padding-right: 0px;">
							<div class="uk-width-1-1 uk-panel uk-navbar" style="border-radius: 0px;margin-top: -15px; margin-left: 0px; margin-right: 0px; border-width: 0px; border-style: none none none solid; border-color: -moz-use-text-color; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none;  padding-left: 5px;" >
								<ul class="uk-subnav uk-subnav-line"  style=" ">
									<li class="uk-active"><a href=""><i class="uk-icon-flag"></i> <?php if(isset($_GET['mod'])){echo $_GET['mod'];}?></a></li>
									<?php 
										
										if(isset($_GET['mod']) and strpos($_GET['mod'],'cad_')===false){}else{
											if(isset($_GET) and isset($_GET['mod']) ){
												$sql=new sql;
												$valores=$sql->min_max($_GET['mod'], str_replace("cad_","cod_",$_GET['mod']));
												$menus=new menus; 
												$menus->submenu($valores,$_GET['id']);
												$menus->menu_exportar('grid');
											}

										}
									

										
									?>
								</ul>
							
							</div>	
						<div class="uk-width-1-1" >
							<div class="uk-grid" style="padding:15px" >
								<div class="uk-width-1-1" id='arquivo_gerado' style="margin-top: 20px;text-align: center; padding: 0px;"></div>	
								<div class="uk-width-1-1" style="padding-left: 10px;" >
							<?php

						 
									if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id'])){
										if(isset($_POST) and $_POST!=null and isset($_GET['act']) and $_GET['act']=='cadastros'){
											$keys=array_keys($_POST);
											$sql=new sql;
											$sql->salvar($_GET['mod'],$keys[0]);
										}		
										$$_GET['act']=new $_GET['act'];
										$$_GET['act']->$_GET['mod']($_GET['id']);	
										
									 }
							?>
								</div>	
							</div>
						</div>
					</div>
				</div>
			
		
		
		
		
		

		<?php
		}
		
		?>
	</div>
</div>




	<?php // include "php/action.php";?>






		

</body>
