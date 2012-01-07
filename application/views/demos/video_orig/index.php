
<link href="<?php echo base_url(); ?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.8.13.custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css">

<script type="text/javascript">

    $(function(){
        $(".video_popup").colorbox({width:"500", height:"450", iframe:true});
    });
    
</script>
<style>
        .content-category {
    height: 550px;
    margin-left: 30px;
    overflow-y: auto;
    width: 727px;
}

body {
    background: none;
    color:#253459;
}

.head-category {
    font: bold 12px/1.9 verdana;
    padding-bottom: 30px;
}

.step {
    background-image: url("../images/step.png");
    background-repeat: no-repeat;
    height: 22px;
    margin-left: 1px;
    width: 147px;
    border: medium none;
}

.step:hover {
    background-image: url("../images/step.png");
    background-repeat: no-repeat;
    background-position: 0 -22px;
}
</style>
<div class="head-category">
    You can create your own slideshow
</div>
<div id="demo_div" class="content-category">


    <?php
    if (isset($error)) {
        
    } else {
        $error = "";
    }
    ?>
    <div id="error">
    <?php echo $error; ?>
    </div>

<?php if ($default_handler) { ?>
        Step1. Upload ZIP file with photos. Max file size = 10Mb.
        <br>
        We recommend to put 10-15 photos with resolution = 640x480
        <br><br>
        <p style="float:left">

        <form action="<?php echo base_url(); ?>demos/video/upload_zip" method="POST" enctype="multipart/form-data">
            <input type="file" name="zip_file" id="zip_file" onchange="$('#demo_zip').removeAttr('checked')">
            or 
            <input type="checkbox" id="demo_zip" name="demo_zip" value="1" onclick="if($(this).attr('checked')){ $('#zip_file').val(''); }">use demo content
            <br><br>
            <input class="step" type="submit" value=""/>
        </form>


    </p>
<?php } ?>
<br><br>

</div>