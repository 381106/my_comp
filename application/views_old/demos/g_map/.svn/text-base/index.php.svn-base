<?php $this->load->view("header");

if(isset($find_address) && $find_address){
                    $val = $find_address;
                } else {
                    $val = "4200 Bohannon Drive #100 Menlo Park, CA 94025";
                } 

$html_for_marker = $val.'<br><img src='.base_url().'images/logo_blue.jpg><br>';
//
?>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.gmap-1.1.0.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo GMAP_KEY;?>"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
	       // var html_display = '<?php echo $html_for_marker; ?>';
		$("#map1").gMap({ markers: [ { address: "<?php echo $find_address;?>",
                                               html: '<?php echo $html_for_marker; ?>' }],
                                  zoom: 15,
                                  html_prepend:           '<div style="width:200px;height:200px;">',
                                  html_append:            '</div>',

                              maptype: G_PHYSICAL_MAP});
                
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
        <h4>Google map</h4>
        Enter address and zip to show in map.<br><br>
        <p style="float:left">
            
            <form action="<?php echo base_url();?>demos/g_map" method="POST">
                <input type="hidden" name="handler" value="find_place">
                <input type="text" name="address" value="<?php echo $val; ?>">
                <input type="submit" value="Search">
            </form>
        </p>
        <br><br>
        
        <?php if(isset($find_address) && $find_address){?>
            Search results <br>
            <div id="map1" style="width: 560px; height: 560px; border: 1px solid #777; overflow: hidden;"></div>
            <br><br>
            
         <?php } ?>
        
        <?php if($default_handler){ ?>
            
        <?php } ?>
        <br><br>
        
</div>
</div>

<br>
<br>
<?php $this->load->view("footer");?>
