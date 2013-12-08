<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - SB Admin</title>

    <!-- Add custom CSS here -->
    <?php 
      echo $this->Html->css('admin/bootstrap.css');
      echo $this->Html->css('admin/sb-admin');
      echo $this->Html->css('admin/font-awesome.min');
      echo $this->Html->css('admin/morris-0.4.3.min');
      
      
     ?>
    <!-- Page Specific CSS -->
  </head>
  <body>
    <div id="wrapper">
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">SB Admin</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <?php 
            echo $this->element('admin/menuLateral'); 
            echo $this->element('admin/menuHeader'); 
          ?>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <?php 
          echo $this->Session->flash(); 
          echo $this->fetch('content'); 
        ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <?php
    echo $this->Html->script('admin/jquery-1.10.2');
    echo $this->Html->script('admin/bootstrap');
    ?>
    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <?php
    echo $this->Html->script('admin/morris/chart-data-morris');
    echo $this->Html->script('admin/tablesorter/jquery.tablesorter');
    echo $this->Html->script('admin/tablesorter/tables');
    ?>
  </body>
</html>