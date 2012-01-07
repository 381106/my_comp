<?php $this->load->view("header");?>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.js"></script>

<script type="text/javascript">
$(function () {
    var degree = [<?php echo $chart;?>];
    var d1 = [[0, 9],[1 ,5],[2 ,5],[3 ,3]];
    // a null signifies separate line segments
    var d3 = [[0, 12], [7, 7], [10, 12.5], [12, 14.5]];
   
    $.plot($("#chart"), [ d1 ]);
});
</script>


<div id="bodyPan">

</div>

<div id="bodyMiddlePan">
    <div id="demo_logo">
        <a href="<?php echo base_url()."demos";?>">
            <h2>Live <br>Demos</h2>
        </a>
    </div>
    
    <div id="demo_div">
        <h4>Page Scrapper</h4>
        We grabbed info about weather for Omsk city from http://rp5.ru<br>
        <br>
            <div id="weather_block">
            <?php if($weather){ 
                foreach ($weather as $key=>$item){ 
                    $time = "+".($key*24)." hours";
                    ?>
            <div id="weather_div">
                    <div>Date:</div><span><?php echo date("D m Y", strtotime($time));?></span><br>
                    <div>Temperature:</div><span><?php echo $item['details']->temperature;?>&deg;C</span><br>
                    <div>Wind:</div><span><?php echo $item['details']->wind;?> m/s</span><br>
                    <div>Overcast:</div><span><?php echo $item['details']->overcast;?>%</span><br>
                    <div>Pressure:</div><span><?php echo $item['details']->pressure;?> mm Hg</span><br>
                    <div>Humidity:</div><span><?php echo $item['details']->humidity;?>%</span><br>
            </div>
                <?php }
            }
            ?>
            </div>
        <div id="chart" style="width:320px;height:240px; left:350px; position: absolute"></div>
            
        
            
            
        
</div>


<br>
<br>
<?php $this->load->view("footer");?>
