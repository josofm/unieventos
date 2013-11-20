    <?php
    $cakeDescription = __d('cake_dev', 'Unieventos: Seu sistema de eventos');
    ?>
    <!DOCTYPE html>
    <html lang="en-US"> <!--<![endif]-->
        <head>
            <?php echo $this->Html->charset('UTF-8'); ?>
            <title>
                <?php echo $cakeDescription ?>:
                <?php echo $title_for_layout; ?>
            </title>
    		<?php 
                echo $this->Html->css('bootstrap');
                echo $this->Html->css('flexslider');
                echo $this->Html->css('ie');
                echo $this->Html->css('prettyPhoto');
                echo $this->Html->css('settings');
                echo $this->Html->css('responsive');
                echo $this->Html->css('elastislide');
                echo $this->Html->css('style');
                echo $this->Html->css('responsive');

                echo $this->fetch('meta');
                echo $this->fetch('css');
                echo $this->fetch('script');
            ?>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,600,800' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    		<link rel="shortcut icon" href="images/favicon.jpg">
    		<!--[if lt IE 9]>
    			<script src="js/html5shiv.js"></script>
    		<![endif]-->
    	</head>
    	<body>				
    		<!-- HEADER -->
            <div class="container">
                <div class="row wrapper">
                    <?php echo $this->element('menu'); ?>
                    <div class="span4">
                        <div class="logo">
                            <?php echo $this->Html->image('logo.png'); ?>
                        </div>
                    </div>
                    <div class="span8">
                        <div class="adver-banner">
                             <a href="#"><?php echo $this->Html->image('top-banner.png'); ?></a>
                        </div>
                    </div>
                   <!-- NAV -->
                        <?php echo $this->element('menu2'); ?>
                    <!-- NAV -->
                                <!-- HEADER -->

                                <!-- NEWS SLIDER -->
                                <div class="span12">
                                    <div class="news-scrol">
                                        <span>popoular titles</span>
                                        <ul id="scroller">
                                            <li><a href="#">The embattled social-games maker aims to cut up to $80 million in costs by culling employees across the company and closing offices in New York, Los Angeles, and Dallas</a></li>
                                            <li><a href="#">The embattled social-games maker aims to cut up to $80 million in costs by culling employees across the company and closing offices in New York, Los Angeles, and Dallas</a></li>
                                            <li><a href="#">‎The embattled social-games maker aims to cut up to $80 million in costs by culling employees across the company and closing offices in New York, Los Angeles, and Dallas</a></li>
                                            <li><a href="#">The embattled social-games maker aims to cut up to $80 million in costs by culling employees across the company and closing offices in New York, Los Angeles, and Dallas</a></li>
                                            <li><a href="#">The embattled social-games maker aims to cut up to $80 million in costs by culling employees across the company and closing offices in New York, Los Angeles, and Dallas</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- NEWS SLIDER -->

                                <!-- Main Content -->
                                <div class="span9">
                                    <?php echo $this->Session->flash(); ?>

                                    <?php echo $this->fetch('content'); ?>

                                </div>
                                <div class="span3">

                                    <div class="sidebar">
                                        <!-- tabs -->
                                        <div class="widget">
                                            <?php echo $this->element('tabs'); ?>
                                        </div>
                                        <!-- tabs -->

                                        <!--Banner 
                                        <div class="widget">
                                            <div class=" sidebar_banner">
                                                <a href="#"><img src="images/themeforestad.png" alt=""></a>
                                            </div>
                                        </div>
                                        -->

                                        <!-- Accordion -->
                                        <div class="widget">
                                            <?php echo $this->element('accordion'); ?>
                                        </div>
                                        <!-- Accordion -->

                                        <!-- Clients 
                                        <div class="widget">
                                            <div class="clients clearfix">
                                                <a href="#"><img src="images/them1.png" alt=""></a>
                                                <a href="#" class="last"><img src="images/theme2.png" alt=""></a>
                                                <a href="#"><img src="images/theme3.png" alt=""></a>
                                                <a href="#" class="last"><img src="images/theme4.png" alt=""></a>
                                            </div>
                                        </div>
                                        Clients -->

                                        <!--tags-->
                                        <div class="widget tags-wrap">
                                            <?php echo $this->element('tags'); ?>
                                        </div>
                                        <!--Facebook-->
                                        <div class="widget">
                                            <div class="facebook-plg">
                                                <?php echo $this->Html->image('facebook.png'); ?>
                                            </div>
                                        </div>
                                        <!--Facebook-->
                                    </div>

                                </div>
                                <!-- Main Content -->
                            </div>
                            <div class="row">
                                <footer class="clearfix">

                                    <!--Magrev-->
                                    <div class="span3 widget">
                                        <h5><img src="images/footer-logo.png" alt=""></h5>
                                        <p>Duis sed odio sit amet nibh <a href="#">vulputate cursus </a>a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae  </p>
                                    </div>
                                    <!--Magrev-->

                                    <!--Recent Posts-->
                                    <div class="span3 widget">
                                        <h5>Recent Posts</h5>
                                       <div class="recent-post">
                                           <ul>
                                               <li><a href="">Envato's Most Wanted - $4,500 Reward for the First 15 Crowd Funding Themes</a></li>
                                               <li><a href="">Envato's Most Wanted - $4,500 Reward for the First 15 Crowd Funding Themes</a></li>
                                               <li><a href="">Envato's Most Wanted - $4,500 Reward for the First 15 Crowd Funding Themes</a></li>
                                           </ul>
                                       </div>
                                    </div>
                                    <!--Recent Posts-->

                                    <!--Latest Tweets-->
                                    <div class="span3 widget">
                                        <h5>Latest Tweets</h5>
                                        <ul>
                                            <li><a href="">@rombws</a> Thanks for the head up! :) http://support.envato.com was very helpful for me, much appreacitated. 3 days ago </li>
                                            <li><a href="" >@rombws</a> Thanks for the head up! :) http://support.envato.com was very helpful for me, much appreacitated. 3 days ago </li>
                                            <li><a href="">@rombws</a> Thanks for the head up! :) http://support.envato.com was very helpful for me, much appreacitated. 3 days ago </li>
                                        </ul>
                                    </div>
                                    <!--Latest Tweets-->

                                    <!--contact form-->
                                    <div class="span3 widget">
                                        <h5>Contact Us</h5>
                                        <form class="contact-usfrm">
                                            <fieldset>
                                                <input type="text" placeholder="Name" />
                                            </fieldset>
                                            <fieldset class="last">
                                                <input type="text" placeholder="E-mail">
                                            </fieldset>
                                            <textarea cols="5" rows="5" placeholder="Message"> </textarea>
                                            <input type="submit" value="Send">
                                        </form>
                                    </div>
                                    <!--contact form-->

                                </footer>
                                <div class="footer-bottom clearfix">
                                    <div class="span6">
                                        <p>© 2013 MAGREV, All Rights Reserved</p>
                                    </div>
                                    <div class="span6 bottom-errow">
                                        <a href="#"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Scripts -->
                    <?php
                        echo $this->Html->script('jquery-1.7.1.min');
                        echo $this->Html->script('jquery.flexslider-min');
                        echo $this->Html->script('modernizr.custom.17475');
                        echo $this->Html->script('jquery.elastislide');
                        echo $this->Html->script('jquery.isotope.min');
                        echo $this->Html->script('jquery.themepunch.plugins.min');
                        echo $this->Html->script('jquery.themepunch.revolution');
                        echo $this->Html->script('prettyPhoto');
                        echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true');
                        echo $this->Html->script('jquery.ui.map.full.min');
                        echo $this->Html->script('custom');
                    ?>

                    <script src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
                    <script src="rs-plugin/js/jquery.themepunch.revolution.js"></script>
                    <script src="js/jquery.cycle.all.js"></script>
                    <script src="js/jquery.prettyPhoto.js"></script>
                    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                    <script src="js/jquery.ui.map.full.min.js"></script>
                    <script src="js/custom.js"></script>
    		</body>
    </html>