 			<div class="uk-tab uk-subnav-pill" data-uk-switcher="{connect:'#subnav-pill-content-2'}" style="margin-bottom: 25px;">

					<li class="uk-active"><a href="#">Cadastro</a></li>
<?php 
	if($cod_aluno!=""){
		
		if(
			$_SESSION['tipo_usuario']=="preceptor" or
			$_SESSION['tipo_usuario']=="administrador"){
?>
					<li class=""><a href="#">Ficha complementar</a></li>
					<li class=""><a href="#">Preceptorias</a></li>
<?php
	}
?>	
					
					<li class=""><a href="#">Histórico 	</a></li>
<?php
	}
?>
					<li class=""></li>
			</div>
			

		<div class="uk-grid uk-switcher" id="subnav-pill-content-2">
			<div class="uk-width-1-1">
					<div class="uk-grid">

					<div class='uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-4 ' style=" margin-bottom: 30px;">
							<a href="#" class="uk-container-center uk-text-center" id="foto_">
								<?php
									$html=new html;
									$html->foto($cod_aluno);
								?>

							</a>
							<input type="file" id="my_file" style="display: none;" />






					</div>
					<div class='uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-3-4' style="margin-left: -25px;">
					<form action="#" method="post" class="uk-form" id="form_cadastro" accept-charset="UTF-8">


							
									<div class="uk-form-row uk-width-small-1-2 uk-width-medium-1-4 uk-width-large-1-4">
										<div class="uk-grid">
											<div class="uk-width-1-2">
												<?php 
													$inputs->input_form_row($cod_aluno,'cod_aluno','cod_aluno','',' readonly');
												?>
											</div>
										</div>
									</div>
									<div class="uk-form-row">
										<div class="uk-grid">	
											<div class="uk-width-small-1-1 uk-width-medium-3-5 uk-width-large-4-6">
												<?php 
													$inputs->input_form_row($nome,'nome','nome','','');
												?>
											</div>
											<div class="uk-width-small-1-1 uk-width-medium-2-5 uk-width-large-2-6">
												<?php 
													$inputs->input_form_row($data_nascimento,'data_nascimento','data_nascimento','',"data-uk-datepicker={format:'YYYY-MM-DD'} onkeyup=formatar_data_2_(this);");
												?>
											</div>
											<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-2">
												<?php 
													$inputs->input_form_row($nome_pai,'nome_pai','nome_pai','','');
												?>
											</div>
											<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-2">
												<?php 
													$inputs->input_form_row($nome_mae,'nome_mae','nome_mae','','');
												?>
											</div>
											<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
												<?php 
													$inputs->input_form_row($rg,'rg','rg','','');
												?>
											</div>
											<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
												<?php 
													$inputs->input_form_row($cpf,'cpf','cpf','','');
												?>
											</div>
										</div>
									</div>
									<div class="uk-form-row">
										<div class="uk-grid">	
											<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
													<?php 
														$inputs->input_form_row($endereco,'endereco','endereco','','');
													?>
											</div>
											<div class="uk-width-small-1-2 uk-width-medium-1-4 uk-width-large-1-4">
												<?php 
													$inputs->input_form_row($numero,'numero','numero','','');
												?>
											</div>
											<div class="uk-width-small-1-2 uk-width-medium-1-4 uk-width-large-1-4">
												<?php 
													$inputs->input_form_row($complemento,'complemento','complemento','','');
												?>
											</div>
											<div class="uk-width-small-1-1 uk-width-medium-1-5 uk-width-large-1-5">
													<?php 
														$inputs->input_form_row($cep,'cep','cep','','');
													?>
											</div>
											<div class="uk-width-small-1-1 uk-width-medium-1-5 uk-width-large-1-5">
												<?php 
													$inputs->input_form_row($bairro,'bairro','bairro','','');
												?>
											</div>
											<div class="uk-width-small-2-3 uk-width-medium-2-5 uk-width-large-2-5">
												<?php 
													$inputs->input_form_row($cidade,'cidade','cidade','','');
												?>
											</div>
											<div class="uk-width-small-1-3 uk-width-medium-1-5 uk-width-large-1-5">
												<?php 
													$inputs->input_form_row($uf,'uf','uf','','');
												?>
											</div>
										</div>
									</div>
									<div class="uk-form-row">
										<div class="uk-grid">							
											<div class="uk-width-1-1">
												<?php 
													$inputs->input_form_row($email,'email','email','','');
												?>
											</div>
										</div>
									</div>
									<div class="uk-form-row">
										<div class="uk-grid">							
											<div class="uk-width-1-2">
												<?php 
													$inputs->input_form_row($telefone,'telefone','telefone','','');
												?>
											</div>
											<div class="uk-width-1-2">
												<?php 
													$inputs->input_form_row($celular,'celular','celular','','');
												?>
											</div>
										</div>
									</div>

										


					</form>

					</div>

					</div>			
								
			</div>
			
<?php 
	if($cod_aluno!=""){
		
		if(
			$_SESSION['tipo_usuario']=="preceptor" or
			$_SESSION['tipo_usuario']=="administrador"){
?>
			<div class="uk-width-1-1 uk-form uk-form-stacked">
			<?php
				$formulario=new formulario;
				$formulario->ficha_complementar($cod_aluno,"N");
			
			?>
			
			</div>		
			<div class="uk-width-1-1 uk-form uk-form-stacked">
				<div class="uk-grid" style="margin-left: -10px; padding-right: 30px;" >
						<div class="uk-width-1-1 uk-form uk-form-stacked">
							<?php
								$preceptorias=new preceptorias;
								echo $preceptorias->box_preceptoria();
							?>
						</div>
						<div class="uk-width-1-1" >
							<div class="uk-grid" id="preceptorias">
								<?php
								echo $preceptorias->listar_preceptarias($cod_aluno);
								?>
							</div>						
						</div>						
				</div>		
			</div>		
<?php
	}
?>			
			<div class="uk-width-1-1 uk-form uk-form-stacked">
				<div class="uk-grid" style="margin-left: -10px; padding-right: 30px;" >
						<div class="uk-width-1-1" >
							<?php
									$relatorios=new relatorios;
									$relatorios->boletim_aluno($cod_aluno,'','N');
							?>	
						</div>						
				</div>		
			</div>	
<?php
	}
?>
			
		</div>		


