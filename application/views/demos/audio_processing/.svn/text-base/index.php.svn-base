<link href="<?php echo base_url(); ?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.13.custom.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.8.13.custom.css">

<?php if (isset($ID3)) { ?>
    <script type="text/javascript">
        $(function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: <?php echo $ID3['duration']; ?>,
                values: [ 0, <?php echo $ID3['duration']; ?> ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] +" seconds" );
                    $("#timeframe_start").val(ui.values[ 0 ]);
                    $("#timeframe_end").val(ui.values[ 1 ]);
                }
            });
                    
            $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) + " - " +	 $( "#slider-range" ).slider( "values", 1 ) + " seconds");
        });
    </script>
<?php } ?>
<div class="head-category">
    Audio Processing
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

<?php if (isset($cropped_mp3)) { ?>
        You can play that cropped file <br><br>
        <embed type="application/x-shockwave-flash" flashvars="audioUrl=<?php echo base_url() . $cropped_mp3; ?>" 
               src="http://www.google.com/reader/ui/3523697345-audio-player.swf" width="400" height="27" quality="best"></embed>

        <br><br>
        <a class="try" href="<?php echo base_url(); ?>demos/html_to_pdf"> </a>
    <?php } ?>


<?php if (isset($ID3)) { ?>
        You can play that uploaded file
        <embed type="application/x-shockwave-flash" flashvars="audioUrl=<?php echo base_url() . "tmp/" . $tmp_filename; ?>" 
               src="http://www.google.com/reader/ui/3523697345-audio-player.swf" width="400" height="27" quality="best"></embed>

        <br><br>

        File info: <br><br>
        <?php
        foreach ($ID3 as $key => $id3_value) {
            echo $key . " : " . $id3_value . "<br>";
        }
        ?>
        <br>


        <p>
            <label for="amount">Crop audio frame:</label>
            <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;" />
        </p>
        <br>
        <div style="width: 200px">
            <div id="slider-range"></div>
        </div>
        <br>
        <form action="<?php echo base_url(); ?>demos/audio_processing" method="POST">
            <input type="hidden" name="handler" value="crop_audio">
            <input type="hidden" name="timeframe_start" id="timeframe_start">
            <input type="hidden" name="timeframe_end" id="timeframe_end">
            <input type="hidden" name="tmp_filename" value="<?php echo $tmp_filename; ?>">
            <input type="submit" value="crop audio">
        </form>

        <br>
        <a href="<?php echo base_url(); ?>demos/audio_processing">try again</a>
<?php }
if (isset($default_handler)) { ?>

        Please upload your mp3 file. I will try to grab ID3 info.<br><br>
        <p style="float:left">

        <form action="<?php echo base_url(); ?>demos/audio_processing" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="handler" value="upload_audio">
            <input type="file" name="audio_file" id="audio_file" value="select file">
            <input class="upload" type="submit" value=""/>
        </form>
    </p>
<?php } ?>
<br><br>

</div>