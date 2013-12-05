<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mz121star.github.io/AFE/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 24 Nov 2013 04:14:17 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard - Reunion</title>

    <!--basic styles-->
    <?php 
        echo $this->Html->css('jquery-ui-1.10.3.custom.min');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('bootstrap-responsive.min');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('ace.min');
        echo $this->Html->css('ace-responsive.min');
        echo $this->Html->css('ace-skins.min');
        echo $this->Html->css('style');
        echo $this->Html->css('MetroJs.min');
        echo $this->Html->css('bootmetro');
     ?>

    <!--[if IE 7]>
    <?php echo $this->Html->css('font-awesome-ie7.min'); ?>
    <![endif]-->

    <!--page specific plugin styles-->

    <!--fonts-->

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.map" />
    <!--ace styles-->


    <!--[if lte IE 8]>
    <?php echo $this->Html->css('ace-ie.min'); ?>
    <![endif]-->

    
</head>

<body>
<?php echo $this->element('admin/header'); ?>

<div class="container-fluid" id="main-container">
<a id="menu-toggler" href="#">
    <span></span>
</a>

<?php echo $this->element('admin/sidebar'); ?>

<div id="main-content" class="clearfix">
<div id="page-content" class="clearfix">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>


<!--PAGE CONTENT ENDS HERE-->
</div><!--/row-->
</div><!--/#page-content-->

<!--div id="ace-settings-container">
    <div class="btn btn-app btn-mini btn-warning" id="ace-settings-btn">
        <i class="icon-cog"></i>
    </div>

    <div id="ace-settings-box">
        <div>
            <div class="pull-left">
                <select id="skin-colorpicker" class="hidden">
                    <option data-class="default" value="#438EB9">#438EB9</option>
                    <option data-class="skin-1" value="#222A2D">#222A2D</option>
                    <option data-class="skin-2" value="#C6487E">#C6487E</option>
                    <option data-class="skin-3" value="#D0D0D0">#D0D0D0</option>
                </select>
            </div>
            <span>&nbsp; Choose Skin</span>
        </div>

        <div>
            <input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
            <label class="lbl" for="ace-settings-header"> Fixed Header</label>
        </div>

        <div>
            <input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
        </div>
    </div-->
</div><!--/#ace-settings-container-->
</div><!--/#main-content-->
</div><!--/.fluid-container#main-container-->

<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>

<!--basic scripts-->


<script type="text/javascript">
    window.jQuery || document.write("<script src='../js/jquery-1.9.1.min.html'>"+"<"+"/script>");
</script>


<!--page specific plugin scripts-->

<!--[if lte IE 8]>
<script src="/js/"></script>
<![endif]-->

<?php 
    echo $this->Html->script('admin/markdown/markdown.min');
echo $this->Html->script('admin/markdown/bootstrap-markdown.min');
echo $this->Html->script('admin/jquery.hotkeys.min');
echo $this->Html->script('admin/bootstrap-wysiwyg.min');
echo $this->Html->script('admin/bootbox.min');
echo $this->Html->script('1.9.1/jquery.min');


echo $this->Html->script('admin/ace-elements.min');
echo $this->Html->script('admin/ace.min');
?>


<script type="text/javascript">
    $(function() {

        $('.dialogs,.comments').slimScroll({
            height: '300px'
        });

        $('#tasks').sortable();
        $('#tasks').disableSelection();
        $('#tasks input:checkbox').removeAttr('checked').on('click', function(){
            if(this.checked) $(this).closest('li').addClass('selected');
            else $(this).closest('li').removeClass('selected');
        });

        var oldie = $.browser.msie && $.browser.version < 9;
        $('.easy-pie-chart.percentage').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size/10),
                animate: oldie ? false : 1000,
                size: size
            });
        })

        $('.sparkline').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
        });




        var data = [
            { label: "social networks",  data: 38.7, color: "#68BC31"},
            { label: "search engines",  data: 24.5, color: "#2091CF"},
            { label: "ad campaings",  data: 8.2, color: "#AF4E96"},
            { label: "direct traffic",  data: 18.6, color: "#DA5430"},
            { label: "other",  data: 10, color: "#FEE074"}
        ];

        var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
        $.plot(placeholder, data, {

            series: {
                pie: {
                    show: true,
                    tilt:0.8,
                    highlight: {
                        opacity: 0.25
                    },
                    stroke: {
                        color: '#fff',
                        width: 2
                    },
                    startAngle: 2

                }
            },
            legend: {
                show: true,
                position: "ne",
                labelBoxBorderColor: null,
                margin:[-30,15]
            }
            ,
            grid: {
                hoverable: true,
                clickable: true
            },
            tooltip: true, //activate tooltip
            tooltipOpts: {
                content: "%s : %y.1",
                shifts: {
                    x: -30,
                    y: -50
                }
            }

        });


        var $tooltip = $("<div class='tooltip top in' style='display:none;'><div class='tooltip-inner'></div></div>").appendTo('body');
        placeholder.data('tooltip', $tooltip);
        var previousPoint = null;

        placeholder.on('plothover', function (event, pos, item) {
            if(item) {
                if (previousPoint != item.seriesIndex) {
                    previousPoint = item.seriesIndex;
                    var tip = item.series['label'] + " : " + item.series['percent']+'%';
                    $(this).data('tooltip').show().children(0).text(tip);
                }
                $(this).data('tooltip').css({top:pos.pageY + 10, left:pos.pageX + 10});
            } else {
                $(this).data('tooltip').hide();
                previousPoint = null;
            }

        });






        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d1.push([i, Math.sin(i)]);
        }

        var d2 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d2.push([i, Math.cos(i)]);
        }

        var d3 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.2) {
            d3.push([i, Math.tan(i)]);
        }


        var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
        $.plot("#sales-charts", [
            { label: "Domains", data: d1 },
            { label: "Hosting", data: d2 },
            { label: "Services", data: d3 }
        ], {
            hoverable: true,
            shadowSize: 0,
            series: {
                lines: { show: true },
                points: { show: true }
            },
            xaxis: {
                tickLength: 0
            },
            yaxis: {
                ticks: 10,
                min: -2,
                max: 2,
                tickDecimals: 3
            },
            grid: {
                backgroundColor: { colors: [ "#fff", "#fff" ] },
                borderWidth: 1,
                borderColor:'#555'
            }
        });


        $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('.tab-content')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }
    })
</script>
</body>

<!-- Mirrored from mz121star.github.io/AFE/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 24 Nov 2013 04:14:49 GMT -->
</html>
