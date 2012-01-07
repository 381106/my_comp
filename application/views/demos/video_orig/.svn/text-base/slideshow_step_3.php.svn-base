<?php $this->load->view("header");?>
<link href="<?php echo base_url();?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.13.custom.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui-1.8.13.custom.css">

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
        
            <h4>You can create your own slideshow</h4>
            Step3. Preview your slideshow
        <br><br>
        
        <br><br>
        <p style="float:left">
            
            <?php echo $flash_file; ?>
            <?php if(isset($flash_file)&&$flash_file){ ?>
                <object type="application/x-shockwave-flash" data="<?php echo base_url();?>stuff/player_flv.swf" width="320" height="240">
                     <param name="movie" value="<?php echo base_url();?>stuff/player_flv_.swf" />
                     <param name="FlashVars" value="flv=<?php echo $flash_file;?>" />
                </object>

            
            <?php } ?>
            
        
</div>
</div>

<br>
<br>
<?php $this->load->view("footer");?>
<!--
/usr/bin/mencoder/mencoder /home/workspace/my_company_site/tmp/f530fb6645c552c3df0e33c0d22a628e/slideshow.vob -ovc lavc -lavcopts  vcodec=mpeg4:vbitrate=1000:vhq:keyint=250:threads=2:vpass=1 -oac mp3lame -lameopts cbr:br=128 -ffourcc XVID   -vf scale=320:-2,crop=320:240,expand=320:240 -af resample=44100:0:0  -o /home/workspace/my_company_site/tmp/slideshow.flv
-->