<div class='uk-width-2-4' style=''>
<form action="#" method="post" class="uk-form" id="form_cadastro">

<div style="max-width: 650px;min-width: 500px;">



		
				<div class="uk-form-row uk-width-1-4">
					<div class="uk-grid">
						<div class="uk-width-1-2">
							<?php 
								$inputs->input_form_row($cod_materia,'cod_materia','cod_materia','',' readonly');
							?>
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">	
						<div class="uk-width-3-4">
							<?php 
								$inputs->input_form_row($nome_materia,'nome_materia','nome_materia','','');
							?>
						</div>
						<div class="uk-width-1-4">
							<?php 
								$inputs->input_form_row($sigla_materia,'sigla_materia','sigla_materia','','');
							?>
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">	
						<div class="uk-width-1-1">
							<?php 
								$inputs->input_form_row($descricao_materia,'descricao_materia','descricao_materia','','');
							?>
						</div>
					</div>
				</div>

					
		</div>

</form>








</div>