<?php
class selects{
  function _____modelo____($sql_select,$campo_id,$id,$campo_descricao,$label){
    include "config.php";
          if ($id!=""){
            $sql_select.=" where `".$campo_id."`=".$id.";";
          }
          $resultado_option=mysql_query($sql_select,$conexao) or die (mysql_error());
          $options="<option value=''></option>";
          while($row_option = mysql_fetch_array($resultado_option))
          {
            if(isset($id) and $row_option[$campo_id]==$id){
              $options.= "<option value='".$row_option[$campo_id]."' selected >".$row_option[$campo_id]." - ".$row_option[$campo_descricao]."</option>";
            }else{
              $options.= "<option value='".$row_option[$campo_id]."'>".$row_option[$campo_id]." - ".$row_option[$campo_descricao]."</option>";
            }
          }  
            echo "<label class='uk-form-label' for='".$campo_id."'>".$label."</label><select class='uk-form-small' id='".$campo_id."' name='".$campo_id."' style='width: 100%;'>".$options."</select>";
  }
  function _____modelo__2__($sql_select,$campo_id,$id,$campo_descricao,$label){
    include "config.php";
          $resultado_option=mysql_query($sql_select,$conexao) or die (mysql_error());
          $options="";
          while($row_option = mysql_fetch_array($resultado_option))
          {
            if(isset($id) and $row_option[$campo_id]==$id){
              $options.= "<option value='".$row_option[$campo_id]."' selected >".$row_option[$campo_id]." - ".$row_option[$campo_descricao]."</option>";
            }else{
              $options.= "<option value='".$row_option[$campo_id]."'>".$row_option[$campo_id]." - ".$row_option[$campo_descricao]."</option>";
            }
          }  
            echo "<label class='uk-form-label' for='".$campo_id."'>".$label."</label><select class='uk-form-small' id='".$campo_id."' name='".$campo_id."' style='width: 100%;'>".$options."</select>";
  }
  function ___lixo_____analitico_sintetico($analitico_sintetico,$label){
            $options="";
            if($analitico_sintetico=='analitico' or $analitico_sintetico=='sintetico'){
              $options.= "<option value='".$analitico_sintetico."' selected >".$analitico_sintetico."</option>";
            }
              $options.= "<option value=''></option>";
              $options.= "<option value='analitico'>analitico</option>";
              $options.= "<option value='sintetico'>sintetico</option>";
            echo "<label class='uk-form-label' for='analitico_sintetico'>".$label."</label><select class='uk-form-small' id='analitico_sintetico' name='analitico_sintetico' style='width: 100%;'>".$options."</select>";
  }
  function ___lixo_____aquisicao_baixa($aquisicao_baixa,$label){
            $options="";
            if($aquisicao_baixa=='aquisicao' or $aquisicao_baixa=='baixa'){
              $options.= "<option value='".$aquisicao_baixa."' selected >".$aquisicao_baixa."</option>";
            }
              $options.= "<option value=''></option>";
              $options.= "<option value='aquisicao'>Aquisições</option>";
              $options.= "<option value='baixa'>Baixas</option>";
            echo "<label class='uk-form-label' for='aquisicao_baixa'>".$label."</label><select class='uk-form-small' id='aquisicao_baixa' name='aquisicao_baixa' style='width: 100%;'>".$options."</select>";
  }
  function cod_materia($id,$label){
    $sql_select="SELECT * FROM vepinho1.cad_materia";
    $campo_id="cod_materia";
    $campo_descricao="nome_materia";
    
    $select=new selects;
    $select->_____modelo____($sql_select,$campo_id,$id,$campo_descricao,$label);
  }
  function cod_serie($id,$label){
    $sql_select="
          SELECT 
            cod_serie as cod_serie,
            concat(serie,'ª série, ', ano,'ºano') as descricacao 
          FROM vepinho1.cad_serie";
    $campo_id="cod_serie";
    $campo_descricao="descricacao";
    
    $select=new selects;
    $select->_____modelo____($sql_select,$campo_id,$id,$campo_descricao,$label);
  }
  function cod_periodo($id,$label){
    $sql_select="SELECT * FROM vepinho1.cad_periodo";
    $campo_id="cod_periodo";
    $campo_descricao="nome_periodo";
    
    $select=new selects;
    $select->_____modelo____($sql_select,$campo_id,$id,$campo_descricao,$label);
  }
  function cod_curriculo($id,$label){
    $sql_select="SELECT * FROM vepinho1.cad_curriculo";
    $campo_id="cod_curriculo";
    $campo_descricao="descricao";
    
    $select=new selects;
    $select->_____modelo____($sql_select,$campo_id,$id,$campo_descricao,$label);
  }
  function cod_aluno($id,$label){
    $sql_select="SELECT * FROM vepinho1.cad_aluno";
    $campo_id="cod_aluno";
    $campo_descricao="nome";
    
    $select=new selects;
    $select->_____modelo____($sql_select,$campo_id,$id,$campo_descricao,$label);
  }
  function turma($id,$label){
    if($id!=''){$filtro="and cod_turma='".$id."'";}else{$filtro="";}
    $sql_select="
        SELECT
          cod_turma,
          concat(
          ano_calendario,' - ',
          cad_serie.serie, 'ª serie, ',
          cad_serie.ano, 'º ano - ',
          cad_periodo.nome_periodo) as descricao

        FROM 
          vepinho1.cad_turma,
          vepinho1.cad_serie,
          vepinho1.cad_periodo
        
        where

          cad_turma.cod_serie=cad_serie.cod_serie and
          cad_turma.cod_periodo=cad_periodo.cod_periodo
          ".$filtro."
        ";
    $campo_id="cod_turma";
    $campo_descricao="descricao";
    $id="";
    $select=new selects;
    $select->_____modelo__2__($sql_select,$campo_id,$id,$campo_descricao,$label);  
  
  }
  function cad_curriculo_materias($id,$label){
    $sql_select="
        SELECT
          cad_curriculo_materias.cod_curriculo_materias,
          cad_materia.nome_materia
        FROM 
          vepinho1.cad_materia,
          vepinho1.cad_curriculo_materias,
          vepinho1.cad_turma

        where

        cad_curriculo_materias.cod_materia=cad_materia.cod_materia and
        cad_turma.cod_curriculo=cad_curriculo_materias.cod_curriculo and
        cad_turma.cod_turma='".$id."'
        ";
    $campo_id="cod_curriculo_materias";
    $campo_descricao="nome_materia";
	if(isset($_POST['cod_curriculo_materias'])){ $id=$_POST['cod_curriculo_materias'];}else{ $id='';}
    $select=new selects;
    $select->_____modelo__2__($sql_select,$campo_id,$id,$campo_descricao,$label);
  }
  function opcao_lancamento($id,$label){
	  
	  if(isset($_POST['opcao_lancamento'])){
		  if($_POST['opcao_lancamento']=='editar'){$editar="selected";}else{$editar="";}
		  if($_POST['opcao_lancamento']=='novo'){$novo="selected";}else{$novo="";}
		  
	  }else{$editar="";$novo="";}
	  
      $options="";
      $options.= "<option value=''></option>";
      $options.= "<option value='editar' ".$editar.">Editar</option>";
      $options.= "<option value='novo' ".$novo.">Incluir</option>";
      echo "<label class='uk-form-label' for='opcao_lancamento'>".$label."</label><select class='uk-form-small' id='opcao_lancamento' name='opcao_lancamento' style='width: 100%;'>".$options."</select>";
  }
  function status_usuario($id,$label){

      $options="";
      $options.= "<option value='".$id."' selected>".$id."</option>";      
      $options.= "<option value=''></option>";
      $options.= "<option value='ativo'>Ativo</option>";
      $options.= "<option value='bloqueado'>bloqueado</option>";
      $options.= "<option value='pendente'>Pendente de ativação</option>";
      echo "<label class='uk-form-label' for='status'>".$label."</label><select class='uk-form-small' id='status' name='status' style='width: 100%;'>".$options."</select>";
  }
  function tipo_usuario($id,$label){

      $options="";
      $options.= "<option value='".$id."' selected>".$id."</option>";      
      $options.= "<option value=''></option>";
      $options.= "<option value='monitor'>monitor</option>";
      $options.= "<option value='professor'>professor</option>";
      $options.= "<option value='preceptor'>preceptor</option>";
      $options.= "<option value='administrador'>administrador</option>";
      echo "<label class='uk-form-label' for='tipo_usuario'>".$label."</label><select class='uk-form-small' id='tipo_usuario' name='tipo_usuario' style='width: 100%;'>".$options."</select>";
  }
  
  function tipo_formulario($id,$label){
      $options="";
      $options.= "<option value='".$id."'>".$id."</option>";
      $options.= "<option value='texto'>texto</option>";
      $options.= "<option value='select'>select</option>";
      $options.= "<option value='data'>data</option>";
      $options.= "<option value='radio_input'>radio_input</option>";
      $options.= "<option value='checkbox'>checkbox</option>";
      echo "<label class='uk-form-label' for='tipo_formulario'>".$label."</label><select class='uk-form-small' id='tipo_formulario' name='tipo_formulario' style='width: 100%;'>".$options."</select>";
  }
  function ano_calendario($id,$label){

      $options="";
      $options.= "<option value='".$id."' selected>".$id."</option>";      
      $options.= "<option value=''></option>";
      for ($n=0;$n<50;$n++){
        $ano=2000+$n;
        $options.= "<option value='".$ano."'>".$ano."</option>";  
      }
      
      echo "<label class='uk-form-label' for='ano_calendario'>".$label."</label><select class='uk-form-small' id='ano_calendario' name='ano_calendario' style='width: 100%;'>".$options."</select>";
  }
  
}

class autocomplete{
  function cad_alunos(){
  $consulta_sql="SELECT cod_aluno as `id` , nome as `value`, concat('http://www.vepinho.org/orion/',endfoto) as `url`, email FROM vepinho1.cad_aluno;";
  $pesquisa=new pesquisa;
  $json=$pesquisa->json($consulta_sql);
  $json=str_replace("'",'"',$json);
  echo "<script> var alunos=".$json."; </script>";
  }


}


class menus{
  function navegador_($valores,$id){
    echo "
      <div class='uk-width-1-4' style=''>
        <a href='?act=cadastros&mod=".$_GET['mod']."&id=".$valores['min']."' class='uk-button'><i class='uk-icon-fast-backward'></i> primeiro</a>
        <a href='?act=cadastros&mod=".$_GET['mod']."&id=".max($id-1,$valores['min']) ."' class='uk-button'><i class='uk-icon-backward'></i> anterior</a>
        <a href='?act=cadastros&mod=".$_GET['mod']."&id=".min($id+1,$valores['max'])."' class='uk-button'><i class='uk-icon-forward'></i> próximo</a>
        <a href='?act=cadastros&mod=".$_GET['mod']."&id=".$valores['max']."' class='uk-button'><i class='uk-icon-fast-forward'></i> útimo</a>
      </div>";
  }
  function submenu($valores,$id){
    echo "

          <li  data-uk-tooltip={pos:'right'} title='Pesquisar'><a href='?act=pesquisa&mod=".$_GET['mod']."&id=' class='uk-button-link '  style=''><i class='uk-icon-binoculars'></i></a> </li>
          <li  data-uk-tooltip={pos:'right'} title='Novo'><a href='?act=cadastros&mod=".$_GET['mod']."&id=' class='uk-button-link ' style=''><i class='uk-icon-file-o'></i></a> </li>
          <li  data-uk-tooltip={pos:'right'} title='Salvar'><a href='#' class=' uk-button-link  '  id='bt_salvar'  style=''><i class='uk-icon-save '></i></a> </li>
          
          <li  data-uk-tooltip={pos:'right'} title='Primeiro'><a href='?act=cadastros&mod=".$_GET['mod']."&id=".$valores['min']."' class='uk-button-link '  style=''><i class='uk-icon-fast-backward'></i> </a></li>
          <li  data-uk-tooltip={pos:'right'} title='Anterior'><a href='?act=cadastros&mod=".$_GET['mod']."&id=".max($id-1,$valores['min']) ."' class='uk-button-link '  style=''><i class='uk-icon-backward'></i> </a></li>
          <li  data-uk-tooltip={pos:'right'} title='Próximo'><a href='?act=cadastros&mod=".$_GET['mod']."&id=".min($id+1,$valores['max'])."' class='uk-button-link '  style=''><i class='uk-icon-forward'></i> </a></li>
          <li  data-uk-tooltip={pos:'right'} title='Último'><a href='?act=cadastros&mod=".$_GET['mod']."&id=".$valores['max']."' class='uk-button-link '  style=''><i class='uk-icon-fast-forward'></i> </a></li>


          <script>$('#bt_salvar').click(function(){document.getElementById('form_cadastro').submit();});</script>  

    ";
  }
  function submenu_cad_itens($valores,$id){
    echo "

          <li  data-uk-tooltip={pos:'right'} title='Pesquisar'><a href='?act=pesquisa&mod=".$_GET['mod']."&id=' class='uk-button-link '  style=''><i class='uk-icon-binoculars'></i></a> </li>
          <li  data-uk-tooltip={pos:'right'} title='Novo'><a href='?act=cadastros&mod=".$_GET['mod']."&id=' class='uk-button-link ' style=''><i class='uk-icon-file-o'></i></a> </li>
          <li  data-uk-tooltip={pos:'right'} title='Salvar'><a href='#' class=' uk-button-link  '  id='bt_salvar'  style=''><i class='uk-icon-save '></i></a> </li>
          <li  data-uk-tooltip={pos:'right'} title='Imprimir ficha de ativo'><a href='?act=imprimir&mod=ficha_ativo&id=".$_GET['id']."' target='_blank'><i class='uk-icon-print'></i></a> </li>
          
          <li data-uk-tooltip={pos:'right'} title='Primeiro'><a href='?act=cadastros&mod=".$_GET['mod']."&id=".$valores['min']."' class='uk-button-link '  style=''><i class='uk-icon-fast-backward'></i> </a></li>
          <li data-uk-tooltip={pos:'right'} title='Anterior'><a href='?act=cadastros&mod=".$_GET['mod']."&id=".max($id-1,$valores['min']) ."' class='uk-button-link '  style=''><i class='uk-icon-backward'></i> </a></li>
          <li data-uk-tooltip={pos:'right'} title='Próximo'><a href='?act=cadastros&mod=".$_GET['mod']."&id=".min($id+1,$valores['max'])."' class='uk-button-link '  style=''><i class='uk-icon-forward'></i> </a></li>
          <li data-uk-tooltip={pos:'right'} title='Último'><a href='?act=cadastros&mod=".$_GET['mod']."&id=".$valores['max']."' class='uk-button-link '  style=''><i class='uk-icon-fast-forward'></i> </a></li>


          <script>$('#bt_salvar').click(function(){document.getElementById('form_cadastro').submit();});</script>      


    ";
  }
  function menu_exportar($id_grid){

  
  //  echo "<ul class='uk-subnav uk-subnav-line uk-navbar-flip' style='margin-bottom: 10px;'>";
    
      
      
    echo "
      
      <li>
            <div class='uk-button-dropdown' data-uk-dropdown={mode:'click'}>
              <a href='#'><i class='uk-icon-file-excel-o'></i> Excel <i class='uk-icon-caret-down'></i></a>
              <div style='' class='uk-dropdown'>
                <ul class='uk-nav uk-nav-dropdown'>
                  <li>
                    <a href='#' onclick=exportar('xls','".$id_grid."','json');>Tudo os registros</a>
                  </li>
                  <li>
                    <a href='#' onclick=exportar('xls','".$id_grid."','html');>Apenas a tela</a>
                  </li>

                </ul>
              </div>
            </div>
          </li>
          <li>
            <div class='uk-button-dropdown' data-uk-dropdown={mode:'click'}>
              <a href='#'><i class='uk-icon-file-word-o'></i> Word <i class='uk-icon-caret-down'></i></a>
              <div style='' class='uk-dropdown'>
                <ul class='uk-nav uk-nav-dropdown'>
                  <li>
                    <a href='#' onclick=exportar('doc','".$id_grid."','json');>Tudo os registros</a>
                  </li>
                  <li>
                    <a href='#' onclick=exportar('doc','".$id_grid."','html');>Apenas a tela</a>
                  </li>

                </ul>
              </div>
            </div>
        
        
        </li>
  

    ";
  }
  function menu_baixa($filtro){
    $inputs=new inputs;
    $selects=new selects;
  
    
    if($filtro!=""){
      echo  "<li>
            <div class='uk-button-dropdown' data-uk-dropdown={justify:'#principal',mode:'click'} >
              <a href='#'><i class='uk-icon-filter'></i> Filtro <i class='uk-icon-caret-down'></i></a>
                <div style='' class='uk-dropdown'>    
                ";
      $relatorios=new relatorios;
      $filtro=$relatorios->filtros($filtro);          
    echo "
                </div>
            </div>              
        </li>  ";  
    }        
        
    echo "<li>";
          echo  "
            <a href='#modal' id='confirmar_baixas' data-uk-modal><i class='uk-icon-exclamation'></i> Confirmar baixas</a>
            <!-- This is the modal -->
            <div id='modal' class='uk-modal'>
              <form action='#' method='post'>
                <div class='uk-modal-dialog'>
                  <div class='uk-modal-header'>
                    <h3>Confirmar baixas</h3>
                  </div>
                  <div>
                <div class='uk-grid'>
                  <div class='uk-width-1-3'>";
                  $inputs->input_form_row('00/00/0000','data_baixa','de',''," data-uk-datepicker={format:'DD/MM/YYYY'}");
            echo     "</div>
                  <div class='uk-width-1-3'>";
                  $selects->cad_motivo_baixa('','Motivo de baixa');
            echo     "</div>
                  <div class='uk-width-1-1' id=''>
                    <label class='uk-form-label' for='xxx'>Itens</label>
                     <textarea  style='width: 100%; height: 100px;' id='textarea_cod_item' name='textarea_cod_item' placeholder='Textarea' readonly></textarea> 
                  </div>
                  </div>
                  <hr class='uk-article-divider'>
                  <div id='div_modal_msg'></div>
                  <div class='uk-modal-footer uk-text-right'>
                    <button type='button' class='uk-button uk-modal-close' id='bt_cancelar'>Cancelar</button>
                    <button type='submit' class='uk-button uk-button-primary' id='tb_salvar'>Salvar</button>
                  </div>
                </div>
              </form>
            </div>
          ";
    
    echo"</li>
      <li></li>
      <li id='arquivo_gerado'></li>

    ";
  }
  function menu_reavaliar($filtro){
    $inputs=new inputs;
    $selects=new selects;
    
    if($filtro!=""){
      echo  "<li>
            <div class='uk-button-dropdown' data-uk-dropdown={justify:'#principal',mode:'click'} >
              <a href='#'><i class='uk-icon-filter'></i> Filtro <i class='uk-icon-caret-down'></i></a>
                <div style='' class='uk-dropdown'>    
                ";
      $relatorios=new relatorios;
      $filtro=$relatorios->filtros($filtro);          
    echo "
                </div>
            </div>              
        </li>  ";  
    }        
        
    echo "<li>";
          echo  "
            <a href='#modal' id='confirmar_reavaliacao' data-uk-modal><i class='uk-icon-exclamation'></i> Salvar</a>
          ";
    
    echo"</li>
      <li></li>
      <li id='arquivo_gerado'></li>
    ";
  }
  function menu___lixo____(){
    $menus=new menus;
    $sql=new sql;
    if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id'])  and $_GET['act']=="cadastros"){
      //elementos de pesquisa
        //var_dump($_GET);
      $tabela=$_GET['mod'];



      //include esqueleto cadastro
        $id=str_replace("cad_","cod_",$_GET['mod']);
        $valores=$sql->min_max($tabela, $id);
        $menus->submenu($valores,$id);
            
     }
    if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id']) and $_GET['id']=="" and $_GET['act']=="pesquisa"){
        $menus->menu_exportar('grid',0);
     }
    if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id']) and $_GET['id']=="" and $_GET['act']=="lancamento" and $_GET['mod']=="baixar"){
      $menus->menu_baixa(4);
     }
    if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id']) and $_GET['id']=="" and $_GET['act']=="lancamento" and $_GET['mod']=="reavaliar"){
      $menus->menu_reavaliar(4);
     }
    if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id']) and $_GET['id']=="" and $_GET['act']=="relatorios" and $_GET['mod']=="boletim"){
      $filtro=1;
      $menus=new menus;
      $menus->menu_exportar('grid_relatorio',$filtro);
     }
    if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id']) and $_GET['id']=="" and $_GET['act']=="relatorios" and $_GET['mod']=="aquisicoes_baixas"){
      $filtro=2;
      $menus=new menus;
      $menus->menu_exportar('grid_relatorio',$filtro);
     }
    if(isset($_GET['act']) and isset($_GET['mod']) and isset($_GET['id']) and $_GET['id']=="" and $_GET['act']=="relatorios" and $_GET['mod']=="depreciacao"){
      $filtro=3;
      $menus=new menus;
      $menus->menu_exportar('grid_relatorio',$filtro);
     }
  
  
  
  }
  function menu(){
  
  echo "
          <li class='uk-parent uk-active'>
            <a href='#'><i class='uk-icon-cog'></i> Cadastros</a>
              <ul class='uk-nav-sub'>
                <li class='uk-text-truncate'><a href='?act=pesquisa&mod=cad_aluno&id='><i class='uk-icon-user'></i> Aluno</a></li>
                <li class='uk-text-truncate'><a href='?act=pesquisa&mod=cad_turma&id='><i class='uk-icon-users'></i> Turma</a></li>                
                <li class='uk-text-truncate'><a href='?act=pesquisa&mod=cad_turma_alunos&id='><i class='uk-icon-users'></i> Alunos por Turma</a></li>                
                <li class='uk-text-truncate'><a href='?act=pesquisa&mod=cad_materia&id='><i class='uk-icon-file-o'></i> Matéria</a></li>
                <li class='uk-text-truncate'><a href='?act=pesquisa&mod=cad_curriculo&id='><i class='uk-icon-files-o'></i> Curriculo</a></li>
                <li class='uk-text-truncate'><a href='?act=pesquisa&mod=cad_periodo&id='><i class='uk-icon-clock-o'></i> Período</a></li>
                <li class='uk-text-truncate'><a href='?act=pesquisa&mod=cad_serie&id='><i class='uk-icon-sort-numeric-asc'></i> Serie</a></li>                
                <li class='uk-text-truncate'><a href='?act=pesquisa&mod=cad_formulario&id='><i class='uk-icon-check-circle'></i> Formulario complementar</a></li>
              </ul>
          </li>
          <li class='uk-parent uk-active' >
            <a href='#'><i class='uk-icon-pencil-square-o'></i> Lançamentos</a>
            
              <ul class='uk-nav-sub'>
                <li class='uk-text-truncate'><a href='?act=lancamento&mod=notas&id='><i class='uk-icon-edit'></i> Notas</a></li>
                <li class='uk-text-truncate'><a href='?act=lancamento&mod=chamada&id='><i class='uk-icon-edit'></i> Chamada</a></li>

              </ul>
          </li>
          <li class='uk-parent uk-active' >
            <a href='#'><i class='uk-icon-list'></i> Relatórios</a>
              <ul class='uk-nav-sub'>
                <li class='uk-text-truncate'><a href='?act=relatorios&mod=boletim&id='><i class='uk-icon-list'></i> Boletim</a></li>
                <li class='uk-text-truncate'><a href='?act=relatorios&mod=carometro&id='><i class='uk-icon-list'></i> Carômetro</a></li>
                <li class='uk-text-truncate'><a href='?act=relatorios&mod=lista_chamada&id='><i class='uk-icon-list'></i> Lista de Chamada</a></li>
                <li class='uk-text-truncate'><a href='?act=relatorios&mod=grade_notas&id='><i class='uk-icon-list'></i> Grade de Notas</a></li>
              </ul>
          </li>

          

  
  
  ";
  
  }

  
  
}

class sql{
  function sanitizeString($string) {
    // matriz de entrada
    $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','|','!','#','$','%','?','~','^','>','<','ª','º' );

    // matriz de saída
    $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C',' ','_','_','_','_','_','_','_','_','_','_','_','_' );

    // devolver a string
    return str_replace($what, $by, $string);
  }
  function min_max($tabela,$campo){
    include "config.php";
    $select="
      SELECT 
        min(`".$campo."`) as min, 
        max(`".$campo."`) as max 
      FROM 
        vepinho1.".$tabela.";    
    ";

    $resultado=mysql_query($select,$conexao) or die (mysql_error());
    $valores = mysql_fetch_array($resultado);
     return $valores;
  }
  public function update($table,$campos,$where,$msg){
    include "config.php";
    if(isset($_SESSION) and isset($_SESSION['uid']) and isset($_SESSION['username'])){$uid=$_SESSION['uid'];$username=$_SESSION['username'];}else{$uid=0;$username='';}
    $consulta="UPDATE `vepinho1`.`".$table."` SET ".$campos." WHERE ".$where.";";
    $update=mysql_query($consulta,$conexao) or die ("<div class='uk-alert uk-alert-danger  tm-main uk-width-medium-1-2 uk-container-center'>".mysql_error()."<br><br>Consulta<br>".$consulta."</div>");  
    if($msg=='S'){
    echo "
      <div class='uk-alert uk-alert-success tm-main uk-width-medium-1-1 uk-container-center' data-uk-alert='' style=''>
        <a href='' class='uk-alert-close uk-close'></a>
        <p>O registro foi salvo com sucesso!</p>
      </div>";

    }
  }
  public function insert($table,$campos,$values,$msg){
    include "config.php";
    if(isset($_SESSION) and isset($_SESSION['uid']) and isset($_SESSION['username'])){$uid=$_SESSION['uid'];$username=$_SESSION['username'];}else{$uid=0;$username='';}
    $consulta="INSERT INTO `vepinho1`.".$table." (".$campos.")  VALUES (".$values.");"; 
    //echo $consulta;
    $insert=mysql_query($consulta,$conexao) or die ("<div class='uk-alert uk-alert-danger  tm-main  uk-container-center'>".mysql_error()."<br><br>Consulta<br>".$consulta."</div>");  ;  
    if($msg=='S'){
    echo "
      <div class='uk-alert uk-alert-success tm-main uk-width-medium-1-1 uk-container-center' data-uk-alert='' style=''>
        <a href='' class='uk-alert-close uk-close'></a>
        <p>O registro foi salvo com sucesso!</p>
      </div>";
    }
  }
  public function delete($table,$where,$msg){
    include "config.php";
    $consulta="DELETE FROM `vepinho1`.".$table." WHERE ".$where.";";
    //echo $consulta;
    $delete=mysql_query($consulta,$conexao) or die ("<div class='uk-alert uk-alert-danger  tm-main  uk-container-center'>".mysql_error()."<br><br>Consulta<br>".$consulta."</div>");  ;  
    if($msg=='S'){
    echo "
      <div class='uk-alert uk-alert-success tm-main uk-width-medium-1-1 uk-container-center' data-uk-alert='' style='margin: -15px 35px 30px;'>
        <a href='' class='uk-alert-close uk-close'></a>
        <p>O registro foi excluido com sucesso!</p>
      </div>";
    }

  }
  public function salvar($tabela,$key_id){
	  
	function data($data){

		if(strpos($data,"-")!==false){
			$dat = explode ("-",$data,3);
			return $dat[2]."/".$dat[1]."/".$dat[0];
		}else{
			$dat = explode ("/",$data,3);
			return $dat[2]."-".$dat[1]."-".$dat[0];
		}

	}	  
	$text = "A strange string to pass, maybe with some ø, æ, å characters.";
	$campos_insert="";

   //     $xx= mb_convert_encoding($_POST, 'UTF-8', "auto")." : UTF-8<br>";   

    
    $keys=array_keys($_POST);


    
    //update
    $json="";
    for($i=0;$i<count($keys);$i++){
      if($_POST[$keys[$i]]!=""){
        $campos_insert.="`".$keys[$i]."`";
		if(isset($_POST[$keys[$i]])){
			
			if(strpos($keys[$i],'data')===false){$valor=mb_convert_encoding($_POST[$keys[$i]], "UTF-8", "auto");}else{$valor=data(mb_convert_encoding($_POST[$keys[$i]], "UTF-8", "auto"));}
			
			$json.="`".$keys[$i]."`='".$valor."'";
		}

      }
    }
    $json=str_replace("'`","',`",$json); ;
    $sql=new sql;
    $campos=$json;
    $where="`".$key_id."`='".$_POST[$key_id]."'";


    
    //insert
    $campos_insert="";
    $values="";
    for($i=0;$i<count($keys);$i++){
      if($_POST[$keys[$i]]!=""){
        $campos_insert.="`".$keys[$i]."`";
		if(strpos($keys[$i],'data')===false){$valor=mb_convert_encoding($_POST[$keys[$i]], "UTF-8", mb_detect_encoding($_POST[$keys[$i]]));}else{$valor=data(mb_convert_encoding($_POST[$keys[$i]], "UTF-8", mb_detect_encoding($_POST[$keys[$i]])));}
		
        $values.="'".$valor."',";
      }
    }

    $values="(".$values.")";
    $campos_insert=str_replace('``',"`,`",$campos_insert);    
    $values=str_replace(",)",")",$values);    
    $values=str_replace(")","",$values);    
    $values=str_replace("(","",$values);    

    
    if($_POST[$key_id]!="" and $_POST[$key_id]!=null){
      $sql->update($tabela,$campos,$where,'S');
    }else{
      $sql->insert($tabela,$campos_insert,$values,'S');
    }
  }
  
}

class inputs{
  function input_form_row($valor,$id,$label,$placeholder,$atributo){
  echo "<div class='uk-form-row'>
      <label class='uk-form-label' for='xxx'>".$label."</label>
      <div class='uk-form-controls'>
        <input class='uk-form-small' placeholder='".$placeholder."' type='text' ".$atributo." style='width:100%;' name='".$id."' id='".$id."' value='".$valor."' >
      </div>
    </div>  
  ";

  }
  function input_form_row_password($valor,$id,$label,$placeholder,$atributo){
  echo "<div class='uk-form-row'>
      <label class='uk-form-label' for='xxx'>".$label."</label>
      <div class='uk-form-controls'>
        <input class='uk-form-small' placeholder='".$placeholder."' type='password' ".$atributo." style='width:100%;' name='".$id."' id='".$id."' value='".$valor."' >
      </div>
    </div>  
  ";

  }
}

class imagens{
  function thumbnail($id_imagem,$src,$titulo){
    echo "
      <div class='uk-width-1-2'>
        <a class='uk-thumbnail uk-overlay-toggle' href='#img_".$id_imagem."' data-uk-modal>
          <div class='uk-overlay'>
            <img src='".$src."' alt=''>
            <div class='uk-overlay-caption'>".$titulo."</div>
          </div>
        </a>
        <div id='img_".$id_imagem."' class='uk-modal'>
          <div class='uk-modal-dialog uk-modal-dialog-lightbox' style=''>
            <p style='margin-right: -20px; margin-left: -20px; margin-top: -20px;'><img src='".$src."' alt='' style=''></p>
            <div class='uk-modal-footer uk-text-right'>
              <button type='button' class='uk-button uk-modal-close '>Cancel</button>
              <button type='button' class='uk-button uk-button-primary' onclick=excluir_fotos('".$id_imagem."');>Excluir</button>
            </div>          
          </div>
        </div>        
      </div>
    ";
  }
  function listar($id_item){
    include "config.php";
    $imagens=new imagens;
    //pesquisar imagens
    $sql_select="SELECT * FROM vepinho1.cad_imagens where cod_item=".$id_item.";";
      $resultado=mysql_query($sql_select,$conexao) or die (mysql_error());
      while($row = mysql_fetch_array($resultado))
      {
        //gerar thumbnail
        $imagens->thumbnail($row['cod_imagem'],$row['endereco_imagem'],$row['data_inclusao']);
      }
    

  
  }
  function upload($id){

  
    //move arquivo
      $arquivo = $_FILES['my_uploaded_file'];
    //Salvando o Arquivo
      $nome_arquivo = md5(mt_rand(1,10000).$arquivo['name']).'.jpg';
      $caminho_arquivo = "fotos/";
      if (!file_exists($caminho_arquivo))
      {
      mkdir($caminho_arquivo, 0755);  
      }
      $caminho = $caminho_arquivo.$nome_arquivo;
      move_uploaded_file($arquivo['tmp_name'],"../".$caminho);  
      
    $table="cad_imagens";
    $campos="`cod_item`, `endereco_imagem`";
    $values="'".$id."','".$caminho."'";
    $msg="N";
  
    $sql=new sql;
    $sql->insert($table,$campos,$values,$msg);


  
    
  }  
  function excluir($id){
    $sql=new sql;
    $table="cad_imagens";
    $where="cod_imagem='".$id."' ";
    $msg="N";
    $sql->delete($table,$where,$msg);
  }
}


class listas{
  
}

class igniteui{
  function igrid($base,$column,$tabela){
  echo 
  
  
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
" 
<script>
            $( '#grid' ).igGrid( {
                autoGenerateColumns: false,
                dataSource: ".$base.",
                dataSourceType: 'json',
        columns:[".$column."],
                width: '100%',
                height: '70%',
                virtualizationMode: 'fixed',
                avgRowHeight: '30px',
                tabIndex: 1,
                features: [
                    {
                        name: 'Selection',
                        mode: 'row'
                    },
          {
            name: 'Hiding'
          },
                    {
                        name: 'Paging',
                        type: 'local',
                        pageSize: 15
                    },          
                    {
                        name: 'Filtering',
                        type: 'local'

                    },  
          {
            name: 'Resizing'
          },            
                   

                ]
            } );
  //Initialize
  $('#grid').igGrid({
    cellClick: function(evt, ui) { window.location.assign('?act=cadastros&mod=".$tabela."&id='+$('#grid').igGrid('getCellValue', ui.rowIndex, 'id'));}
  });      
</script>
";
  ///alert($('#grid').igGrid('getCellValue', ui.rowIndex, 'id'));

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  }
  function igrid2($base,$column,$tabela){
  echo 
  
  
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
" 
<script>
            $( '#grid' ).igGrid( {
                autoGenerateColumns: false,
                dataSource: ".$base.",
                dataSourceType: 'json',
        columns:[".$column."],
                width: '100%',
                height: '70%',
                virtualizationMode: 'fixed',
                avgRowHeight: '30px',
                tabIndex: 1,
                features: [
                    {
                        name: 'Selection',
                        mode: 'row'
                    },
          {
            name: 'Hiding'
          },
                    {
                        name: 'Paging',
                        type: 'local',
                        pageSize: 15
                    },          
                    {
                        name: 'Filtering',
                        type: 'local'

                    },  
          {
            name: 'Resizing'
          },            
                   

                ]
            } );
      
      
      </script>";
  ///alert($('#grid').igGrid('getCellValue', ui.rowIndex, 'id'));

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  }
  function igrid_movimento($base,$column,$tabela){
  echo 
  
  
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
" 
<script>
            $( '#grid_movimento' ).igGrid( {
                autoGenerateColumns: false,
                dataSource: ".$base.",
                dataSourceType: 'json',
        columns:[".$column."],
                width: '100%',
                height: '100%',
                virtualizationMode: 'fixed',
                avgRowHeight: '30px',
                tabIndex: 1,
                features: [
                    {
                        name: 'Selection',
                        mode: 'row'
                    },
                    {
                        name: 'Paging',
                        type: 'local',
                        pageSize: 15
                    },          
                   {
                        name: 'Filtering',
                        type: 'local'
                    },  
          {
            name: 'Resizing'
          },            
           {
            name: 'Summaries'
          },            
                   

                ]
            } );
    
</script>
";
  ///alert($('#grid').igGrid('getCellValue', ui.rowIndex, 'id'));

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  }
  function igrid_relatorios($base,$column,$groupby){
  echo 
  
  
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
" 
<script>
            $( '#grid_relatorio' ).igGrid( {
                autoGenerateColumns: false,
                dataSource: ".$base.",
                dataSourceType: 'json',
        columns:[".$column."],
                width: '100%',
                height: '100%',
                virtualizationMode: 'fixed',
                tabIndex: 1,
                features: [
                    {
                        name: 'Selection',
                        mode: 'row'
                    },
                    {
                        name: 'Paging',
                        type: 'local',
                        pageSize: 15
                    },            
                   {
                        name: 'Filtering',
                        type: 'local'
                    },  
          {
            name: 'Resizing'
          },            
           {
            name: 'Summaries'
          },  
                    {
                        name: 'MultiColumnHeaders'
                    },          
                    {
                        name: 'GroupBy',
                        columnSettings: [
            ".$groupby."
                        ]
                    }
        ]
  
            } );
    
</script>
";
  ///alert($('#grid').igGrid('getCellValue', ui.rowIndex, 'id'));

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  }
  function igrid_editavel($base,$column,$column_editavel){
  

  echo 

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
" 
<script>

            $( '#grid' ).igGrid( {
                autoGenerateColumns: false,
                dataSource: ".$base.",
                dataSourceType: 'json',
				columns:[".$column."],
                width: '100%',
                height: '80%',
                primaryKey: 'id',        
                virtualizationMode: 'fixed',
                tabIndex: 1,
                features: [
                    {
                        name: 'Selection',
                        mode: 'row'
                    },
                    {
                        name: 'MultiColumnHeaders'
                    },

         
                    {
                        name: 'Filtering',
                        type: 'local'

                    },            
                    {
                        name: 'Updating',
                        enableAddRow: false,
                        editMode: 'row',
                        enableDeleteRow: false,
                        rowEditDialogContainment: 'owner',
                        showReadonlyEditors: false,
                        enableDataDirtyException: false,
                        columnSettings: [".$column_editavel."]
                    }
        ]
  
            } );
    
</script>
";
  }

}

class html{
  function json_table($json){
        $json=str_replace("[","",$json);
        $json=str_replace("]","",$json);
        $json=explode('},{',$json);
        for($i=0;$i<count($json);$i++){
          $json[$i]=str_replace("{","",$json[$i]);
          $json[$i]=str_replace("}","",$json[$i]);
          $json[$i]=str_replace("'",'"',$json[$i]);
          $array[$i]="{".$json[$i]."}";
          if($i==0){
            $keys=$array[$i];
          }
          $array[$i]=json_decode($array[$i],true);
        }
        $keys=json_decode($keys,true);
        $keys=array_keys($keys);


        $table= "<table class='uk-table uk-table-hover'>";
          for($c=0;$c<count($keys);$c++){
            $table.= "<th>";
            $table.= $keys[$c];
            $table.= "</th>";
          }
        for($l=0;$l<count($array);$l++){
          $table.= "<tr id='".$array[$l][$keys[0]]."'>";
          for($c=0;$c<count($keys);$c++){
            $table.= "<td>";
            $table.= $array[$l][$keys[$c]];
            $table.= "</td>";
          }
          $table.= "</tr>";        
        }
        $table.= "</table>";
        return $table;
  }
  function tabela($json,$colunas){
  //column
  //id:
  //headerText: 'ID',
  //key: 'id', 
  //width: '50px',
  $html=new html;
  echo $html->json_table($json);
  
  $header="";
  $body="";
  
  
  
  }
  function lista_turma_mod_2($id){
        include "config.php";
          $select= "
          SELECT 
            cad_turma_alunos.cod_turma_alunos as id,
            concat('<button class=bt_excluir_curriculo_materias onclick=excluir_cad_turma(',cad_turma_alunos.cod_turma_alunos,'); value=',cad_turma_alunos.cod_turma_alunos,'>excluir</button>') as excluir,            
            cad_aluno.nome as nome,
            concat('http://www.vepinho.org/orion/',cad_aluno.endfoto) as endfoto
          FROM 
            vepinho1.cad_turma_alunos,
            vepinho1.cad_turma,
            vepinho1.cad_aluno
          WHERE
            cad_turma_alunos.cod_turma=cad_turma.cod_turma and
            cad_turma_alunos.cod_aluno=cad_aluno.cod_aluno and
            cad_turma_alunos.cod_turma=".$id.";";

      

      $resultado=mysql_query($select,$conexao) or die (mysql_error());
      while($row = mysql_fetch_array($resultado)){
        echo "<div class='uk-width-1-1 uk-panel uk-panel-box uk-panel-box-primary '  style='margin-bottom: 10px; padding-left: 40px;'>";
          echo "<div class=' uk-grid box_aluno' style='outline:none;background-image: url(".$row['endfoto']."'>";
            echo "<div class='uk-width-5-6' style=''>";
            echo "<h1 class='uk-panel-title uk-text-truncate'>".$row['nome']."</h1>";
            echo "</div>";
            echo "<div class='uk-width-1-6' style='padding: 0px;'>";
            echo "<button class='uk-button uk-text-truncate uk-button-danger' type='button' onclick=excluir_cad_turma_alunos(".$row['id'].");  style='width: 100%;'>Excluir</button>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      //  $row[''];

      }
  }
  function lista_turma_mod_3($id){
        include "config.php";
          $select= "
          SELECT 
            cad_turma_alunos.cod_turma_alunos as id,
            cad_aluno.nome as nome,
            cad_aluno.nome_pai,
            cad_aluno.nome_mae,
            concat(cad_serie.serie,'ªserie - ',cad_serie.ano,'ºano') as serie,
            cad_periodo.nome_periodo as periodo,
            concat('',cad_aluno.endfoto) as endfoto
            
          FROM 
            vepinho1.cad_turma_alunos,
            vepinho1.cad_turma,
            vepinho1.cad_serie,
            vepinho1.cad_periodo,
            vepinho1.cad_aluno
            
          WHERE
            cad_turma_alunos.cod_turma=cad_turma.cod_turma and
            cad_turma_alunos.cod_aluno=cad_aluno.cod_aluno and

            cad_turma.cod_serie=cad_serie.cod_serie and
            cad_turma.cod_periodo=cad_periodo.cod_periodo and
            cad_turma_alunos.cod_turma=".$id.";";

      
      $linha="";
      $n=0;
      $resultado=mysql_query($select,$conexao) or die (mysql_error());
      while($row = mysql_fetch_array($resultado)){
      $n=$n+1;
      $linha.="<tr>
            <td><span class=' uk-grid box_aluno' style='outline:none; margin-left: 0px;background-image: url(".$row['endfoto']."'></span></td>
            <td>".$row['nome']."</td>
            <td>".$row['nome_pai']."</td>
            <td>".$row['nome_mae']."</td>
            <td>".$row['serie']."</td>
            <td>".$row['periodo']."</td>
            <td><button class='uk-button uk-button-danger ' type='button' data-uk-tooltip={pos:'left'} title='Excluir' onclick=excluir_cad_turma_alunos(".$row['id'].");  style='width: 100%;'><i class='uk-icon-trash-o'> </i></button></td>
          </tr>";


      }
      
    echo "
    <button class='uk-button  uk-button-large uk-width-1-1' style='background: #00B4DC; border: 0px; color: #fff; text-decoration: none; type='button'> <i class='uk-icon-group '></i> ".$n." Alunos</button>
      <table class='uk-table uk-table-hover uk-overflow-container uk-table-condensed'>
        <thead>
          <tr>
            <th style='width: 50px;'>Foto</th>
            <th>Nome do Aluno</th>
            <th>Nome do Pai</th>
            <th>Nome da Mãe</th>
            <th>Turma</th>
            <th>Período</th>
            <th style='width: 10px;'></th>
          </tr>
        </thead>
        <tbody>
        ".$linha."
        </tbody>
      </table>";      
      
      
      
      
      
      
  }
  function lista_turma_mod_1($id){
        include "config.php";
          echo "<div id='grid'></div>";
          $select= "
          SELECT 
            cad_turma_alunos.cod_turma_alunos as id,
            cad_aluno.nome as nome,
            cad_aluno.nome_pai,
            cad_aluno.nome_mae,
            concat(cad_serie.serie,'ªserie - ',cad_serie.ano,'ºano') as serie,
            cad_periodo.nome_periodo as periodo,
            concat('',cad_aluno.endfoto) as endfoto
            
          FROM 
            vepinho1.cad_turma_alunos,
            vepinho1.cad_turma,
            vepinho1.cad_serie,
            vepinho1.cad_periodo,
            vepinho1.cad_aluno
            
          WHERE
            cad_turma_alunos.cod_turma=cad_turma.cod_turma and
            cad_turma_alunos.cod_aluno=cad_aluno.cod_aluno and

            cad_turma.cod_serie=cad_serie.cod_serie and
            cad_turma.cod_periodo=cad_periodo.cod_periodo and
            
            cad_turma_alunos.cod_turma=".$id.";";

      
          $pesquisa=new pesquisa;
          $json=$pesquisa->json($select);
          
          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Nome do Aluno', key: 'nome', dataType: 'string'},";      
          $column.="{headerText: 'Nome do Pai', key: 'nome_pai', dataType: 'string'},";      
          $column.="{headerText: 'Nome da Mãe', key: 'nome_mae', dataType: 'string'},";      
          $column.="{headerText: 'Série', key: 'serie', width: '100px', dataType: 'string'},";      
          $column.="{headerText: 'Período', key: 'periodo', width: '100px', dataType: 'string'}";      
      
    
          
          $tabela="cad_turma";

          $igniteui=new igniteui;
          $igniteui->igrid2($json,$column,$tabela);    
      
      
      
      
      
      
  }
  function carometro($cod_turma){
    function foto($id,$nome,$endfoto){
      return 
      
      "
      <div class='uk-thumbnail' style='height: 180px; width: 100px; margin: 5px; padding-left: 4px;'>
      <img src='".$endfoto."' alt='' style='height: 125px; width: 150px;'>
      <div class='uk-thumbnail-caption' style='line-height: 10px; font-size: 10px;'>".$id." - ".$nome."</div>
      </div>      
      
      ";
    
    
    }
    include "config.php";

    $select="
        SELECT
          cad_aluno.cod_aluno,
          cad_aluno.nome,
          cad_aluno.endfoto

        FROM 
          vepinho1.cad_turma_alunos,
          vepinho1.cad_aluno

        where
          cad_turma_alunos.cod_aluno=cad_aluno.cod_aluno and
          cod_turma=".$cod_turma."
        
        order by
          cad_aluno.nome
    ";
    $resultado=mysql_query($select,$conexao) or die (mysql_error());
    while($row = mysql_fetch_array($resultado))
    {
      echo foto($row['cod_aluno'],$row['nome'],$row['endfoto']);
    }
  
  }
  function foto($cod_aluno){
    function foto($id,$nome,$endfoto){
      return 
      
      "
      <div class='uk-thumbnail' style='height: 170px; width: 100px; margin: 5px; padding-left: 4px;'>
      <img src='".$endfoto."' alt='' style='height: 125px; width: 150px;'>
      <div class='uk-thumbnail-caption' style='line-height: 10px; font-size: 10px;'>".$id." - ".$nome."</div>
      </div>      
      
      ";
    
    
    }
    include "config.php";

    $select="
        SELECT
          cad_aluno.cod_aluno,
          cad_aluno.nome,
          cad_aluno.endfoto

        FROM 
          vepinho1.cad_aluno

        where
          cad_aluno.cod_aluno='".$cod_aluno."'
        
        group by
          cad_aluno.nome
    ";
    $resultado=mysql_query($select,$conexao) or die (mysql_error());
    while($row = mysql_fetch_array($resultado))
    {
      echo foto($row['cod_aluno'],$row['nome'],$row['endfoto']);
    }
  
  }
  function lista_chamada($cod_turma){
    include "config.php";

    $select="
        SELECT
          cad_aluno.cod_aluno,
          cad_aluno.nome,
          cad_aluno.endfoto

        FROM 
          vepinho1.cad_turma_alunos,
          vepinho1.cad_aluno

        where
          cad_turma_alunos.cod_aluno=cad_aluno.cod_aluno and
          cod_turma=".$cod_turma."
        
        order by
          cad_aluno.nome
    ";
    $n=20;
    $j=0;
    echo "<table><tr><td></td><td>cod_aluno</td><td>Nome</td>";
    for($i=1;$i<=$n;$i++){
      echo "<td>".$i."</td>";
    }
    echo "</tr>";
    $resultado=mysql_query($select,$conexao) or die (mysql_error());
    while($row = mysql_fetch_array($resultado))
    {
      $j++;
      echo "<tr><td>".$j."</td><td>".$row['cod_aluno']."</td><td>".$row['nome']."<td>";
        for($i=1;$i<$n;$i++){echo "<td></td>";}
      echo "</tr>";
    }
    echo "</table>";
  
  }
  function json_to_array($json){
        $json=str_replace("[","",$json);
        $json=str_replace("]","",$json);
        $json=explode('},{',$json);
        for($i=0;$i<count($json);$i++){
          $json[$i]=str_replace("{","",$json[$i]);
          $json[$i]=str_replace("}","",$json[$i]);
          $json[$i]=str_replace("'",'"',$json[$i]);
          $array[$i]="{".$json[$i]."}";
          if($i==0){
            $keys=$array[$i];
          }
          $array[$i]=json_decode($array[$i],true);
        }
        $keys=json_decode($keys,true);
        $keys=array_keys($keys);
        
        return $array;

  
  
  
  }
  function tooltip($texto){
    return "  <i class='uk-icon-info-circle ' data-uk-tooltip={pos:'right'} title='".$texto."'></i>";
  
  }
  
}

class cadastros{
  function pesquisa($select,$tabela,$id){
    include "config.php";
      $sql=new sql;
      $menus=new menus;
      $pesquisa=new pesquisa;
      $inputs=new inputs;
      $selects=new selects;
      
      
      $resultado=mysql_query($select,$conexao) or die (mysql_error());
      $row = mysql_fetch_array($resultado);
      for($i=0;$i<mysql_num_fields($resultado);$i++){
        $campo=mysql_field_name($resultado,$i);
        $$campo=$row[$campo];
      }

        include "includes/".$tabela.".php";


  }
  function cad_aluno($id){
    $select="SELECT 
					`cod_aluno`,					`nome`,					`cpf`,					`rg`,					`numero`,					`complemento`,					`cidade`,					`uf`,					`endereco`,					`cep`,					`bairro`,					`telefone`,					`email`,					`celular`,
					DATE_FORMAT(`data_nascimento`,'%d/%m/%Y') as data_nascimento,					`nome_mae`,					`nome_pai`,					`endfoto`
				FROM 
					vepinho1.cad_aluno 
				where 
					cod_aluno='".$id."' ;";
    $cadastro=new cadastros;
    $cadastro->pesquisa($select,'cad_aluno','cod_aluno');
  
  }
  function cad_usuario($id){
	  if($_SESSION['tipo_usuario']=="administrador"){
		$select="SELECT * FROM vepinho1.cad_usuario  where cod_usuario='".$id."' ;";
		$cadastro=new cadastros;
		$cadastro->pesquisa($select,'cad_usuario','cod_usuario');
	  }

  
  }
  function cad_periodo($id){
    $select="SELECT * FROM vepinho1.cad_periodo where cod_periodo='".$id."' ;";
    $cadastro=new cadastros;
    $cadastro->pesquisa($select,'cad_periodo','cod_periodo');

  }
  function cad_serie($id){
    $select="SELECT * FROM vepinho1.cad_serie where cod_serie='".$id."' ;";
    $cadastro=new cadastros;
    $cadastro->pesquisa($select,'cad_serie','cod_serie');
  }
  function cad_materia($id){
    $select="SELECT * FROM vepinho1.cad_materia where cod_materia='".$id."' ;";
    $cadastro=new cadastros;
    $cadastro->pesquisa($select,'cad_materia','cod_materia');
  }
  function cad_curriculo($id){
    $select="SELECT * FROM vepinho1.cad_curriculo where cod_curriculo='".$id."' ;";
    $cadastro=new cadastros;
    $cadastro->pesquisa($select,'cad_curriculo','cod_curriculo');
    echo "<div class='uk-grid uk-form' style=''>";
      echo "<div class='uk-width-1-2 uk-grid' style=''>";
        echo "<div class='uk-width-3-4' style=''>";
          $selects=new selects;
          $selects->cod_materia('','Materia');
        echo "</div>";
        echo "<div class='uk-width-1-4' style='padding-left: 10px;min-width: 90px;'>
              <br/>
              <button class='uk-button uk-button-success' type='button' id='bt_cad_curriculo_materias'><i class='uk-icon-plus-circle'></i> Incluir</button>
          </div>";

                
      echo "</div>";
    echo "</div>";  
    echo "<div class='uk-width-1-2' id='div_curriculo_materias'>";
    $cadastro->cad_curriculo_materias($id);
    echo "</div>";

  }
  function cad_curriculo_materias($id){
  
        $select= "
          SELECT 

            cad_curriculo_materias.cod_curriculo_materias as id,
            concat('<button class=bt_excluir_curriculo_materias onclick=excluir_curriculo_materias(',cod_curriculo_materias,'); value=',cod_curriculo_materias,'>excluir</button>') as excluir,            
            concat(cad_curriculo_materias.cod_materia,' - ',cad_materia.nome_materia) as Materia 
          FROM 
            vepinho1.cad_materia, 
            vepinho1.cad_curriculo_materias 
          where 
            cad_materia.cod_materia=cad_curriculo_materias.cod_materia and
            cod_curriculo=".$id.";";
          
        $pesquisa=new pesquisa;
        $json=$pesquisa->json($select);
        
        $html=new html;
        if($json!="[]"){echo $html->json_table($json);}
  
  }
  function cad_turma($id){
    $select="SELECT * FROM vepinho1.cad_turma where cod_turma='".$id."' ;";
    $cadastro=new cadastros;
    $cadastro->pesquisa($select,'cad_turma','cod_turma');

    echo "

      <div class=' uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 uk-overflow-container ' id='div_cad_turma_alunos' style=''>


    ";
    if($id!=""){
          $html=new html;
          echo $html->lista_turma_mod_3($id);
    
    }
    echo "

      </div>";    
  }
  function cad_formulario_lixo_($id){
  //var_dump($_POST);
  //var_dump($_GET);

    include "config.php";
    
    if($id!=""){
      $filtro=" ";
    }else{
      $filtro="";
      }
    $select="SELECT * FROM vepinho1.cad_formulario where cod_formulario='".$id."' ;";
    $resultado=mysql_query($select,$conexao) or die (mysql_error());
    $row = mysql_fetch_array($resultado);
    for($i=0;$i<mysql_num_fields($resultado);$i++){
      $campo=mysql_field_name($resultado,$i);
      $$campo=$row[$campo];
    }
  
    $formulario = new formulario;
    $formulario->cad_formulario($cod_formulario ,$texto_pergunta,$texto_ajuda,$tipo_formulario);
  
  
  }
  function cad_formulario($id){
  //var_dump($_POST);
  //var_dump($_GET);

    $formulario=new formulario;
    $formulario->ficha_complementar($cod_aluno,"S");

  
  }

}

class pesquisa{
  function json($consulta_sql){
        include "config.php";
        $resultado=mysql_query($consulta_sql,$conexao) or die (mysql_error());
        $json="";
        
        while($row = mysql_fetch_array($resultado)){
          for($i=0;$i<mysql_num_fields($resultado);$i++){
            $campo=mysql_field_name($resultado,$i);
            $array[$campo]=$row[$campo];
          }
          $json.=json_encode($array);
        }
        $json=str_replace("}{","},{",$json);  
        $json=str_replace('"',"'",$json);  
        $json="[".$json."]";        
        return $json;
  }
  function cad_aluno($id){
    include "config.php";
    
      
    echo "<div id='grid'></div>";
    
    $filtro="";
    if($id!=""){
      $filtro=" WHERE  cad_aluno.cod_aluno like '%".$id."%' or cad_aluno.nome like '%".$id."%' ";
    }
        $select= "
          SELECT
            cod_aluno as id,
            nome,
			telefone,
			celular,
			email
          FROM 
            vepinho1.cad_aluno 
          ".$filtro." ;";
          
          $pesquisa=new pesquisa;
          $json=$pesquisa->json($select);

          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Nome', key: 'nome', dataType: 'string'},";
          $column.="{headerText: 'Telefone', key: 'telefone', width: '100px', dataType: 'string'},";
          $column.="{headerText: 'Celular', key: 'celular', width: '100px', dataType: 'string'},";
          $column.="{headerText: 'E-mail', key: 'email', width: '150px', dataType: 'string'}";

    

          $tabela="cad_aluno";
          
          $igniteui=new igniteui;
          echo $igniteui->igrid($json,$column,$tabela);
  }
  function cad_usuario($id){
    include "config.php";
    
      
    echo "<div id='grid'></div>";
    
    $filtro="";
    if($id!=""){
      $filtro=" WHERE  cad_usuario.cod_usuario like '%".$id."%' or cad_usuario.usuario like '%".$id."%' ";
    }
        $select= "
          SELECT
            cod_usuario as id,
            usuario,
            nome,
            status
          FROM 
            vepinho1.cad_usuario 
          ".$filtro." ;";
          
          $pesquisa=new pesquisa;
          $json=$pesquisa->json($select);

          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Nome', key: 'nome', dataType: 'string'},";
          $column.="{headerText: 'Usuário', key: 'usuario', dataType: 'string'},";
          $column.="{headerText: 'Status', key: 'status', width: '150px', dataType: 'string'}";
    

          $tabela="cad_usuario";
          
          $igniteui=new igniteui;
          echo $igniteui->igrid($json,$column,$tabela);
  }
  function cad_periodo($id){
    include "config.php";
    
    
    echo "<div id='grid'></div>";    
    
    $filtro="";
    if($id!=""){
      $filtro=" WHERE  cad_periodo.cod_periodo like '%".$id."%' or cad_periodo.nome_periodo like '%".$id."%' ";
    }
    

        $select= "
          SELECT
            cad_periodo.cod_periodo as id,
            cad_periodo.nome_periodo, 
            cad_periodo.sigla_periodo 
          FROM 
            vepinho1.cad_periodo 
          ".$filtro." ;";
          
          $pesquisa=new pesquisa;
          $json=$pesquisa->json($select);
          
          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Sigla', width: '100px', key: 'sigla_periodo', dataType: 'string'},";            
          $column.="{headerText: 'Nome período', key: 'nome_periodo', dataType: 'string'}";  


          
          $tabela="cad_periodo";
          
        $igniteui=new igniteui;
        echo $igniteui->igrid($json,$column,$tabela);
      

  }
  function cad_serie($id){
    include "config.php";
    
    
    echo "<div id='grid'></div>";
    
    $filtro="";
    if($id!=""){
      $filtro=" WHERE  cad_serie.cad_serie like '%".$id."%' or cad_serie.serie like '%".$id."%' ";
    }
    

        $select= "
          SELECT
            cod_serie as id,
            serie,
            ano
          FROM 
            vepinho1.cad_serie 
          ".$filtro." ;";
          
          $pesquisa=new pesquisa;
          $json=$pesquisa->json($select);
          
          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Serie', key: 'serie', width: '250px', dataType: 'string'},";      
          $column.="{headerText: 'Ano', key: 'ano', width: '250px', dataType: 'string'}";      
          
          $tabela="cad_serie";
          
        $igniteui=new igniteui;
        echo $igniteui->igrid($json,$column,$tabela);
      

  }
  function cad_materia($id){
    include "config.php";
    
      
    echo "<div id='grid'></div>";
    
    $filtro="";
    if($id!=""){
      $filtro=" and cad_materia.cod_materia like '%".$id."%' or cad_materia.descricao_materia like '%".$id."%' ";
    }
    

        $select= "
          SELECT
            cad_materia.cod_materia as id,
            cad_materia.nome_materia,
            cad_materia.sigla_materia,
            cad_materia.descricao_materia
          
          FROM 
            vepinho1.cad_materia
            
          ".$filtro." ;";
          
          $pesquisa=new pesquisa;
          $json=$pesquisa->json($select);
          
          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'sigla_materia', key: 'sigla_materia', width: '150px', dataType: 'string'},";            
          $column.="{headerText: 'nome_materia', key: 'nome_materia', width: '250px', dataType: 'string'},";          
          $column.="{headerText: 'descricao_materia', key: 'descricao_materia', width: '250px', dataType: 'string'}";      

  
          
          $tabela="cad_materia";
          
        $igniteui=new igniteui;
        echo $igniteui->igrid($json,$column,$tabela);
      

  }
  function cad_turma($id){
    include "config.php";
    
      
    echo "<div id='grid'></div>";
    
    $filtro="";
    

        $select= "
          SELECT
            cad_turma.cod_turma as id,
            cad_turma.ano_calendario,
            concat(cad_serie.serie,'ª série, ', cad_serie.ano,'ºano') as Serie,
            cad_periodo.nome_periodo as Periodo,
            cad_curriculo.descricao as Curriculo
            
          FROM 
            vepinho1.cad_turma,
            vepinho1.cad_serie,
            vepinho1.cad_periodo,
            vepinho1.cad_curriculo
            
          WHERE

            cad_turma.cod_serie=cad_serie.cod_serie  and
            cad_turma.cod_periodo=cad_periodo.cod_periodo  and
            cad_turma.cod_curriculo=cad_curriculo.cod_curriculo
          ;";
          
          $pesquisa=new pesquisa;
          $json=$pesquisa->json($select);
          
          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'ano_calendario', key: 'ano_calendario', width: '150px', dataType: 'string'},";      
          $column.="{headerText: 'Série', key: 'Serie', width: '150px', dataType: 'string'},";      
          $column.="{headerText: 'Período', key: 'Periodo', width: '150px', dataType: 'string'},";      
          $column.="{headerText: 'Currículo', key: 'Curriculo', width: '150px', dataType: 'string'}";      
          
          $tabela="cad_turma";
          
        $igniteui=new igniteui;
        echo $igniteui->igrid($json,$column,$tabela);
      

  }
  function cad_curriculo($id){
    include "config.php";
    
  
    echo "<div id='grid'></div>";
    
    $filtro="";
    

        $select= "
          SELECT
            cod_curriculo as id,
            descricao
            
          FROM 
            vepinho1.cad_curriculo 
          ".$filtro." ;";
          
          $pesquisa=new pesquisa;
          $json=$pesquisa->json($select);
          
          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'descricao', key: 'descricao', dataType: 'string'}";      
    
          
          $tabela="cad_curriculo";
          
        $igniteui=new igniteui;
        echo $igniteui->igrid($json,$column,$tabela);
      

  }
  function correios($filtro){
  
      $file = "http://www.buscacep.correios.com.br/servicos/dnec/consultaEnderecoAction.do?relaxation=".$filtro."&Metodo=listaLogradouro&TipoConsulta=relaxation&StartRow=1&EndRow=10" ;
      $doc = new DOMDocument();
      @$doc->loadHTMLFile($file);
      $elements = $doc->getElementsByTagName('table');
      echo "<br>
      <h4>Resultado:</h4>
      <table class='uk-table uk-table-hover uk-table-condensed uk-table-striped uk-text-nowrap uk-panel-box' style='font-size: 10px;padding: 2px;'>";

      if (!is_null($elements)) {
      $n=0;
        foreach ($elements as $element) {
        $nodes = $element->childNodes;
        foreach ($nodes as $node) {
          $colunas = $node->childNodes;
          $endereco="";

          foreach ($colunas as $coluna) {$endereco=$endereco . $coluna->nodeValue;} 
          
          if($n>0){
            echo "<tr onclick='selecionarcep(".$n.")' id='".$n."' class='uk-modal-close'>";
            foreach ($colunas as $coluna) {echo  "<td style='max-width: 100px !important;width:auto;' class='uk-text-truncate'>". mb_convert_encoding($coluna->nodeValue,'ISO-8859-1','UTF-8') . "</td>";}
            echo "</tr>";
          }
          $n=$n+1;
          }
        }
      }
      echo "</table>";
  }
  function cad_formulario_lixo_($id){
    include "config.php";
    
      
    echo "<div id='grid'></div>";
    
        $select= "
          SELECT
            cod_formulario as id,
            texto_pergunta
          FROM 
            vepinho1.cad_formulario ;";
          
          $pesquisa=new pesquisa;
          $json=$pesquisa->json($select);

          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'texto_pergunta', key: 'texto_pergunta', width: '150px', dataType: 'string'}";
    

          $tabela="cad_formulario";
          
          $igniteui=new igniteui;
          echo $igniteui->igrid($json,$column,$tabela);  
  
  }
  function cad_formulario($id){
    echo "<div id='pergunta_formulario' class='uk-form uk-form-stacked'>";
      $formulario=new formulario;
      $formulario->ficha_complementar("","S");
    echo "</div>";
  }
  function cad_turma_alunos($id){    
        
          $pesquisa=new pesquisa;
          $consulta_sql="
                Select
                  cad_turma_alunos.cod_turma_alunos as id,
                  cad_turma.ano_calendario,
                  cad_periodo.nome_periodo,
                  cad_serie.ano,
                  cad_serie.serie,
                  cad_curriculo.descricao,
                  cad_aluno.nome as nome_aluno,
                  cad_aluno.email

                from 
                  vepinho1.cad_turma_alunos,
                  vepinho1.cad_turma,
                  vepinho1.cad_aluno,
                  vepinho1.cad_serie,
                  vepinho1.cad_periodo,
                  vepinho1.cad_curriculo
                where
                  cad_turma_alunos.cod_turma=cad_turma.cod_turma and
                  cad_turma_alunos.cod_aluno=cad_aluno.cod_aluno and
                  cad_turma.cod_serie=cad_serie.cod_serie and
                  cad_turma.cod_periodo=cad_periodo.cod_periodo and
                  cad_turma.cod_curriculo=cad_curriculo.cod_curriculo
          
          ";
          $column= "{headerText: 'ID', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Ano calendário', key: 'ano_calendario', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Período', key: 'nome_periodo', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Ano', key: 'ano', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Série', key: 'serie', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'Currículo', key: 'descricao', width: '150px', dataType: 'string'},";
          $column.="{headerText: 'Nome', key: 'nome_aluno', dataType: 'string'},";
         $column.="{headerText: 'E-mail', key: 'email', dataType: 'string'}";
          $tabela="";
          $base=$pesquisa->json($consulta_sql);
          
          echo "<div id='grid'></div>";
          $igniteui=new igniteui;
          $igniteui->igrid2($base,$column,$tabela);
  
  }
}

class lancamento{
  function notas(){
    $relatorios=new relatorios;
    $relatorios->filtros(2);
      function n_provas($cod_turma,$cod_curriculo_materias){
        include "config.php";
        $select="
            SELECT 
              max(cad_nota.prova) as max

            FROM 
              vepinho1.cad_nota,
              vepinho1.cad_turma_alunos,
              vepinho1.cad_curriculo_materias,
              vepinho1.cad_materia,
              vepinho1.cad_aluno

            WHERE
              cad_nota.cod_turma_alunos=cad_turma_alunos.cod_turma_alunos and
              cad_nota.cod_curriculo_materias=cad_curriculo_materias.cod_curriculo_materias and
              cad_curriculo_materias.cod_materia=cad_materia.cod_materia and
              cad_turma_alunos.cod_aluno=cad_aluno.cod_aluno and
              cad_turma_alunos.cod_turma=".$cod_turma." and
              cad_curriculo_materias.cod_curriculo_materias=".$cod_curriculo_materias.";
        ";
        $resultado=mysql_query($select,$conexao) or die (mysql_error());
        $valores = mysql_fetch_array($resultado);
        return $valores;
      
      }
    
    if(isset($_POST['cod_turma']) and $_POST['cod_turma']!='' and isset($_POST['cod_curriculo_materias']) and $_POST['cod_curriculo_materias']!=''){
      $n_provas=n_provas($_POST['cod_turma'],$_POST['cod_curriculo_materias']);
      $provas="";
	  $left_join="";
      if(isset($_POST['opcao_lancamento']) and $_POST['opcao_lancamento']=="novo"){$add_prova=1;}else{$add_prova=0;}
      for($i=1;$i<=$n_provas['max']+$add_prova;$i++){
        
		//$provas.=",max(if((cad_nota.prova=".$i."),cad_nota.nota,0)) as `prova".$i."` ";
		$provas.="
			,tb_p_".$i.".nota as prova".$i."";
		$left_join.="
			left join (SELECT max(nota) as nota, cod_turma_alunos as id FROM vepinho1.cad_nota where prova=".$i." and cod_curriculo_materias=".$_POST['cod_curriculo_materias']." group by cod_turma_alunos) as tb_p_".$i." on tb_p_".$i.".id=cad_turma_alunos.cod_turma_alunos
		";
		
      }
      
  
     $consulta_sql="
             SELECT 
                cad_materia.nome_materia,
                cad_aluno.nome,
				cad_curriculo_materias.cod_curriculo_materias,
				cad_turma_alunos.cod_turma_alunos as id
				".$provas."
              FROM 

                vepinho1.cad_curriculo_materias,
                vepinho1.cad_materia,
                vepinho1.cad_aluno,
                vepinho1.cad_turma_alunos				
			
			".$left_join."
			
			 WHERE
                cad_curriculo_materias.cod_materia=cad_materia.cod_materia and
                cad_turma_alunos.cod_aluno=cad_aluno.cod_aluno and
                cad_turma_alunos.cod_turma=".$_POST['cod_turma']." and
                cad_curriculo_materias.cod_curriculo_materias=".$_POST['cod_curriculo_materias']."
            
              group by
               cad_turma_alunos.cod_turma_alunos
              
              order by
                cad_aluno.nome
				
				
      ";

      $pesquisa=new pesquisa;
      $json=$pesquisa->json($consulta_sql);
          
          $column= "{headerText: 'id', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'cod_curriculo_materias', key: 'cod_curriculo_materias', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'nome_materia', key: 'nome_materia', width: '150px', dataType: 'string'},";
          $column.="{headerText: 'nome', key: 'nome', dataType: 'string'},";
          for($i=1;$i<=$n_provas['max']+$add_prova;$i++){
          $column.="{headerText: 'P".$i."', key: 'prova".$i."', width: '50px', dataType: 'decimal'},";
          }
    
          $column_editavel="
                        {
                            columnKey: 'id',
                            readOnly: true
                        },
                        {
                            columnKey: 'cod_curriculo_materias',
                            readOnly: true
                        },
                        {
                            columnKey: 'nome_materia',
                            readOnly: true
                        },
                        {
                            columnKey: 'nome',
                            readOnly: true
                        }";
          for($i=1;$i<=$n_provas['max']+$add_prova;$i++){
            $column_editavel.=",{
              columnKey: 'prova".$i."',
              editorType: 'numeric'
            }";
          }
          echo "
            <div class='uk-width-1-1' style='padding-left: 10px; margin-bottom: 30px;' >
            
            
              <article class='uk-article'>
                <hr class='uk-article-divider'>              
                <h1 class='uk-article-title'><i class='uk-icon-warning '></i> Importante! </h1>
                <p class='uk-article-meta'>Instruções para lançamento de notas</p>
                  <ul class='uk-list'>
                    <li>1.  Clique duas vezes na linha que deseja editar</li>
                    <li>2.  Digite as notas (use apenas números separados por ponto)</li>
                    <li>3.  Clique no botão salvar</li>
                  </ul>

              </article>            

            </div>
          
          ";
          echo "<div class='uk-width-1-1' ><div id='grid' class=''></div></div>";
          echo "<div class='uk-width-1-1 ' style='margin-top: 20px; margin-bottom: 20px;text-align: right;' ><a href='#' class='uk-button uk-button-success'  id='bt_salvar_nota' ><i class='uk-icon-save'></i> Salvar</a></div>";
          $igniteui=new igniteui;
          echo $igniteui->igrid_editavel($json,$column,$column_editavel);
    
    }

    
    
    
  }
  function chamada(){
	  

	function data($data){

		if(strpos($data,"-")!==false){
			$dat = explode ("-",$data,3);
			return $dat[2]."/".$dat[1]."/".$dat[0];
		}else{
			$dat = explode ("/",$data,3);
			return $dat[2]."-".$dat[1]."-".$dat[0];
		}

	}
	  
    $relatorios=new relatorios;
    $relatorios->filtros(3);
	include "config.php";
    
    if(
	
	isset($_POST['cod_turma']) and 
	isset($_POST['cod_curriculo_materias']) and 
	isset($_POST['opcao_lancamento']) and 
	$_POST['cod_curriculo_materias']!='' and
	$_POST['cod_turma']!='' and 
		(
			($_POST['opcao_lancamento']=="novo" and isset($_POST['data_aula']) and $_POST['data_aula']!="")
		or
			($_POST['opcao_lancamento']=="editar" and isset($_POST['data_aula'])==false)
		)
	){
		
		
	
        $select="
            SELECT 
              cad_chamada.data

            FROM 
              vepinho1.cad_chamada,
              vepinho1.cad_turma_alunos,
              vepinho1.cad_curriculo_materias

            WHERE
              cad_chamada.cod_turma_alunos=cad_turma_alunos.cod_turma_alunos and
              cad_chamada.cod_curriculo_materias=cad_curriculo_materias.cod_curriculo_materias and
              cad_turma_alunos.cod_turma=".$_POST['cod_turma']." and
              cad_curriculo_materias.cod_curriculo_materias=".$_POST['cod_curriculo_materias']."
			  
			GROUP BY	
				cad_chamada.data

			ORDER BY	
				cad_chamada.data

        ";
		
		$data_aula="";
		$left_join="";
		$column_="";
		$column_editavel_="";
		$datas="";
		$i=0;
		$resultado=mysql_query($select,$conexao) or die (mysql_error());	  
		while($row = mysql_fetch_array($resultado))
			{

				$data_aula.="
					,tb_data_".$i.".presenca as data_".$i."  ";
				$left_join.="
					LEFT JOIN (SELECT cod_turma_alunos, if(presenca=1,'checked','') as presenca FROM vepinho1.cad_chamada where cod_curriculo_materias=".$_POST['cod_curriculo_materias']." and data='".$row['data']."') as tb_data_".$i." on tb_data_".$i.".cod_turma_alunos=cad_turma_alunos.cod_turma_alunos
				";
				$datas.=$row['data']."|";
				$column_.="{headerText: '<div style=width:50%; data-uk-tooltip title=".$row['data']." class=uk-badge>".$i."</div>', key: 'data_".$i."', width: '40px', dataType: 'string',template:'<input type=checkbox class=data_chamada data_=".$i." {data_".$i."}  >'},";
				$column_=str_replace(" {data_",' ${data_',$column_);
				$column_editavel_.="
						,{
                            columnKey: 'data_".$i."',
                            readOnly: true
                        }				
				";
				
				$i++;
			}		
		if(isset($_POST['data_aula']) and $_POST['data_aula']!=""){

				$data_aula.="
					,tb_data_".$i.".presenca as data_".$i."  ";
				$left_join.="
					LEFT JOIN (SELECT cod_turma_alunos, if(presenca=1,'checked','') as presenca FROM vepinho1.cad_chamada where cod_curriculo_materias=".$_POST['cod_curriculo_materias']." and data='".data($_POST['data_aula'])."') as tb_data_".$i." on tb_data_".$i.".cod_turma_alunos=cad_turma_alunos.cod_turma_alunos
				";
				$datas.=data($_POST['data_aula'])."|";
				$column_.="{headerText: '<div style=width:50%; data-uk-tooltip title=".data($_POST['data_aula'])." class=uk-badge>".$i."</div>', key: 'data_".$i."', width: '40px', dataType: 'string',template:'<input type=checkbox class=data_chamada data_=".$i." {data_".$i."}  >'},";
				$column_=str_replace(" {data_",' ${data_',$column_);
				$column_editavel_.="
						,{
                            columnKey: 'data_".$i."',
                            readOnly: true
                        }				
				";
				
				$i++;
			
		}			
	$resultado=mysql_query("SET @l=0;",$conexao) or die (mysql_error());
     $consulta_sql="
			

             SELECT 
				if(@rn=null,@rn=0,@rn:=@rn+1) AS linha	,		 
                cad_materia.nome_materia,
                cad_aluno.nome,
				cad_curriculo_materias.cod_curriculo_materias,
				cad_turma_alunos.cod_turma_alunos as id
				".$data_aula."
              FROM 

                vepinho1.cad_curriculo_materias,
                vepinho1.cad_materia,
                vepinho1.cad_aluno,
                vepinho1.cad_turma_alunos				
			
			".$left_join."
			
			 WHERE
                cad_curriculo_materias.cod_materia=cad_materia.cod_materia and
                cad_turma_alunos.cod_aluno=cad_aluno.cod_aluno and
                cad_turma_alunos.cod_turma=".$_POST['cod_turma']." and
                cad_curriculo_materias.cod_curriculo_materias=".$_POST['cod_curriculo_materias']."
            
              group by
               cad_turma_alunos.cod_turma_alunos
              
              order by
                cad_aluno.nome
				
				
      ";
	//echo $consulta_sql;
      $pesquisa=new pesquisa;
      $json=$pesquisa->json($consulta_sql);
          
          $column= "{headerText: 'id', key: 'id', width: '50px', dataType: 'string'},";
          $column.="{headerText: 'nome', key: 'nome',width: '300px', dataType: 'string'},";
          $column.=$column_;
    
          $column_editavel="
                        {
                            columnKey: 'id',
                            readOnly: true
                        },
                        {
                            columnKey: 'cod_curriculo_materias',
                            readOnly: true
                        },
                        {
                            columnKey: 'nome_materia',
                            readOnly: true
                        },
                        {
                            columnKey: 'nome',
                            readOnly: true
                        }"
						.$column_editavel_;

			
          echo "
            <div class='uk-width-1-1' style='padding-left: 10px; margin-bottom: 30px;' >
            
            
              <article class='uk-article'>
                <hr class='uk-article-divider'>              
                <h1 class='uk-article-title'><i class='uk-icon-warning '></i> Importante! </h1>
                <p class='uk-article-meta'>Instruções para lançamento de notas</p>
                  <ul class='uk-list'>
                    <li>1.  Flegue a coluna correspondente à data</li>
                    <li>2.  Clique no botão salvar</li>
                  </ul>

              </article>            
			<input type='text' id='datas' style='visibility: hidden;' value='".$datas."'>
            </div>
          
          ";
          echo "<div class='uk-width-1-1' ><div id='grid' class=''></div></div>";
          echo "<div class='uk-width-1-1 ' style='margin-top: 20px; margin-bottom: 20px;text-align: right;' ><a href='#' class='uk-button uk-button-success'  id='bt_salvar_chamada' onclick='' ><i class='uk-icon-save'></i> Salvar</a></div>";
          $igniteui=new igniteui;
          echo $igniteui->igrid_editavel($json,$column,$column_editavel);
    
    }

    
    
    
  }
  
  
}

class relatorios{
  function filtros($tipo){
    $inputs=new inputs;
    $selects=new selects;
    if($tipo==1){
      echo "<form class='uk-form' action='#' method='post'>";
      $selects=new selects;
      $selects->turma('','Turma');

      
      echo "
        <div class='uk-width-1-1' style='margin-top: 15px; margin-bottom: 20px;'>

            <button class='uk-button uk-button-danger' type='submit' id='' ><i class='uk-icon-binoculars'></i> Pesquisar</button>
          </div>
        </div>
      </form>";
    }
    if($tipo==2){
      echo "<form class='uk-form' action='#' method='post'>";
      if(isset($_POST['cod_turma']) and $_POST['cod_turma']!=''){$cod_turma=$_POST['cod_turma'];}else{$cod_turma='';}
      $selects=new selects;
      $selects->turma($cod_turma,'Turma');
      if(isset($_POST['cod_turma']) and $_POST['cod_turma']!=''){
        $selects->cad_curriculo_materias($_POST['cod_turma'],'Materia');
        $selects->opcao_lancamento('','Ação');
      }

      
      echo "
        <div class='uk-width-1-1' style='margin-top: 15px; margin-bottom: 20px;'>

            <button class='uk-button uk-button-danger' type='submit' id='' ><i class='uk-icon-binoculars'></i> Pesquisar</button>

          </div>
        </div>
      </form>";
    }
    if($tipo==3){
      echo "<form class='uk-form' action='#' method='post'>";
      if(isset($_POST['cod_turma']) and $_POST['cod_turma']!=''){$cod_turma=$_POST['cod_turma'];}else{$cod_turma='';}
      $selects=new selects;
      $selects->turma($cod_turma,'Turma');
      if(isset($_POST['cod_turma']) and $_POST['cod_turma']!=''){
        $selects->cad_curriculo_materias($_POST['cod_turma'],'Materia');
      }	  
      if(isset($_POST['cod_curriculo_materias']) and $_POST['cod_curriculo_materias']!=''){
        $selects->opcao_lancamento('','Ação');
      }
      if(isset($_POST['opcao_lancamento']) and $_POST['opcao_lancamento']=='novo'){
		  if(isset($_POST['data_aula'])){$data_aula=$_POST['data_aula'];}else{$data_aula="";}
		echo "<div style='width:150px;'>";
			$inputs->input_form_row($data_aula,'data_aula','data_aula','00/00/0000',' onkeyup=formatar_data_2_(this);');
		echo "</div>";
      }
	  
	  
      echo "
        <div class='uk-width-1-1' style='margin-top: 15px; margin-bottom: 20px;'>

            <button class='uk-button uk-button-danger' type='submit' id='' ><i class='uk-icon-binoculars'></i> Pesquisar</button>

          </div>
        </div>
      </form>";
    }

  
  }
  function carometro(){
    $relatorios=new relatorios;
    $relatorios->filtros(1);
    
	
	
	
    if (isset($_POST['cod_turma']) and $_POST['cod_turma']!=''){
		include "config.php";
		$cod_turma=$_POST['cod_turma'];
		if($cod_turma!=null and $cod_turma!=""){
			$filtro=" and vepinho1.cad_turma_alunos.cod_turma='".$cod_turma."' ";
			
		}
		$selectalunos= "
		
			select
				cad_turma_alunos.*,
				cad_turma.*,
				cad_serie.serie,
				cad_serie.ano
			from
				vepinho1.cad_turma_alunos,
				vepinho1.cad_turma,
				vepinho1.cad_serie
			where

				cad_turma_alunos.cod_turma=cad_turma.cod_turma and
				cad_turma.cod_serie=cad_serie.cod_serie
				".$filtro."
			group by 
				cad_serie.serie,
				cad_serie.ano
		";

		$resultadoalunos=mysql_query($selectalunos,$conexao) or die (mysql_error());


		echo "<button class='uk-button uk-button-mini uk-button-primary' style='padding-left: 5px; padding-right: 5px; right: 20px; position: absolute;' type='button' onclick=imprimir('div_relatorio');><i class='uk-icon-print'></i> Imprimir</button>";
		echo "<div id='div_relatorio' name='div_relatorio'>";
		while($rowalunos = mysql_fetch_array($resultadoalunos))
		  {
			echo "
					<div class='divboletim' style='width: 40%;'>
					<h2>".$rowalunos['ano_calendario']." - ".$rowalunos['serie']."ªserie  - ".$rowalunos['ano']."ºano </h2>";
			echo "</div>";
		  }		
				$html=new html;
				$html->carometro($_POST['cod_turma']);
		echo "</div>";
    }
  
  
  }
  function lista_chamada(){
    $relatorios=new relatorios;
    $relatorios->filtros(1);
    
    if (isset($_POST['cod_turma']) and $_POST['cod_turma']!=''){
		include "config.php";
		$cod_turma=$_POST['cod_turma'];
		if($cod_turma!=null and $cod_turma!=""){
			$filtro=" and vepinho1.cad_turma_alunos.cod_turma='".$cod_turma."' ";
			
		}
		$selectalunos= "
		
			select
				cad_turma_alunos.*,
				cad_turma.*,
				cad_serie.serie,
				cad_serie.ano
			from
				vepinho1.cad_turma_alunos,
				vepinho1.cad_turma,
				vepinho1.cad_serie
			where

				cad_turma_alunos.cod_turma=cad_turma.cod_turma and
				cad_turma.cod_serie=cad_serie.cod_serie
				".$filtro."
			group by 
				cad_serie.serie,
				cad_serie.ano
		";

		$resultadoalunos=mysql_query($selectalunos,$conexao) or die (mysql_error());		
		echo "<button class='uk-button uk-button-mini uk-button-primary' style='padding-left: 5px; padding-right: 5px; right: 20px; position: absolute;' type='button' onclick=imprimir('div_relatorio');><i class='uk-icon-print'></i> Imprimir</button>";
		echo "<div id='div_relatorio' name='div_relatorio'>";
		while($rowalunos = mysql_fetch_array($resultadoalunos))
		  {
			echo "
					<div class='divboletim' style='width: 40%;'>
					<h2>".$rowalunos['ano_calendario']." - ".$rowalunos['serie']."ªserie  - ".$rowalunos['ano']."ºano </h2>";
			echo "</div>";
		  }	
		
			$html=new html;
			$html->lista_chamada($_POST['cod_turma']);
		echo "</div>";
    }
  
  
  }
  function boletim_aluno($cod_aluno,$cod_turma, $grafico_){
		
		include "config.php";
		
		$filtro="";
		$filtronota="";
		$categoria="";
		
		if($cod_turma!=null and $cod_turma!=""){
			$filtro.=" and vepinho1.cad_turma_alunos.cod_turma='".$cod_turma."' ";
			
		}
		if($cod_aluno!=null and $cod_aluno!=""){
			$filtro.=" and vepinho1.cad_turma_alunos.cod_aluno='".$cod_aluno."' ";
			
		}
		
		
		
        function formatadata($data, $tipo = 1) {
        $data = str_replace('-', '/', $data);
        $dividir = explode("/", $data);
        $parte1 = $dividir[0]; $parte2 = $dividir[1]; $parte3 = $dividir[2];
        $data = "$parte3-$parte2-$parte1"; 
        if ($tipo == 1) $data = str_replace('-', '/', $data);
        return $data;
        }
		
		$selectalunos= "
		
			select
				cad_turma_alunos.*,
				cad_aluno.*,
				cad_turma.*,
				cad_serie.serie,
				cad_serie.ano
			from
				vepinho1.cad_turma_alunos,
				vepinho1.cad_aluno,
				vepinho1.cad_turma,
				vepinho1.cad_serie
			where
				cad_aluno.cod_aluno =cad_turma_alunos.cod_aluno and
				cad_turma_alunos.cod_turma=cad_turma.cod_turma and
				cad_turma.cod_serie=cad_serie.cod_serie
				".$filtro."
			order by 
				cad_aluno.nome

		";

		$resultadoalunos=mysql_query($selectalunos,$conexao) or die (mysql_error());
		$n=0;
		while($rowalunos = mysql_fetch_array($resultadoalunos))
		  {
			echo "
				<div class='divboletim' style='width: 100%;'>
					<h2>".$rowalunos['cod_turma_alunos']." - ".$rowalunos['nome']."</h2>
					<h4>".$rowalunos['ano_calendario']." - ".$rowalunos['serie']."ªserie  - ".$rowalunos['ano']."ºano </h4>";


	///selecinonar provas
			$selectprovas="
				SELECT 
					prova,
					cod_curriculo_materias
				FROM 
					vepinho1.cad_nota
				WHERE
					cad_nota.cod_turma_alunos = '".$rowalunos['cod_turma_alunos']."'			
				group by 
					prova";
			$s="";
			$tbnota="<tr><td></td><td>Materia</td>";
			$j=1;
			$resultadoprovas=mysql_query($selectprovas,$conexao) or die (mysql_error());	  
				while($rowprovas = mysql_fetch_array($resultadoprovas))
					{
					///montar filtro para provas
					$filtronota.=",max(IF(cad_nota.prova='".$rowprovas['prova']."',cad_nota.nota,0)) as P".$rowprovas['prova']."  ";
					$tbnota.="<td>P".$rowprovas['prova']."</td>";
					$j=$j+1;
					$serie[$j]="{name: 'P".$rowprovas['prova']."',
							data: [";
					}
					$tbnota.="<td>Media</td>";	
					///echo "#".$filtronota."#";
			$tbnota.="</tr>";

					///grade de notas	
					$selectprovas="
									select 
										cad_nota.cod_curriculo_materias as cod_curriculo_materias,
										cad_materia.nome_materia
										".$filtronota." 
									from
										vepinho1.cad_nota,
										vepinho1.cad_curriculo_materias,
										vepinho1.cad_materia
										
									where 
										cad_nota.cod_turma_alunos='".$rowalunos['cod_turma_alunos']."' and
										cad_nota.cod_curriculo_materias=cad_curriculo_materias.cod_curriculo_materias and
										cad_curriculo_materias.cod_materia=cad_materia.cod_materia
									group by 
										cad_curriculo_materias.cod_materia
										
										
										";
					//echo $selectprovas."<br>";
					$resultadoprovas=mysql_query($selectprovas,$conexao) or die (mysql_error());	  
						while($rowprovas = mysql_fetch_array($resultadoprovas))
							{
								$soma=0;
								$n=0;
								echo "<tr>";
								$tbnota.= "<tr>";
								$categoria.="'".$rowprovas[1]."',";
								for($i=0;$i<=$j;$i++){
										$tbnota.="<td>".$rowprovas[$i]."</td>";
										if ($rowprovas[$i]>=0 and $i>=2){
												$soma=$soma+$rowprovas[$i];$n=$n+1;
												$serie[$i].=$rowprovas[$i].",";
												}
												
								}
								if($soma!=0){($soma_=$soma/$n);}else{$soma_=$soma;}
								$tbnota.= "<td>".number_format($soma_, 2, ',', '.')."</td></tr>";
							}
					for($i=2;$i<=$j;$i++){
						$serie[$i].="]},";
					}
					echo "<table  cellspacing=0 style ='width: 100%;'>".$tbnota."</table>";
					$grafico= "
							<script type='text/javascript'>
								$(function () {
										$('#grafico".$rowalunos['cod_turma_alunos']."').highcharts({
											chart: {
												type: 'bar'
											},
											title: {
												text: 'Desempenho'
											},
											xAxis: {
												categories: [".$categoria."],
												title: {
													text: null
												}
											},
											yAxis: {
												min: 0,
												title: {
													text: 'Nota de 0 a 10',
													align: 'high'
												},
												labels: {
													overflow: 'justify'
												}
											},
											tooltip: {
												valueSuffix: ''
											},
											plotOptions: {
												bar: {
													dataLabels: {
														enabled: true
													}
												}
											},
											credits: {
												enabled: false
											},
											series: [";
											for($i=2;$i<=$j;$i++){
												$grafico.=$serie[$i];
											}		
										$grafico.="
											]
										});
									});
									

						</script>
					

					";
					if($grafico_=="S"){
						echo $grafico;
						echo "<div id='grafico".$rowalunos['cod_turma_alunos']."' style='margin-top: 10px;border-top: 1px solid #CCC;min-width: 300px; max-width: 100%; height: 300px;'></div>";
					}
					echo "<div style='border-top: 1px solid #CCC;padding: 6px 0px 0px;'>".date("d/m/Y  H:m:s")."</div>";
					echo "</div>";
		  } 

  }
  function boletim(){
    $relatorios=new relatorios;
    $relatorios->filtros(1);


	   if (isset($_POST['cod_turma']) and $_POST['cod_turma']!=''){
			include "config.php";
			$cod_turma=$_POST['cod_turma'];
			if($cod_turma!=null and $cod_turma!=""){
				$filtro=" and vepinho1.cad_turma_alunos.cod_turma='".$cod_turma."' ";
				
			}
			$selectalunos= "
			
				select
					cad_turma_alunos.*,
					cad_turma.*,
					cad_serie.serie,
					cad_serie.ano
				from
					vepinho1.cad_turma_alunos,
					vepinho1.cad_turma,
					vepinho1.cad_serie
				where

					cad_turma_alunos.cod_turma=cad_turma.cod_turma and
					cad_turma.cod_serie=cad_serie.cod_serie
					".$filtro."
				group by 
					cad_serie.serie,
					cad_serie.ano
			";

			$resultadoalunos=mysql_query($selectalunos,$conexao) or die (mysql_error());		
			echo "<button class='uk-button uk-button-mini uk-button-primary' style='padding-left: 5px; padding-right: 5px; right: 20px; position: absolute;' type='button' onclick=imprimir('div_relatorio');><i class='uk-icon-print'></i> Imprimir</button>";
			echo "<div id='div_relatorio' name='div_relatorio'>";
			while($rowalunos = mysql_fetch_array($resultadoalunos))
			  {
				echo "
						<div class='divboletim' style='width: 40%;'>
						<h2>".$rowalunos['ano_calendario']." - ".$rowalunos['serie']."ªserie  - ".$rowalunos['ano']."ºano </h2>";
				echo "</div>";
			  }	
			$relatorios->boletim_aluno('',$_POST['cod_turma'],'N');
			echo "</div>";

		
	   }
  
  
  }
  function grade_notas(){
    echo "<p><i class='uk-icon-warning'></i> Em construção</p>";
  }
}
class imprimir{
  function ficha_ativo($id){
    include "config.php";

  
    $select="
        SELECT 
          cad_itens.*,
          cad_filial.descricao as filial,
          cad_localizacao.descricao as localizacao,
          cad_fornecedor. nome_razao_social,
          cad_grupo_patrimonio.descricao as grupo,
          cad_grupo_patrimonio.vida_util as vida_util_grupo,
          cad_grupo_patrimonio.taxa_depreciacao_anual as taxa_depreciacao_anual_grupo,
          cad_tipo_aquisicao.descricao as tipo_aquisicao,
          cad_tipo_documento.descricao as tipo_documento,
          cad_tipo_patrimonio.descricao as tipo_patrimonio,
          cad_status_patrimonio.descricao as status_patrimonio

          
         FROM 
          vepinho1.cad_itens

        left join (vepinho1.cad_filial) on cad_itens.cod_filial=cad_filial.cod_filial
        left join (vepinho1.cad_localizacao) on cad_itens.cod_localizacao=cad_localizacao.cod_localizacao
        left join (vepinho1.cad_fornecedor) on cad_itens.cod_fornecedor=cad_fornecedor.cod_fornecedor
        left join (vepinho1.cad_grupo_patrimonio) on cad_itens.cod_grupo_patrimonio=cad_grupo_patrimonio.cod_grupo_patrimonio
        left join (vepinho1.cad_tipo_aquisicao) on cad_itens.cod_tipo_aquisicao=cad_tipo_aquisicao.cod_tipo_aquisicao
        left join (vepinho1.cad_tipo_documento) on cad_itens.cod_tipo_documento=cad_tipo_aquisicao.cod_tipo_aquisicao
        left join (vepinho1.cad_tipo_patrimonio) on cad_itens.cod_tipo_patrimonio=cad_tipo_patrimonio.cod_tipo_patrimonio
        left join (vepinho1.cad_status_patrimonio) on cad_itens.cod_status_patrimonio=cad_status_patrimonio.cod_status_patrimonio

        where cad_itens.cod_item='".$id."' ;";
        
      $resultado=mysql_query($select,$conexao) or die (mysql_error());
      $row = mysql_fetch_array($resultado);
      for($i=0;$i<mysql_num_fields($resultado);$i++){
        $campo=mysql_field_name($resultado,$i);
        $$campo=$row[$campo];
      }    
      $data_aquisicao= DateTime::createFromFormat('Y-m-d', $data_aquisicao)->format('d/m/Y');
      $data_inclusao= DateTime::createFromFormat('Y-m-d H:i:s', $data_inclusao)->format('d/m/Y');
      $data_inicio_depreciacao= DateTime::createFromFormat('Y-m-d', $data_inicio_depreciacao)->format('d/m/Y');
      $data_baixa= DateTime::createFromFormat('Y-m-d', $data_baixa)->format('d/m/Y');


///////////////////////////////////////////////////////////////////////////////////  
  echo "<style>
    .uk-grid{
      margin-top: 2px !important;
    }
    label{
       font-weight: bold;
    }
    p{
      margin-top: 2px !important;
    }
    .uk-grid:not(.uk-grid-preserve) > * {
      padding: 3px !important;
    }  
    [class*='uk-width'] {
      padding: 5px !important;
      margin: 0px !important;
    }
    .uk-panel {

      height: 40px !important;
    }
    .uk-panel-box {
      padding: 10px !important;
    }
  
  </style>";

  echo  "<div class='' style='width: 850px;margin-left:80px;'>  
        <div class='uk-grid'>
          <div class='uk-width-1-4'>
            <img src='imagens/logo.png' >          
          </div>
          <div class='uk-width-3-4' style='text-align: right;'>
          <p>".$inicio."</p>
          <p>".$cnpj." - ".$razao_social."</p>
          </div>
        </div>            


        <hr class='uk-article-divider'>  
        <h3 class='tm-article-subtitle'>Ficha de ativo</h3>      

            <div class='uk-grid'>
              <div class='uk-width-1-2'>
                <div class=' uk-panel uk-panel-box '>
                  <label>codigo do item</label>
                  <p>".$cod_item."</p>
                </div>
              </div>
              <div class='uk-width-1-2'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Status</label>
                  <p>".$cod_status_patrimonio." - ".$status_patrimonio."</p>
                
                </div>            
              </div>                
            </div>


            <div class='uk-grid'>  
          
              <div class='uk-width-1-1'>
                <div class=' uk-panel uk-panel-box '>              
                  <label>Descrição do Item</label>
                  <p>".$descricao."</p>
                </div>
              </div>
            </div>


            <div class='uk-grid'>  
              <div class='uk-width-1-3'>
                <div class=' uk-panel uk-panel-box '>              
                  <label>Número de plaqueta</label>
                  <p>".$codigo_patrimonio."</p>
                </div>
              </div>
              <div class='uk-width-2-3'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Código de barras</label>
                  <p>".$codigo_barras."</p>
                </div>
              </div>
            </div>


            <div class='uk-grid'>              
              <div class='uk-width-3-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Grupo de patrimônio</label>
                  <p>".$cod_grupo_patrimonio." - ".$grupo."</p>
                </div>    
              </div>  
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Vida útil do grupo</label>
                  <p>".$vida_util_grupo."</p>
                </div>    
              </div>  
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Depr. a.a. do grupo</label>
                  <p>".$taxa_depreciacao_anual_grupo."</p>
                </div>    
              </div>  
            </div>  
            <div class='uk-grid'>
              <div class='uk-width-1-1'>
                <div class=' uk-panel uk-panel-box '>              
                  <label>Item pai</label>
                  <p>".$cod_item_pai."</p>
                </div>
              </div>
            </div>  
            <div class='uk-grid'>
              <div class='uk-width-1-3'>
                <div class=' uk-panel uk-panel-box '>              
                  <label>Filial</label>
                  <p>".$cod_filial." - ".$filial."</p>      
                </div>            
              </div>            
              <div class='uk-width-2-3'>
                <div class=' uk-panel uk-panel-box '>              
                  <label>Localização</label>
                  <p>".$cod_localizacao." - ".$localizacao."</p>      
                </div>            
              </div>            
            </div>

        <hr class='uk-article-divider'>        

            <div class='uk-grid'>
              <div class='uk-width-1-1'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Fornecedor</label>
                  <p>".$cod_fornecedor." - ".$nome_razao_social."</p>
                </div>  
              </div>  
            </div>  
            <div class='uk-grid'>
              <div class='uk-width-1-2'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Tipo de patrimônio</label>
                  <p>".$cod_tipo_patrimonio." - ".$tipo_patrimonio."</p>
                </div>            
              </div>            
              <div class='uk-width-1-2'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Aquisição</label>
                  <p>".$cod_tipo_aquisicao." - ".$tipo_aquisicao."</p>
                </div>            
              </div>    
            </div>  
            <div class='uk-grid'>              
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Tipo de documento</label>
                  <p>".$cod_tipo_documento." - ".$tipo_documento."</p>
                </div>            
              </div>            
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Número documento</label>
                  <p>".$numero_documento."</p>
                </div>
              </div>
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Número de Série</label>
                  <p>".$serie."</p>
                </div>            
              </div>
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Quantidade</label>
                  <p>".$quantidade."</p>
                </div>
              </div>
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Unidade</label>
                  <p>".$unidade."</p>
                </div>
              </div>                
            </div>  


        <hr class='uk-article-divider'>

            <div class='uk-grid'>
        
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Valor de aquisição</label>
                  <p>".$valor_aquisicao."</p>
                </div>
              </div>
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Valor atual</label>
                  <p>".$valor_atual."</p>
                </div>
              </div>
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Valor residual</label>
                  <p>".$valor_residual."</p>
                </div>
              </div>
            
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Vida útil</label>
                  <p>".$vida_util."</p>
                </div>
              </div>          
              <div class='uk-width-1-5'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Depreciação a.a.</label>
                  <p>".$taxa_depreciacao_anual."</p>
                </div>
              </div>
            </div>  
            <div class='uk-grid'>                
              <div class='uk-width-1-4'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Aquisição</label>
                  <p>".$data_aquisicao."</p>
                </div>
              </div>  
              <div class='uk-width-1-4'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Inclusão</label>
                  <p>".$data_inclusao."</p>
                </div>
              </div>
              <div class='uk-width-1-4'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Inicio depreciação</label>
                  <p>".$data_inicio_depreciacao."</p>
                </div>
              </div>            
              <div class='uk-width-1-4'>
                <div class=' uk-panel uk-panel-box '>
                  <label>Baixa</label>
                  <p>".$data_baixa."</p>
                </div>
              </div>
            </div>            
          </div>
        </div>";
  
  
///////////////////////////////////////////////////////////////////////////////////  
  
  
  }

}

class layout{
  function layout_1(){
}


}






class formulario{

  function listar_formulario($cod_formulario, $texto_pergunta, $texto_ajuda, $tipo_formulario,$editar,$respostas){

      $html=new html;
      if($editar=='S'){
        $editar="pergunta_formulario' tipo_formulario='".$tipo_formulario."'";
        $bt_editar="
          <div class='uk-width-1-1' style='text-align: right;'>
            <span style='padding-top: 8px; padding-left: 8px; padding-right: 6px;' class='uk-button uk-button-primary bt_editar_formulario' onclick='editar_formulario(this);' cod_formulario='".$cod_formulario."'  data-uk-tooltip={pos:'left'} title='Editar'><i class='uk-icon-edit'></i></span>
          </div>
          ";
      
      }else{
        $editar="";
        $bt_editar="";
      }
      include "config.php";
      $select_itens="SELECT 
                cad_formulario_resposta.*,
                cad_formulario.texto_pergunta, 
                cad_formulario.texto_ajuda 
              FROM 
                vepinho1.cad_formulario_resposta,
                vepinho1.cad_formulario 
              where 
                cad_formulario_resposta.cod_formulario=cad_formulario.cod_formulario and
                cad_formulario.cod_formulario='".$cod_formulario."';";
      $resultado_itens=mysql_query($select_itens,$conexao) or die (mysql_error());
      $itens="";
      $j=0;
      $options="";
        while($row = mysql_fetch_array($resultado_itens)){
          for($i=0;$i<mysql_num_fields($resultado_itens);$i++){
            $campo=mysql_field_name($resultado_itens,$i);
            $array[$campo]=$row[$campo];
          }
          $itens[$j]=$array;
          $j++;
        }
        //var_dump($itens);
    echo "<div class='uk-grid uk-panel uk-panel-divider' id='pergunta_formulario_".$cod_formulario."' style='margin-bottom: 10px; border-bottom: 1px solid rgb(204, 204, 204); margin-left: 0px; padding-bottom: 20px; padding-left: 0px;'>";
    echo $bt_editar;

    switch ($tipo_formulario) {
    case 'texto': //text
        $selected="";
        for($a=0;$a<=count($itens)-1;$a++){
          if(isset($respostas[$cod_formulario]) and $respostas[$cod_formulario]==$itens[$a]['cod_formulario_resposta']){$selected=$itens[$a]['descricao'];}else{}
        }        echo "
          <div class='uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 ".$editar.">
            <label class='uk-form-label' for='form-s-it'>".$texto_pergunta.$html->tooltip($texto_ajuda)."</label>
            <div class='uk-form-controls '>
              <div class='uk-autocomplete' data-uk-autocomplete={source:db_autocomplete_".$cod_formulario."}  style='width: 100%;'>
                <input class='ficha_complementar' id='".$cod_formulario."' name='".$cod_formulario."' placeholder='' type='text' style='width: 100%;' value='".$selected."'>
              </div>
            </div>
          </div>  
        ";
      break;
    case 'select': //select
      if(count($itens)>1){
        for($a=0;$a<=count($itens)-1;$a++){
          if(isset($respostas[$cod_formulario]) and $respostas[$cod_formulario]==$itens[$a]['cod_formulario_resposta']){$selected="checked=true";}else{$selected="";}
          $options.="<option value='".$itens[$a]['cod_formulario_resposta']."' ".$selected." >".$itens[$a]['descricao']."</option>";
        }
      }
        echo "
          <div class='uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 ".$editar.">
            <label class='uk-form-label' for='form-s-s'>".$texto_pergunta.$html->tooltip($texto_ajuda)."</label>
            <div class='uk-form-controls'>
              <select class='ficha_complementar' id='".$cod_formulario."' name='".$cod_formulario."'>
                ".$options."
              </select>
            </div>
          </div>  
        ";
      break;
    case 'data': //Data
        echo "
          <div class='uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 ".$editar.">
            <label class='uk-form-label' for='form-s-it'>".$texto_pergunta.$html->tooltip($texto_ajuda)."</label>
            <div class='uk-form-controls'>
              <input class='ficha_complementar' id='".$cod_formulario."' name='".$cod_formulario."' placeholder='' type='text' data-uk-datepicker={format:'DD/MM/YYYY'}>
            </div>
          </div>  
        ";
      break;
    case 'radio_input': //radio_input
      if(count($itens)>1){
        for($a=0;$a<=count($itens)-1;$a++){
          if(isset($respostas[$cod_formulario]) and $respostas[$cod_formulario]==$itens[$a]['cod_formulario_resposta']){$selected="checked=true";}else{$selected="";}
          $options.="<label><input class='ficha_complementar' id='".$cod_formulario."' name='".$cod_formulario."' type='radio' value='".$itens[$a]['cod_formulario_resposta']."' ".$selected." > ".$itens[$a]['descricao']."</label></br>";
        }
      }        
      echo "
        <div class='uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 ".$editar.">
          <span class='uk-form-label'>".$texto_pergunta.$html->tooltip($texto_ajuda)."</span>
          <div class='uk-form-controls'>
            ".$options."
          </div>
        </div>  
      ";
      break;
    case 'checkbox': //checkbox
      if(count($itens)>1){
        for($a=0;$a<=count($itens)-1;$a++){
          if(isset($respostas[$cod_formulario]) and $respostas[$cod_formulario]==$itens[$a]['cod_formulario_resposta']){$selected="checked=true";}else{$selected="";}
          $options.="<label><input class='ficha_complementar' id='".$cod_formulario."' name='".$cod_formulario."' type='checkbox' value='".$itens[$a]['cod_formulario_resposta']."' ".$selected."> ".$itens[$a]['descricao']."</label></br>";
        }
      }
      echo "
        <div class='uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 ".$editar.">
          <span class='uk-form-label'>".$texto_pergunta.$html->tooltip($texto_ajuda)."</span>
          <div class='uk-form-controls'>
            ".$options."
          </div>
        </div>  
      ";
      break;
    default : //text
        echo "
          <div class='uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1 ".$editar.">
            <label class='uk-form-label' for='form-s-it'>".$texto_pergunta.$html->tooltip($texto_ajuda)."</label>
            <div class='uk-form-controls'>
              <input class='ficha_complementar' id='".$cod_formulario."' name='".$cod_formulario."' placeholder='' type='text' style='width: 100%;'>
            </div>
          </div>  
        ";
      break;      
    }

    echo "<div class='uk-width-1-1 div_editar_formulario' id='div_editar_formulario_".$cod_formulario."'></div>";
    echo "</div>";

  
  }
  function editar_formulario($cod_formulario){
  
      include "config.php";
      $select_itens="SELECT 
                cad_formulario.* 
              FROM 

                vepinho1.cad_formulario 
              where 

                cad_formulario.cod_formulario='".$cod_formulario."';";
      $resultado_itens=mysql_query($select_itens,$conexao) or die (mysql_error());
      $formulario=new formulario;
        while($row = mysql_fetch_array($resultado_itens)){
          $formulario->cad_formulario($row['cod_formulario'] ,$row['texto_pergunta'],$row['texto_ajuda'],$row['tipo_formulario']);
        }

  
  }
  function item_reposta($cod_formulario_resposta,$descricao){
    if($cod_formulario_resposta=='nova_resposta'){
      $classe="background: #ccc ! important;";
      $tb_excluir="";
    }else{
      $classe="";
      $tb_excluir="<span class='uk-button uk-button-danger bt_excluir_resposta_formulario' onclick='excluir_resposta(this);' cod_formulario_resposta='".$cod_formulario_resposta."' style='padding-left: 8px; padding-right: 8px; padding-top: 3px;' ><i style=' padding-top: 5px;' class='uk-icon-trash-o'></i> </span>";
    }
  return "<li class='uk-nestable-list-item '>
      <div class='uk-nestable-item ' style='".$classe."'>
        <div class='uk-nestable-handle'></div>
        <div data-nestable-action='toggle'></div>
        <input style='width: 70%;' onchange=salvar_resposta(this); id='".$cod_formulario_resposta."' value='".$descricao."' placeholder='Texto da resposta' type='text'>
        ".$tb_excluir."
      </div>
    </li>";
  }
  function itens_formulario($cod_formulario){
    $formulario=new formulario;
    include "config.php";
    $select="SELECT * FROM vepinho1.cad_formulario_resposta where cod_formulario=".$cod_formulario." ;";
    $resultado=mysql_query($select,$conexao) or die (mysql_error());
    while($row = mysql_fetch_array($resultado)){
        echo $formulario->item_reposta($row['cod_formulario_resposta'],$row['descricao']);
      }
        echo $formulario->item_reposta('nova_resposta','');
    
  
  }
  function cad_formulario($cod_formulario ,$texto_pergunta,$texto_ajuda,$tipo_formulario){
    $formulario = new formulario;
    $selects=new selects;
    echo "
                <form action='#' method='post' class='uk-form uk-form-horizontal ' id='form_cadastro'>

                                <div class='uk-form-row'>
                                </div>
                                <div class='uk-form-row'>
                                    <label class='uk-form-label' for='form-h-it'></label>
                                    <div class='uk-form-controls'>
                                        <input style='width: 100%;visibility: hidden;' id='cod_formulario' name='cod_formulario' value='".$cod_formulario."' placeholder='Titulo' type='text'>
                                    </div>
                                </div>
                                <div class='uk-form-row'>
                                    <label class='uk-form-label' for='form-h-it'>Título da pergunta</label>
                                    <div class='uk-form-controls'>
                                        <input style='width: 100%;' id='texto_pergunta'  name='texto_pergunta' value='".$texto_pergunta."' placeholder='Titulo' type='text'>
                                    </div>
                                </div>
                                <div class='uk-form-row'>
                                    <label class='uk-form-label'>Texto de ajuda</label>
                                    <div class='uk-form-controls'>
                    <textarea id='texto_ajuda' name='texto_ajuda' style='width: 100%;' rows='5' placeholder='Ajuda'>".$texto_ajuda."</textarea>
                                    </div>
                                </div>
                                <div class='uk-form-row'>
                                    <label class='uk-form-label' for='form-h-s'>Tipo de pergunta</label>
                                    <div class='uk-form-controls'>";
                  $selects->tipo_formulario($tipo_formulario,'Tipo de Pergunta');
                        echo     "  </div>
                                </div>";

            if($cod_formulario!=""){                
            echo    "<h3 class='tm-article-subtitle' style='margin-top: 50px;'>Itens</h3>
                  <ul class='uk-nestable' data-uk-nestable='' id='ul_respotas_formulario'>";
            echo     $formulario->itens_formulario($cod_formulario)  ;
            echo    "</ul>";
            }  
            echo  "
                <div class='uk-button-group'>
                <span class='uk-button uk-button-primary' onclick='salvar_formulario();' ><i class='uk-icon-check-circle'></i> Salvar</span>
                <span class='uk-button uk-button-danger' onclick='cacelar_edicao_formulario();' ><i class='uk-icon-exclamation-circle'></i> Cancelar</span>  
                ";
                        echo  "</form>    
    
    ";
  
  }
  function ficha_complementar($cod_aluno,$editar){
    include "config.php";
    $formulario=new formulario;
    $pesquisa=new pesquisa;


    
    //respostas
    $respostas="";
    if($cod_aluno!=""){
      $select_ficha_complementar="
            SELECT 
              *
            FROM 
              vepinho1.cad_ficha_complementar 
            where 
              cod_aluno=".$cod_aluno.";
      ";
      $resultado_ficha_complementar=mysql_query($select_ficha_complementar,$conexao) or die (mysql_error());
      while($row_respostas=mysql_fetch_array($resultado_ficha_complementar)){
        $respostas[$row_respostas['cod_formulario']]=$row_respostas['cod_formulario_resposta'];  
      }
    
    }

    
    //Formulário
    $select="SELECT * FROM vepinho1.cad_formulario;";
    $resultado=mysql_query($select,$conexao) or die (mysql_error());

    while($row = mysql_fetch_array($resultado)){
    //auto-complete
        $consulta_sql="SELECT descricao as value FROM vepinho1.cad_formulario_resposta where cod_formulario=".$row['cod_formulario'].";";
        echo "<script>var db_autocomplete_".$row['cod_formulario']."=".$pesquisa->json($consulta_sql)."</script>";
        echo $formulario->listar_formulario($row['cod_formulario'], $row['texto_pergunta'], $row['texto_ajuda'], $row['tipo_formulario'],$editar,$respostas);
      }
      if($editar=='S'){
      echo "
        <div class='uk-grid uk-panel uk-panel-divider' id='pergunta_formulario_'>
          <div class='uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4'>
            <span style='' class='uk-button uk-button-primary bt_novo_formulario' onclick='novo_formulario();' cod_formulario=''><i class='uk-icon-plus-circle'></i> Novo</span>
          </div>
          <div class='uk-width-1-1 div_editar_formulario' id='div_editar_formulario_'></div>
        </div>";
      }

  }
  
  
}

class preceptorias{
  function box_preceptoria(){
    echo  "
      <div class='uk-width-1-1 uk-article uk-panel-divider'><br>
        <h3>Anotação de preceptorias</h3>

      <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <link rel='stylesheet' href='js/jwysiwyg/jquery.wysiwyg.css' type='text/css'>
        <script type='text/javascript' src='js/jwysiwyg/jquery/jquery-1.3.2.js'></script>
        <script type='text/javascript' src='js/jwysiwyg/jquery.wysiwyg.js'></script>
      <script type='text/javascript'>
        $(function()
        {
          $('#wysiwyg_nota').wysiwyg();
        });</script>


      <textarea id='wysiwyg_nota' name='wysiwyg_nota' style='width: 100%;'></textarea>
      <button class='uk-button uk-button-primary' id='tb_salvar_preceptoria' type='submit' style='margin: 20px 0px 0px 0px;'>Salvar</button>






      </div>  ";
  }
  function listar_preceptarias($cod_aluno){
    include "config.php";
    $preceptorias=new preceptorias;
    $texto="";
    $select="SELECT 
          cad_aluno.nome as nome_aluno,
          cad_usuario.nome as nome_preceptor,
          cad_preceptoria.data,
          cad_preceptoria.texto 
        FROM 
          vepinho1.cad_preceptoria,
          vepinho1.cad_aluno,
          vepinho1.cad_usuario
        where
          cad_preceptoria.cod_aluno=cad_aluno.cod_aluno and
          cad_preceptoria.cod_usuario=cad_usuario.cod_usuario and
          cad_preceptoria.cod_aluno='".$cod_aluno."'";
    $resultado=mysql_query($select,$conexao) or die (mysql_error());
    while($row = mysql_fetch_array($resultado)){
      $texto.= $preceptorias->resumo_preceptoria($row['nome_aluno'],$row['nome_preceptor'],$row['data'],$row['texto']);
    }
    return $texto;
          
          
  
  }
  function resumo_preceptoria($nome_aluno,$nome_preceptor,$data,$texto){
  //  $data=DateTime::createFromFormat('Y-m-d', $data)->format('d/m/Y H:i:s');
  
  return  "<div class='uk-article uk-panel-divider uk-width-1-1'>
      <p class='uk-article-meta'>".$data."</p>
      <p class='uk-article-lead'>Escrito por ".$nome_preceptor."</p>
      <div>".$texto."</div>

      </div>";
  
  
  }

}


class login{
  function checklogin(){
    $login=new login;

    if(isset($_GET['login']) and $_GET['login']=="logout"){
      $login->logout();
    }
    if(isset($_POST['login_usuario']) and isset($_POST['login_senha']) and $_POST['login_usuario']!="" and $_POST['login_senha']!=""){
      $login->login();
    }    

  }
  function login(){
    include "config.php";
	

	
	
	
    if(isset($_POST['login_usuario']) and isset($_POST['login_senha']) and $_POST['login_usuario']!="" and $_POST['login_senha']!=""){
      $select="SELECT * FROM vepinho1.cad_usuario where usuario='".$_POST['login_usuario']."';";
      $resultado=mysql_query($select,$conexao) or die (mysql_error());
      while($row = mysql_fetch_array($resultado)){
        if($row['senha']==$_POST['login_senha']){
          $_SESSION['cod_usuario']=$row['cod_usuario'];
          $_SESSION['user']=$_POST['login_usuario'];
          $_SESSION['loged']=true;
          $_SESSION['session']=md5(mt_rand(1,10000));
          $_SESSION['tipo_usuario']=$row['tipo_usuario'];
        }else{
          $login=new login;
          $login->logwindow();            
          $login->logout();
  
        
        }
      }
    }
  }
  function logout(){

    $keys=array_keys($_SESSION);
	for($i=0;$i<count($keys);$i++){
	  if($_SESSION[$keys[$i]]!=""){
		$_SESSION[$keys[$i]]="";
		}
	}

  }
  function logwindow(){

    echo "<div class=' ' style='padding-left: 20px; padding-right: 20px;'>
          <div class='uk-container-center uk-panel uk-panel-box uk-panel-hover uk-width-small-3-4 uk-width-medium-1-3 uk-width-large-1-4'  style='margin-top: 10%;'>
            <h3 class='uk-panel-title'>Bem vindo!</h3>
            <form class='uk-form' action='#' method='post'>

              <fieldset>
                <div class='uk-form-row'>
                  <div class='uk-form-icon' style='width: 100%;'>
                    <i class='uk-icon-user'></i>
                    <input id='login_usuario' name='login_usuario' placeholder='Usuário' type='text' style='width: 100%;'>
                  </div>
                </div>
                <div class='uk-form-row'>
                  <div class='uk-form-icon' style='width: 100%;'>
                    <i class='uk-icon-key'></i>
                    <input id='login_senha' name='login_senha' placeholder='Senha' type='password'  style='width: 100%;'>
                  </div>
                </div>
                <div class='uk-form-row'>
                  <button class='uk-button'><i class='uk-icon-unlock'></i> Confirmar</button>
                </div>
              </fieldset>

            </form>          
          
          
          </div>
        </div>";
  
  
  
  
  }

}


class serv{
	function registra(){
    include "config.php";
		
    //insert
	$sql=new sql;
    $campos_insert="";
    $values="";
	$tabela="cad_log_server";
	$keys=array_keys($_SERVER);
	
	
	///////////////////////////////////////
	$resultado=mysql_query("SELECT * FROM vepinho1.cad_log_server limit 1;",$conexao);
	$row = mysql_fetch_array($resultado);
	for($i=0;$i<mysql_num_fields($resultado);$i++){
	$campo=mysql_field_name($resultado,$i);
	  if($_SERVER[$campo]!=""){
		$campos_insert.="`".$campo."`";
		if(strpos($campo,'data')===false){$valor=mb_convert_encoding($_SERVER[$campo], "UTF-8", mb_detect_encoding($_SERVER[$campo]));}else{$valor=data(mb_convert_encoding($_SERVER[$campo], "UTF-8", mb_detect_encoding($_SERVER[$campo])));}
		$values.="'".$valor."',";
	  }
	}
    $values="(".$values.")";
    $campos_insert=str_replace('``',"`,`",$campos_insert);    
    $values=str_replace(",)",")",$values);    
    $values=str_replace(")","",$values);    
    $values=str_replace("(","",$values);    

    $sql->insert($tabela,$campos_insert,$values,'N');	  
	///////////////////////////////////////  
	
	
	
	
//		mysql_field_name($campos)
//		$campos_insert="";
//		$values="";
//		for($i=0;$i<count($keys);$i++){
//		  if($_SERVER[$keys[$i]]!=""){
//			$campos_insert.="`".$keys[$i]."`";
//			if(strpos($keys[$i],'data')===false){$valor=mb_convert_encoding($_SERVER[$keys[$i]], "UTF-8", mb_detect_encoding($_SERVER[$keys[$i]]));}else{$valor=data(mb_convert_encoding($_SERVER[$keys[$i]], "UTF-8", mb_detect_encoding($_SERVER[$keys[$i]])));}
			
//			$values.="'".$valor."',";
//		  }
//		}
//     for($i=0;$i<count($keys);$i++){
//      if($_SERVER[$keys[$i]]!=""){
//       $campos_insert.="`".$keys[$i]."`";
//	   	 if(strpos($keys[$i],'data')===false){$valor=mb_convert_encoding($_SERVER[$keys[$i]], "UTF-8", mb_detect_encoding($_SERVER[$keys[$i]]));}else{$valor=data(mb_convert_encoding($_SERVER[$keys[$i]], "UTF-8", mb_detect_encoding($_SERVER[$keys[$i]])));}
//       $values.="'".$valor."',";
//      }
//   }

//   $values="(".$values.")";
//   $campos_insert=str_replace('``',"`,`",$campos_insert);    
//   $values=str_replace(",)",")",$values);    
//   $values=str_replace(")","",$values);    
//   $values=str_replace("(","",$values);    

//   $sql->insert($tabela,$campos_insert,$values,'N');

		
		
	}
	
	
}






?>