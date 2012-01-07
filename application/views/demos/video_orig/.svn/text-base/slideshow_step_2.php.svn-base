<link href="<?php echo base_url(); ?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.ui.sortable.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.8.13.custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css">

<script type="text/javascript">

    $(function(){
        $(".video_popup").colorbox({width:"500", height:"450", iframe:true});
    });
    
</script>
<script>
    $(function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    });
</script>
<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; }
    #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }

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



<div id="demo_div">


    <?php
    if (isset($error)) {
        
    } else {
        $error = "";
    }
    ?>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <h4>You can create your own slideshow</h4>
    Step2. Arrange images and add transitional effects! Add background music!
    <br/><br/>

    <br/><br/>
    <form action="<?php echo base_url(); ?>demos/video/render" method="POST" enctype="multipart/form-data">

        You can set any audio file for background music.
        <br><br>
        <input type="file" name="background_audio_file" id="background_audio_file" onchange="$('#demo_audio').removeAttr('checked')">
        or 
        <input type="checkbox" id="demo_audio" name="demo_audio" value="1" onclick="if($(this).attr('checked')){ $('#background_audio_file').val(''); }">use demo background
        <br><br>
        <input type="submit" value="Step3:preview">

        <ul id="sortable">
            <?php if ($uploaded_images) {
                foreach ($uploaded_images as $item) { ?>
                    <li class="ui-state-default">
                        <input type="hidden" value="<?php echo $item ?>" name="image[]" />
                        <img src="<?php echo base_url() . $photos_location . "/" . $item; ?>" width="100px" height="100px"/>
                    </li>
                    <?php
                }
            } else {
                echo "Error occured during audio uploading process";
            }
            ?>
        </ul>
    </form>


    <br><br>

</div>
