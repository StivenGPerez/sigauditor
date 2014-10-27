<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Administración de Personal</title>
		<!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/tab.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/diseño_menu_principal.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-select.min.css">-->
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<!--<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px; 
}
a:hover{
	text-decoration: underline;
}
</style>-->
</head>
<body>
<div class="sombra">

<div class="panel panel-success">
	<div class="panel-heading"> 
		<h3 class="panel-title">
	    <span class="glyphicon glyphicon-th-large"></span> Consolidado</h3>
	</div>
	<div class="panel-body">
		<div class="row">

		<?php echo $output; ?>

		</div>
    </div>
    <div class="panel-footer">
	  		<a href="<?php echo base_url(); ?>index.php/con_consolidado/" class="btn btn-danger btn-block">Volver</a>
	  	</div>
</div>

</div>



    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins.js"></script>
    <script> var baseurl = "<?php echo base_url(); ?>"; </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/modal_cargando.js"> </script>
    <script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>