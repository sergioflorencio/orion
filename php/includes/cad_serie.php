<div class='uk-width-2-4' style=''>
<form action="#" method="post" class="uk-form" id="form_cadastro">

<div style="max-width: 650px;min-width: 500px;">



		
				<div class="uk-form-row uk-width-1-4">
					<div class="uk-grid">
						<div class="uk-width-1-2">
							<?php 
								$inputs->input_form_row($cod_serie,'cod_serie','cod_serie','',' readonly');
							?>
						</div>
					</div>
				</div>
				<div class="uk-form-row">
					<div class="uk-grid">	
						<div class="uk-width-1-4">
							<?php 
								$inputs->input_form_row($serie,'serie','serie','','');
							?>
						</div>
						<div class="uk-width-1-4">
							<?php 
								$inputs->input_form_row($ano,'ano','ano','','');
							?>
						</div>
					</div>
				</div>

					
		</div>

</form>








</div>