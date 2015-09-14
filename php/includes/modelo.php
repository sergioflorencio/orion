<div class='uk-width-2-4' style=''>
<form action="#" method="post" class="uk-form" id="form_cadastro">

<div style="max-width: 650px;min-width: 500px;">



		
				<div class="uk-form-row uk-width-1-4">
					<div class="uk-grid">
						<div class="uk-width-1-2">
							<?php 
								$inputs->input_form_row($cod_fornecedor,'cod_fornecedor','cod_fornecedor','',' readonly');
							?>
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">	
						<div class="uk-width-3-4">
							<?php 
								$inputs->input_form_row($nome_razao_social,'nome_razao_social','nome_razao_social','','');
							?>
						</div>
						<div class="uk-width-1-4">
							<?php 
								$inputs->input_form_row($cpf_cnpj,'cpf_cnpj','cpf_cnpj','','');
							?>
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">	
						<div class="uk-width-1-2">
							<?php 
								$inputs->input_form_row($endereco,'endereco','endereco','','');
							?>
						</div>
						<div class="uk-width-1-6">
							<?php 
								$inputs->input_form_row($numero,'numero','numero','','');
							?>
						</div>
						<div class="uk-width-1-6">
							<?php 
								$inputs->input_form_row($complemento,'complemento','complemento','','');
							?>
						</div>
						<div class="uk-width-1-6">
							<?php 
								$inputs->input_form_row($cep,'cep','cep','','');
							?>
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">	
						<div class="uk-width-2-5">
							<?php 
								$inputs->input_form_row($bairro,'bairro','bairro','','');
							?>
						</div>
						<div class="uk-width-2-5">
							<?php 
								$inputs->input_form_row($cidade,'cidade','cidade','','');
							?>
						</div>
						<div class="uk-width-1-5">
							<?php 
								$inputs->input_form_row($uf,'uf','uf','','');
							?>
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">							
						<div class="uk-width-1-2">
							<?php 
								$inputs->input_form_row($email_1,'email_1','email_1','','');
							?>
						</div>
						<div class="uk-width-1-2">
							<?php 
								$inputs->input_form_row($email_2,'email_2','email_2','','');
							?>
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">							
						<div class="uk-width-1-4">
							<?php 
								$inputs->input_form_row($telefone_1,'telefone_1','telefone_1','','');
							?>
						</div>
						<div class="uk-width-1-4">
							<?php 
								$inputs->input_form_row($telefone_2,'telefone_2','telefone_2','','');
							?>
						</div>
					</div>
				</div>

					
		</div>

</form>








</div>