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
        
        <?php if(isset($video_id)&&$video_id){ ?>
       <h4>Play YouTube Video</h4>
        <div id="container"></div>
        
        <object width="425" height="344">
        <param name="movie" value="http://www.youtube.com/v/<?php echo $video_id;?>?fs=1"</param>
        <param name="allowFullScreen" value="true"></param>
        <param name="allowScriptAccess" value="always"></param>
        <embed src="http://www.youtube.com/v/<?php echo $video_id;?>?fs=1&autoplay=1"
          type="application/x-shockwave-flash"
          allowfullscreen="true"
          allowscriptaccess="always"
          width="425" height="344">
        </embed>
        </object>
        <br><br>
        <a href="<?php echo base_url();?>demos/youtube_videos">try again</a>
        <?php } ?>
        
        <?php if(isset($amount)&&$amount){?>
            Search results <br>
            <?php foreach($found_video as $video){ ?>
                <div id="portfolio_list">
                     <p id="portfolio_image">
                         <a class="video_popup" href="<?php echo base_url().'demos/youtube_videos/'.$video->video_id;?>">
                             <img src="<?php echo $video->img;?>" alt="<?php echo $video->video_title;?>">
                         </a>
                     </p>
                     <p>
                        <span id="project_title">Description:</span> <?php echo $video->video_description;?><br>
                        <span id="project_completed">Tags:</span> <?php echo implode(",",$video->video_tags);?><br>
                        <span id="project_url">Rating:</span> <?php echo $video->video_rating;?><br>
                        <span id="project_url">Duration:</span> <?php echo $video->video_duration;?><br>
                        <span id="project_url">Published:</span> <?php echo $video->video_published;?><br>
                     </p>
                 </div>
            <br><br>
        <?php
            } ?>
            <br><br>
            <a href="<?php echo base_url();?>demos/youtube_videos">try again</a>
         <?php } ?>
        
        <?php if($default_handler){ ?>
            <h4>Search YouTube Video</h4>
        Enter any keyword to find relative youtube videos.<br><br>
        <p style="float:left">
            
            <form action="<?php echo base_url();?>demos/youtube_videos" method="POST">
                <input type="hidden" name="handler" value="search_keyword">
                <input tyep="text" name="keyword">
                <input type="submit" value="Search">
            </form>
        </p>
        <?php } ?>
        <br><br>
        
</div>
</div>

<br>
<br>
<?php $this->load->view("footer");?>
