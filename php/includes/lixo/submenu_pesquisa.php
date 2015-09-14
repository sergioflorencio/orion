
<nav class="uk-navbar">
<!--	<a href="#" class="uk-navbar-toggle"></a> -->
	<div class="uk-navbar-flip">
	<div class='uk-button-group' style="">
		<a href="?act=cadastros&mod=<?php echo $_GET['mod'];?>&id=<?php echo $valores['min'];?>" class="uk-button"><i class="uk-icon-fast-backward"></i> primeiro</a>
		<a href="?act=cadastros&mod=<?php echo $_GET['mod'];?>&id=<?php echo max($id-1,$valores['min']) ;?>" class="uk-button"><i class="uk-icon-backward"></i> anterior</a>
		<a href="?act=cadastros&mod=<?php echo $_GET['mod'];?>&id=<?php echo min($id+1,$valores['max']);?>" class="uk-button"><i class="uk-icon-forward"></i> próximo</a>
		<a href="?act=cadastros&mod=<?php echo $_GET['mod'];?>&id=<?php echo $valores['max'];?>" class="uk-button"><i class="uk-icon-fast-forward"></i> útimo</a>
	</div>
	<div class='uk-button-group' style="">
		<a href="?act=pesquisa&mod=<?php echo $_GET['mod'];?>&id=" class="uk-button uk-button-danger"><i class="uk-icon-binoculars"></i> pesquisar</a>
		<a href="?act=cadastros&mod=<?php echo $_GET['mod'];?>&id=" class="uk-button uk-button-danger"><i class="uk-icon-file-o"></i> novo</a>
		<button class="uk-button uk-button-danger" type="submit"><i class="uk-icon-save"></i> salvar</button>
	</div>
	</div>
</nav>
