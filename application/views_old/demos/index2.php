<?php $this->load->view("header");?>

<div id="bodyPan">

</div>

<div id="bodyMiddlePan">
    <div id="demo_logo">
        <a href="<?php echo base_url()."demos";?>">
            <h2>Live <br>Demos</h2>
        </a>
    </div>
    
    <div id="demo_div">
        Please choose interesting category<br>
        <ul>
            <li>
                <a href="<?php echo base_url();?>demos/html_to_image">converting html to image</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/html_to_pdf">converting html to pdf</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/image_manipulations">image manipulating</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/pdf_to_image">converting pdf to image</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/audio_processing">audio processing</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/youtube_videos">youtube videos</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/design_image">design image</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/rss_weather">RSS weather</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/g_map">Google map</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/photo_gallery">Photo gallery</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>demos/video">Play with videos</a>
            </li>
        </ul>
    </div>
</div>


<br>
<br>
<?php $this->load->view("footer");?>
