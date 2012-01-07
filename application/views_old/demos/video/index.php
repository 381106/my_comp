<?php $this->load->view("header");?>
<link href="<?php echo base_url();?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox-min.js"></script>

<link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui-1.8.13.custom.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css">

<script type="text/javascript">

    $(function(){
            $(".video_popup").colorbox({width:"500", height:"450", iframe:true});
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
        

        <?php if(isset($error)){
            
        }else{
            $error = "";
        }?>
        <div id="error">
            <?php echo $error;?>
        </div>
        
        <?php if($default_handler){ ?>
            <h4>You can create your own slideshow</h4>
            Step1. Upload ZIP file with photos. Max file size = 10Mb.
        <br><br>
        We recommend to put 10-15 photos with resolution = 640x480
        <br><br>
        <p style="float:left">
            
        <form action="<?php echo base_url();?>demos/video/upload_zip" method="POST" enctype="multipart/form-data">
                <input type="file" name="zip_file" id="zip_file" onchange="$('#demo_zip').removeAttr('checked')">
                or 
                <input type="checkbox" id="demo_zip" name="demo_zip" value="1" onclick="if($(this).attr('checked')){ $('#zip_file').val(''); }">use demo content
                <br><br>
                <input type="submit" value="Step2:add effects">
            </form>
        
        
        </p>
        <?php } ?>
        <br><br>
        
</div>
</div>

<br>
<br>
<?php $this->load->view("footer");?>
