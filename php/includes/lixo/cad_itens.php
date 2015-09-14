<div class='uk-width-1-1' style=''>
<form action="#" method="post" class="uk-form" id="form_cadastro">

<div style="min-width: 650px;">


		<div class="uk-width-1-1">
			<div class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#subnav-pill-content-2'}">

					<li class="uk-active"><a href="#">Cadastro</a></li>
					<li class=""><a href="#">Movimento</a></li>
					<li class=""><a href="#">Imagens</a></li>
					<li class=""></li>
			</div>
		<hr class="uk-article-divider">			
			<div id="subnav-pill-content-2" class="uk-switcher">
				<div class="">		
				<h3 class="tm-article-subtitle">Cadastro</h3>			
					<div class="uk-form-row uk-width-1-4">
						<div class="uk-grid">
							<div class="uk-width-1-2">
								<?php 
									$inputs->input_form_row($cod_item,'cod_item','cod_item','','readonly'); 
								?>
							</div>
						</div>
					</div>
					<div class="uk-form-row">
						<div class="uk-grid">	
							<div class="uk-width-1-3" >
								<?php 
									$selects->cad_status_patrimonio($cod_status_patrimonio,'Status');
								?>
							</div>						
							<div class="uk-width-1-1">
								<label class="uk-form-label" for="xxx">Descrição do item</label>
								 <textarea style="width: 100%; height: 100px;" id="descricao" name="descricao" placeholder="Textarea"><?php echo $descricao;?></textarea> 
							</div>
						</div>
					</div>
					<div class="uk-form-row">
						<div class="uk-grid">	
							<div class="uk-width-1-3">
								<?php 
									$inputs->input_form_row($codigo_patrimonio,'codigo_patrimonio','Numero da plaqueta','','');
								?>
							</div>
							<div class="uk-width-2-3">
								<?php 
									$inputs->input_form_row($codigo_barras,'codigo_barras','codigo_barras','','');
								?>
							</div>
						</div>
					</div>
					<div class="uk-form-row">
						<div class="uk-grid">							
							<div class="uk-width-1-1">
								<?php 
									$selects->cod_grupo_patrimonio($cod_grupo_patrimonio,'Grupo');
								?>
							</div>		
							<div class="uk-width-1-1">
								<?php 
								//	$selects->cod_item_pai($cod_item_pai,'Item pai');
								?>
							</div>
							<div class="uk-width-1-1">
								<?php 
									$selects->filial($cod_filial,'Filial');
								?>							
							</div>						
							<div class="uk-width-1-1">
								<?php 
									$selects->localizacao($cod_localizacao,'Localizacao',$cod_filial);
								?>							
							</div>						
						</div>
					</div>
				<hr class="uk-article-divider">				
					<div class="uk-form-row">
						<div class="uk-grid">
							<div class="uk-width-1-1">
								<?php 
									$selects->fornecedor($cod_fornecedor,'Fornecedor');
								?>
							</div>	
							<div class="uk-width-1-2">
								<?php 
									$selects->tipo_patrimonio($cod_tipo_patrimonio,'Tipo de patrimônio');
								?>
							</div>						
							<div class="uk-width-1-2">
								<?php 
									$selects->tipo_aquisicao($cod_tipo_aquisicao,'Aquisição');
								?>
							</div>						
							<div class="uk-width-1-3">
								<?php 
									$selects->tipo_documento($cod_tipo_documento,'Tipo de documento');

								?>
							</div>						
							<div class="uk-width-1-3">
								<?php 
									$inputs->input_form_row($numero_documento,'numero_documento','Numero NF','','');
								?>
							</div>
							<div class="uk-width-1-3">
								<?php 
									$inputs->input_form_row($serie,'serie','Número de série','','');
								?>
							</div>						
						</div>
					</div>
				<hr class="uk-article-divider">
					<div class="uk-form-row">
						<div class="uk-grid">
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($quantidade,'quantidade','quantidade','','');
								?>
							</div>
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($unidade,'unidade','unidade','','');
								?>
							</div>						
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($valor_aquisicao,'valor_aquisicao','Valor de aquisição','','');
								?>
							</div>
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($valor_atual,'valor_atual','Valor atual','','');
								?>
							</div>
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($valor_residual,'valor_residual','Valor residual','','');
								?>
							</div>
						</div>
					</div>
					<div class="uk-form-row">
						<div class="uk-grid">							
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($vida_util,'vida_util','Vida útil','','');
								?>
							</div>					
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($taxa_depreciacao_anual,'taxa_depreciacao_anual','% Depr. aa','','');
								?>
							</div>
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($data_aquisicao,'data_aquisicao','Data de aquisição',''," data-uk-datepicker={format:'DD/MM/YYYY'}");
								?>
							</div>						
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($data_inicio_depreciacao,'data_inicio_depreciacao','Inicio depreciação',''," data-uk-datepicker={format:'DD/MM/YYYY'}");
								?>
							</div>						
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($data_baixa,'data_baixa','Data de baixa',''," readonly ");
								?>
							</div>
							<div class="uk-width-1-4">
								<?php 
									$inputs->input_form_row($data_inclusao,'data_inclusao','Data inclusão','',"readonly data-uk-datepicker={format:'DD/MM/YYYY'}");
								?>
							</div>
						</div>						
					</div>
				</div>
</form>				
				<div class="">
					<h3 class="tm-article-subtitle">Movimento</h3>
					<div id="grid_movimento">
					</div>
	<?php

				$pesquisa->cad_movimento($cod_item);

					
	?>
				</div>
				<div class="">
					<h3 class="tm-article-subtitle">Imagens</h3>
					<div class="uk-grid" id="">
					<div class='uk-width-1-1'>
							<input type='file' id='imagem'></input>
							<a  class='uk-button' onclick="upload_fotos();">Salvar</a>
					<hr class="uk-article-divider">										
					</div>		
					<div class='uk-width-1-1 uk-grid'  id='imagens_'>
	<?php

				$imagens=new imagens;
				$imagens->listar($cod_item);

					
	?>
					
					</div>	

	
					
					
					</div>
				
				</div>
			</div>
		</div>










</div>