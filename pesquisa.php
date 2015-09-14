<nav class="uk-navbar">
<!--	<a href="#" class="uk-navbar-toggle"></a> -->
	<div class="uk-navbar-flip">
		<div class='uk-button-group uk-grid-divider' style="width: 100%;">
			<a href="?act=pesquisa&mod=<?php echo $_GET['mod'];?>&id=" class="uk-button uk-button-danger"><i class="uk-icon-binoculars"></i> pesquisar</a>
			<a href="?act=cadastros&mod=<?php echo $_GET['mod'];?>&id=" class="uk-button uk-button-danger"><i class="uk-icon-file-o"></i> novo</a>
			<button class="uk-button uk-button-danger" type="submit"><i class="uk-icon-save"></i> salvar</button>
		</div>
	</div>
</nav>