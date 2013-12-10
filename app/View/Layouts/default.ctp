<?php
    $cakeDescription = __d('cake_dev', 'Unieventos: Seu sistema de eventos');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<?php 
    echo $this->Html->css('site/bootstrap.min');
    echo $this->Html->css('site/bootstrap-responsive.min');
    echo $this->Html->css('site/font-awesome.min');
    echo $this->Html->css('site/bootswatch');
?>

   <script type="text/javascript">

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

   </script>

  </head>

  <body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
    <?php echo $this->Html->script('site/bsa'); ?>


  <!-- Navbar
    ================================================== -->
<?php echo $this->element('site/navBar'); ?>

<div class="container">

<!-- header
================================================== -->
    <?php echo $this->element('site/header'); ?>
    <!-- Conteudo
    ======================================================= -->
    <div class="row">
        <div class="span9">
            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
        <div class="span3">
           <div class="well">
               Aqui vai os menus
           </div>
        </div>
    </div>


 
<br><br><br><br>

     <!-- Footer
      ================================================== -->
    <?php echo $this->element('site/footer'); ?>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php 
        echo $this->Html->script('1.9.1/jquery.min');
    echo $this->Html->script('site/jquery.smooth-scroll.min.js');
    echo $this->Html->script('site/bootstrap.min.js');
    echo $this->Html->script('site/bootswatch.js');
    ?>


  </body>
</html>
