<div class='uk-width-2-4' style=''>
<form action="#" method="post" class="uk-form" id="form_cadastro">

<div style="max-width: 650px;min-width: 500px;">





					<div class="uk-form-row uk-width-1-4">
						<div class="uk-grid">
							<div class="uk-width-1-2">
								<?php 
									$inputs->input_form_row($cod_status_patrimonio,'cod_status_patrimonio','cod_status_patrimonio','','readonly');
								?>
							</div>
						</div>
					</div>
					<div class="uk-form-row">
									<div class="uk-grid">					
										<div class="uk-width-1-1">
											 <textarea style="width: 100%; height: 100px;" id="descricao" name="descricao" placeholder="Textarea"><?php echo $descricao;?></textarea> 
											<?php 
											//	$inputs->input_form_row(,'','Descrição','','');
											?>
										</div>
									</div>
					</div>
</div>

</form>








</div>