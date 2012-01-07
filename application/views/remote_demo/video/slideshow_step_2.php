<?php

function base_server_url() {
    return "http://194.63.157.110/dev/company/";
}
?>

<link href="<?php echo base_server_url(); ?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_server_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_server_url(); ?>js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_server_url(); ?>js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php echo base_server_url(); ?>js/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_server_url(); ?>js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_server_url(); ?>js/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="<?php echo base_server_url(); ?>js/jquery.ui.sortable.js"></script>

<link rel="stylesheet" href="<?php echo base_server_url(); ?>css/jquery-ui-1.8.13.custom.css">
<link rel="stylesheet" href="<?php echo base_server_url(); ?>css/colorbox.css" type="text/css"/>

<script type="text/javascript">

    $(function(){
        $(".video_popup").colorbox({width:"500", height:"450", iframe:true});
    });
    
</script>
<script>
        
        function show(){
            $("#shit-content").load('<?php echo base_url()."stuff/slideshow.log"?>');
//             $.ajax({ 
//                 type: 'POST',
//                 url: "<?php //echo base_url().'remote_demo/file_result';?>",  
//                 cache: false,  
//                 success: function(html){  
////                     alert(123);
////                     alert(html);                     
////                   $("#shit-content").html(html);  
//                 }
//             }); 
        };  
        function start(){
           setInterval(function() { show() },2000);
           //setTimeout(function() { $('#formID').submit(); },50000);
        }; 
        
	$(function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
                
        $(document).ready(function() {
            $(".del-element").bind('click', function() {
                $(this).parent().remove();
            });

                });
                
	});
</script>

<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; }
    #sortable li {position: relative; margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }
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

.x {
    background-image: url("<?php echo base_server_url(); ?>images/x.png");
    background-repeat: no-repeat;
    height: 22px;
    margin-right: 2px;
    width: 24px;
    border: medium none;
    margin-top: 2px;
}

.step-3 {
    background-image: url("<?php echo base_server_url(); ?>images/step-3.png");
    background-repeat: no-repeat;
    height: 22px;
    margin-left: 1px;
    width: 122px;
    border: medium none;
    margin-bottom: 15px;
}

.step-3:hover {
    background-image: url("<?php echo base_server_url(); ?>images/step-3.png");
    background-repeat: no-repeat;
    background-position: 0 -22px;
}
</style>



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

    <div class="head-category">
        You can create your own slideshow
    </div>
    Step2. Arrange images and add transitional effects! Add background music!
    <br/>
    <div id="shit-content"></div>
    <form id="formID" action="<?php echo base_server_url(); ?>remote_demo/video/render" method="POST" enctype="multipart/form-data">

        You can set any audio file for background music.
        <br><br>
                <input type="file" name="background_audio_file" id="background_audio_file" onchange="$('#demo_audio').removeAttr('checked')">
                or 
                <input type="checkbox" id="demo_audio" name="demo_audio" value="1" onclick="if($(this).attr('checked')){ $('#background_audio_file').val(''); }">use demo background
                <br><br>
                <input type="submit" value="Step3:preview" onClick="start();">
            
        <ul id="sortable">
            
<?php if ($uploaded_images) {
    foreach ($uploaded_images as $item) { ?>
                    <li class="ui-state-default">
                        <input type="hidden" value="<?php echo $item ?>" name="image[]" />
                        <img src="<?php echo base_server_url() . $photos_location . "/" . $item; ?>" width="100px" height="100px">
                        <a style="position:absolute; z-index: 2; right: 1px; top: 1px;" class="del-element" href="javascript:void(0)">
                            <img class="x" alt="img" src="<?php echo base_url(); ?>images/x.png"/>
                        </a>
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
