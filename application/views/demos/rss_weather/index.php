
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.flot.js"></script>

<script type="text/javascript">
    $(function () {
        var degree = [<?php echo $chart; ?>];
        var options = {
            xaxis: {
                ticks: [0, 1, 2,]
            }
        };

    
        $.plot($("#chart"), [ degree ]);
    });
</script>


<div class="head-category">
    We grabbed info about weather for Omsk city from http://rp5.ru
</div>
<div id="demo_div" class="content-category">
    <div id="weather_block">
        <?php
        if ($weather) {
            foreach ($weather as $key => $item) {
                $time = "+" . ($key * 24) . " hours";
                ?>
                <div id="weather_div">
                    <div>Date:</div><span><?php echo date("D m Y", strtotime($time)); ?></span><br>
                    <div>Temperature:</div><span><?php echo $item['details']->temperature; ?>&deg;C</span><br>
                    <div>Wind:</div><span><?php echo $item['details']->wind; ?> m/s</span><br>
                    <div>Overcast:</div><span><?php echo $item['details']->overcast; ?>%</span><br>
                    <div>Pressure:</div><span><?php echo $item['details']->pressure; ?> mm Hg</span><br>
                    <div>Humidity:</div><span><?php echo $item['details']->humidity; ?>%</span><br>
                </div>
            <?php
            }
        }
        ?>
    </div>
    <div id="chart" style="width:320px;height:240px; left:350px; position: absolute"></div>
</div>
