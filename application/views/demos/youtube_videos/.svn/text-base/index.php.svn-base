<link href="<?php echo base_url(); ?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.8.13.custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css">

<script type="text/javascript">
    $(document).ready(function() {
      $('#wik').bind('click', function() {
        $('#check-field').val($('#wik').val());
      });

      $('#hbook').bind('click', function() {
        $('#check-field').val($('#hbook').val());
      });
      
      $('#noone').bind('click', function() {
        $('#check-field').val($('#noone').val());
      });
      
    });
    $(function(){
        $(".video_popup").colorbox({width:"500", height:"450", iframe:true});
    });
    
</script>


<div class="head-category">
    Search YouTube Video
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

<?php if (isset($video_id) && $video_id) { ?>
        <h4>Play YouTube Video</h4>
        <div id="container"></div>

        <object width="425" height="344">
            <param name="movie" value="http://www.youtube.com/v/<?php echo $video_id; ?>?fs=1"</param>
            <param name="allowFullScreen" value="true"></param>
            <param name="allowScriptAccess" value="always"></param>
            <embed src="http://www.youtube.com/v/<?php echo $video_id; ?>?fs=1&autoplay=1"
                   type="application/x-shockwave-flash"
                   allowfullscreen="true"
                   allowscriptaccess="always"
                   width="425" height="344">
            </embed>
        </object>
        <br><br>
        <a class="try" href="<?php echo base_url(); ?>demos/html_to_pdf"> </a>
    <?php } ?>

    <?php if (isset($amount) && $amount) { ?>
        <div style="padding-bottom: 10px;">Search results </div>
    <?php foreach ($found_video as $video) { ?>
            <div id="portfolio_list" style="clear: both;">
                <div style="float: left; padding-right: 15px; padding-bottom: 20px;" id="portfolio_image">
                    <a class="video_popup" href="<?php echo base_url() . 'demos/youtube_videos/' . $video->video_id; ?>">
                        <img class="border-img" width="150px" src="<?php echo $video->img; ?>" alt="<?php echo $video->video_title; ?>"/>
                    </a>
                </div>
                <div style="padding-bottom: 20px; width: 545px;">
                    <b id="project_title">Description:</b> <?php echo $video->video_description; ?><br>
                    <b id="project_completed">Tags:</b> <?php echo implode(",", $video->video_tags); ?><br>
                    <b id="project_url">Rating:</b> <?php echo $video->video_rating; ?><br>
                    <b id="project_url">Duration:</b> <?php echo $video->video_duration; ?><br>
                    <b id="project_url">Published:</b> <?php echo $video->video_published; ?><br>
                </div>
            </div>
        <?php } ?>
        <a class="try-2" href="<?php echo base_url(); ?>demos/html_to_pdf"> </a><br/>
    <?php } ?>

<?php if ($default_handler) { ?>
        Enter any keyword to find relative youtube videos.<br><br>
        <p style="float:left">

        <form action="<?php echo base_url(); ?>demos/youtube_videos" method="POST">
            <input type="hidden" name="handler" value="search_keyword">
            <input style="width: 147px;" type="text" name="keyword"/>
            <input class="search" type="submit" value=""/>
        </form>
    </p>
<?php } ?>
<br><br>
<fieldset style="display:inline;">
<legend>&nbsp;Поиск Google&nbsp;</legend>
<form action="http://www.google.com/search?" target="_blank" method="get" style="margin:0px;">
<input type="hidden" name="q" id="check-field" value="+site:wikipedia.org">
<input type="text" name="q">
<input class="search" type="submit" value=""/>
</form>
</fieldset><br/><br/>
<input type="radio" name="browser" id="wik" value="+site:wikipedia.org"> wikipedia<br>
<input type="radio" name="browser" id="hbook" value="+site:htmlbook.ru"> htmlbook<br>
<input type="radio" name="browser" id="noone" value=""> No one<br>

</div>
