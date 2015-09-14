	<style>
	#pesquisa_aluno div.uk-dropdown {
		width: 100%;
		max-width: 450px;
	}

	.box_aluno{
		background-position: left center;
		background-repeat: no-repeat;
		background-size: 32px 32px;
		cursor: pointer;
		display: table-cell;
		height: 32px;
		padding-left: 40px;
		vertical-align: middle;	
		display: block;
		height: auto;
		min-height: 32px;
		
	}
	
	
	
	</style>

<div class='uk-grid' style=''>
<div class="uk-width-1-1">
	<form action="#" method="post" class="" id="form_cadastro" style="width: 100%;">
	<div class=' uk-grid uk-form' style=''>
					<div class="uk-width-1-1">
						<div class=' uk-grid' style=''>
							<div class="uk-width-1-4" style="100px">
										<?php 
											$inputs->input_form_row($cod_turma,'cod_turma','cod_turma','',' readonly');
										?>
							</div>
						</div>
					</div>
					<div class="uk-width-1-1">
						<div class=' uk-grid' style=''>
							<div class=" uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-6">
								<?php 
									$selects->ano_calendario($ano_calendario,'Ano');
								?>
							</div>
							<div class=" uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-6">
								<?php 
									$selects->cod_serie($cod_serie,'Série');
								?>
							</div>
							<div class=" uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3">
								<?php 
									$selects->cod_periodo($cod_periodo,'Período');
								?>
							</div>

							<div class="  uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3">
								<?php 
									$selects->cod_curriculo($cod_curriculo,'Curriculo');
								?>
							</div>
						
						</div>
						<hr class='uk-article-divider'>
					</div>




	</div>
	</form>

</div>

<?php
		if(isset($_GET['id']) and $_GET['id']!=""){
				$autocomplete=new autocomplete;
				$autocomplete->cad_alunos();

?>

	<div id="pesquisa_aluno" class="uk-autocomplete uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2 uk-form" data-uk-autocomplete="{source:alunos}" style="margin-top: 10px;">

				﻿<label class="uk-form-label" for="cod_curriculo">Pesquisar</label>
				<input style="width: 100%;" id="incluir_cad_turma_alunos" class="uk-form-small" type="text">
				<script type="text/autocomplete">
					<ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results" >
						{{~items}}
						<li data-value="{{ $item.id }}">
							<a onclick='incluir_cad_turma_alunos({{ $item.id }});'>
								<div tabindex="0" onclick="" __idx="0" class="box_aluno" style="outline:none;background-image: url('{{{ $item.url }}}'); ">
										<div>{{ $item.value }}</div>
										<div>{{ $item.email }}</div>
								</div>
							</a>				
						</li>
						{{/items}}
					</ul>
					
				</script>
	</div>
<?php
		}
?>









</div>






