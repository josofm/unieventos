<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>UniEventos - Seus Site de Eventos</title>
	

	<!-- The styles -->
	<?php echo $this->Html->css('admNovo/bootstrap-cerulean'); ?>
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<?php 
		echo $this->Html->css('admNovo/bootstrap-responsive');
		echo $this->Html->css('admNovo/charisma-app');
		echo $this->Html->css('admNovo/jquery-ui-1.8.21.custom');
		echo $this->Html->css('admNovo/fullcalendar');
		echo $this->Html->css('admNovo/fullcalendar.print', array('media'=>'print'));
		echo $this->Html->css('admNovo/chosen');
		echo $this->Html->css('admNovo/uniform.default');
		echo $this->Html->css('admNovo/colorbox');
		echo $this->Html->css('admNovo/jquery.cleditor');
		echo $this->Html->css('admNovo/jquery.noty');
		echo $this->Html->css('admNovo/noty_theme_default');
		echo $this->Html->css('admNovo/elfinder.min');
		echo $this->Html->css('admNovo/elfinder.theme');
		echo $this->Html->css('admNovo/jquery.iphone.toggle');
		echo $this->Html->css('admNovo/opa-icons');
		echo $this->Html->css('admNovo/uploadify');
	 ?>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<!-- topbar starts -->
	<?php echo $this->element('admNovo/header'); ?>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<?php echo $this->element('admNovo/menu'); ?>
			<!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			<div id="content" class="span10">
				<?php 
		          echo $this->Session->flash(); 
		          echo $this->fetch('content'); 
		        ?>
		    </div>
			<!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Muhammad Usman</a> 2012</p>
			<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
		</footer>
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
<?php 
	// jQuery -->
	echo $this->Html->script('admNovo/jquery-1.7.2.min');
	// jQuery UI -->
	echo $this->Html->script('admNovo/jquery-ui-1.8.21.custom.min');
	// transition / effect library -->
	echo $this->Html->script('admNovo/bootstrap-transition');
	// alert enhancer library -->
	echo $this->Html->script('admNovo/bootstrap-alert');
	// modal / dialog library -->
	echo $this->Html->script('admNovo/bootstrap-modal');
	// custom dropdown library -->
	echo $this->Html->script('admNovo/bootstrap-dropdown');
	// scrolspy library -->
	echo $this->Html->script('admNovo/bootstrap-scrollspy');
	// library for creating tabs -->
	echo $this->Html->script('admNovo/bootstrap-tab');
	// library for advanced tooltip -->
	echo $this->Html->script('admNovo/bootstrap-tooltip');
	// popover effect library -->
	echo $this->Html->script('admNovo/bootstrap-popover');
	// button enhancer library -->
	echo $this->Html->script('admNovo/bootstrap-button');
	// accordion library (optional, not used in demo) -->
	echo $this->Html->script('admNovo/bootstrap-collapse');
	// carousel slideshow library (optional, not used in demo) -->
	echo $this->Html->script('admNovo/bootstrap-carousel');
	// autocomplete library -->
	echo $this->Html->script('admNovo/bootstrap-typeahead');
	// tour library -->
	echo $this->Html->script('admNovo/bootstrap-tour');
	// library for cookie management -->
	echo $this->Html->script('admNovo/jquery.cookie');
	// calander plugin -->
	echo $this->Html->script('admNovo/fullcalendar.min');
	// data table plugin -->
	echo $this->Html->script('admNovo/jquery.dataTables.min');

	// chart libraries start -->
	echo $this->Html->script('admNovo/excanvas');
	echo $this->Html->script('admNovo/jquery.flot.min');
	echo $this->Html->script('admNovo/jquery.flot.pie.min');
	echo $this->Html->script('admNovo/jquery.flot.stack');
	echo $this->Html->script('admNovo/jquery.flot.resize.min');
	// chart libraries end -->

	// select or dropdown enhancer -->
	echo $this->Html->script('admNovo/jquery.chosen.min');
	// checkbox, radio, and file input styler -->
	echo $this->Html->script('admNovo/jquery.uniform.min');
	// plugin for gallery image view -->
	echo $this->Html->script('admNovo/jquery.colorbox.min');
	// rich text editor library -->
	echo $this->Html->script('admNovo/jquery.cleditor.min');
	// notification plugin -->
	echo $this->Html->script('admNovo/jquery.noty');
	// file manager library -->
	echo $this->Html->script('admNovo/jquery.elfinder.min');
	// star rating plugin -->
	echo $this->Html->script('admNovo/jquery.raty.min');
	// for iOS style toggle switch -->
	echo $this->Html->script('admNovo/jquery.iphone.toggle');
	// autogrowing textarea plugin -->
	echo $this->Html->script('admNovo/jquery.autogrow-textarea');
	// multiple file upload plugin -->
	echo $this->Html->script('admNovo/jquery.uploadify-3.1.min');
	// history.js for cross-browser state change on ajax -->
	echo $this->Html->script('admNovo/jquery.history');
	// application script for Charisma demo -->
	echo $this->Html->script('admNovo/charisma');
	
	 ?>	
</body>
</html>
