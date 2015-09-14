<?php
    session_start();
    include "php/config.php";
    include "php/php.php";

	$serv=new serv;
	$serv->registra();
	
    $sql=new sql;
    $menus=new menus;     
 ?>

<html class="" lang="pt-br" dir="ltr" style="box-shadow: none !important;">

    <head>
        <meta charset="utf-8"></meta>
        <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
        <title></title>


    <!-- uikit 
        <link rel="stylesheet" href="js/uikit/css/uikit.avenue.css" />
    
    -->  
    <link rel="stylesheet" href="js/uikit/css/uikit.css" />
    <link rel="stylesheet" href="js/uikit/css/uikit.min.css" />
    <link rel="stylesheet" href="js/uikit/css/uikit.gradient.css" />

    <link rel="stylesheet" href="js/uikit/css/components/datepicker.min.css" />
    <link rel="stylesheet" href="js/uikit/css/components/datepicker.css" />
    <link rel="stylesheet" href="js/uikit/css/components/sticky.css" />
    
    <link rel="stylesheet" href="js/uikit/css/components/notify.min.css" />    
    <link rel="stylesheet" href="js/uikit/css/components/notify.css" />
    
    <link rel="stylesheet" href="js/uikit/css/components/nestable.min.css" />    
    <link rel="stylesheet" href="js/uikit/css/components/nestable.css" />
    <link rel="stylesheet" href="js/uikit/css/components/nestable.almost-flat.css" />
    
    <link rel="stylesheet" href="js/uikit/css/components/autocomplete.min.css" />    
    <link rel="stylesheet" href="js/uikit/css/components/autocomplete.css" />
    
    <link rel="stylesheet" href="js/uikit/css/components/upload.css" />



    

    <script src="js/uikit/js/jquery.js"></script>
    <script src="js/uikit/js/uikit.js"></script>
    <script src="js/uikit/js/uikit.min.js"></script>
    <script src="js/uikit/js/components/sticky.js"></script>
    <script src="js/uikit/js/components/datepicker.js"></script>
    <script src="js/uikit/js/components/datepicker.min.js"></script>

    <script src="js/uikit/js/components/autocomplete.min.js"></script>
    <script src="js/uikit/js/components/autocomplete.js"></script>
    
    <script src="js/uikit/js/components/nestable.min.js"></script>
    <script src="js/uikit/js/components/nestable.js"></script>

    <script src="js/uikit/js/components/upload.js"></script>



    
    
    
    
    <!-- jquery -->  
    <link rel="stylesheet" href="js/jquery/jquery-ui.css">
    <script src="js/jquery/jquery-ui.js"></script>    
    <script src="js/jquery/jquery-1.10.2.js" type="text/javascript"></script>

    
    <!-- Ignite UI Required Combined CSS Files -->
    <link href="js/igniteui.14.1.20141.2031.custom/css/themes/infragistics/infragistics.theme.css" rel="stylesheet" />
    <link href="js/igniteui.14.1.20141.2031.custom/css/structure/infragistics.css" rel="stylesheet" />
    <link href="js/igniteui.14.1.20141.2031.custom/css/structure/modules/infragistics.ui.treegrid.css" rel="stylesheet" />

    <!-- Used to style the API Viewer and Explorer UI -->

    <script src="js/igniteui.14.1.20141.2031.custom/modernizr-latest.js"></script>
    <script src="js/igniteui.14.1.20141.2031.custom/jquery-1.9.1.min.js"></script>
    <script src="js/igniteui.14.1.20141.2031.custom/jquery-ui.min.js"></script>

    <!-- Ignite UI Required Combined JavaScript Files -->
    <script src="js/igniteui.14.1.20141.2031.custom/infragistics.core.js"></script>
    <script src="js/igniteui.14.1.20141.2031.custom/infragistics.lob.js"></script>
    <script src="js/igniteui.14.1.20141.2031.custom/infragistics.ui.treegrid.js"></script>    

   

<style>
  .uk-subnav{
    margin: 3px !important;
    padding: 3px !important;

  }
  html{
  background: #fff !important;
  
  }
  .tm-nav-wrapper .uk-nav li > a {

  
  }
  .uk-subnav li > a {
  color: #fff !important;
  
  }
  #grid{
    margin-left: -10px !important; 

  }
  .ui-widget-header{
    border-radius: 0px !important;
    border: 0px !important;
  }
  
  .uk-tab li a{
  border-radius: 0px !important; 
  border: 0px solid !important;
  margin-left: 0px !important;
  color: #fff !important;
  text-decoration: none !important;
  }
  .uk-active li a{
  
  
  }
  h3{
    margin-left: -15px; 
    padding: 5px 15px; 
    margin-right: -15px;
    margin-top: -15px; 
    border-top-width: 0px;
    border-top-style: solid; 
    background: none repeat scroll 0% 0% rgb(255, 255, 255);
  }
  .uk-nav .uk-nav-autocomplete .uk-autocomplete-results{
    color: #000 !important;
  
  }

  .uk-subnav li > a {
    color: #34495a !important;
  }
  
  .uk-nav .uk-parent a {
    background: #00B4DC !important;
    color: #fff !important;
  }
  .uk-nav-offcanvas .uk-parent .uk-nav-sub li a {
    background: transparent !important;
    color: #fff !important;
  }
  .tm-nav-wrapper .uk-nav .uk-parent .uk-nav-sub li a {
    background: transparent !important;
    color: #000 !important;
  }
  .uk-subnav-line li a{
  
  
  }
  .uk-subnav-pill li a{
    color:#000 !important;
  }
  .uk-form-controls label{
  padding-right: 15px !important;
  }
  
  .uk-subnav-pill li a {
    color: #34495a !important;
  }
  .uk-subnav-pill  li  a:focus{
    background: #fff  !important;
    color: #34495a !important;
  }
  .uk-subnav-pill  li  a:hover, .uk-subnav-pill  li  a:focus{
    background: #fff  !important;
    color: #34495a !important;
  }
  .uk-panel-box {
    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.25) !important;
  }
  .wysiwyg{
    width:100% !important;
  }
</style>
    
    </head>
<?php
    
  $login=new login;
    $login->checklogin();
  if(isset($_SESSION['user']) and isset($_SESSION['loged']) and isset($_SESSION['session']) and $_SESSION['loged']==true){
    include "body.php";
  }else{
     $login->logwindow();  
  }
  if(isset($_SESSION['cod_usuario'])){$cod_user_=$_SESSION['cod_usuario'];}else{$cod_user_="";}

//  var_dump($_POST);
//  var_dump($_GET);
//  var_dump($_SESSION);
  
  echo "<input class='uk-form-small' placeholder='' readonly='' style='width: 1%; visibility: hidden;' name='cod_usuario' id='cod_usuario' value='".$cod_user_."' type='text'>";
?>
    <script src="js/script.js"></script>
