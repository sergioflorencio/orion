<div class='uk-width-small-1-1 uk-width-medium-2-3 uk-width-large-3-4 ' style=''>
<form action="#" method="post" class="uk-form" id="form_cadastro">

<div >

		
				<div class="uk-form-row uk-width-1-1">
					<div class="uk-grid">
						<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-4 ">
							<?php 
								$inputs->input_form_row($cod_usuario,'cod_usuario','cod_usuario','',' readonly');
							?>
						</div>
					</div>
					<div class="uk-grid">
						<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 ">
							<?php 
								$inputs->input_form_row($nome,'nome','nome','','');
							?>
						</div>
						<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 ">
							<?php 
								$inputs->input_form_row($email,'email','email','','');
							?>
						</div>
						<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2 ">
							<?php 
								$inputs->input_form_row($usuario,'usuario','usuario','','');
							?>
						</div>
						<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2 ">
							<?php 
								$inputs->input_form_row_password($senha,'senha','senha','','');
							?>
						</div>
						<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 ">
							<?php 
								$inputs->input_form_row($lebretesenha,'lebretesenha','lebretesenha','','');
							?>
						</div>
						<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-4 ">
							<?php 
								$selects->tipo_usuario($tipo_usuario,'Tipo de usuario');
							?>
						</div>
						<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-4 ">
							<?php 
								$selects->status_usuario($status,'status');
							?>
						</div>
					</div>
				</div>

					
		</div>

</form>








</div>