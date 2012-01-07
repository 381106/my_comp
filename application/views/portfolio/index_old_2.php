<?php $this->load->view("header");?>
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>

<div id="bodyPan">

</div>

<div id="bodyMiddlePan">
    <div id="portfolio_logo">
        <h2>Portfolio <br>
            Projects</h2>
    </div>
    <br>
 
     <div id="portfolio_list">
         <p id="portfolio_image">
             <a href="<?php echo base_url();?>images/portfolio/theundertaking.png" rel="prettyPhoto" title="<a href='http://theundertakingmovie.com'>http://theundertakingmovie.com</a>">
                 <img src="<?php echo base_url();?>images/portfolio/theundertaking_th.png" alt="The Undertaking Movie">
             </a>
         </p>
         <p>
            <span id="project_title">Project Title:</span> TheUndertakingMovie<br>
            <span id="project_completed">Completed:</span> 01/18/2011<br>
            <span id="project_url">URL:</span> <a href="http://theundertakingmovie.com">http://theundertakingmovie.com</a><br>
            <span id="project_description">Job description:</span> That project was built on CodeIgniter 1.7 to integrate PayPal handlers to let users purchase subscriptions also integrate user interface (jquery UI), ajax handlers and flash video effect (overlay youtube video with layer).
         </p>
     </div>
    <br>
     <div id="portfolio_list">
         <p id="portfolio_image">
             <a href="<?php echo base_url();?>images/portfolio/gafv.png" rel="prettyPhoto" title="<a href='http://www.getaudiofromvideo.com'>http://www.getaudiofromvideo.com</a>">
                 <img src="<?php echo base_url();?>images/portfolio/gafv_th.png" alt="Get Audio From Video">
             </a>
         </p>
         <p>
            <span id="project_title">Project Title:</span> Get Auido From Video<br>
            <span id="project_completed">Completed:</span> 09/01/2010<br>
            <span id="project_url">URL:</span> <a href="http://www.getaudiofromvideo.com">http://www.getaudiofromvideo.com</a><br>
            <span id="project_description">Job description:</span> That project was built on CodeIgniter 1.7 to search videos by tags from video hosting sites (youtube, vimeo, blip.tv), to grab videos to server converting it to defferent audio/video formats and to crop video with designed timeframe.
         </p>
     </div> 
    <br>
     <div id="portfolio_list">
         <p id="portfolio_image">
             <a href="<?php echo base_url();?>images/portfolio/upmyphoto.png" rel="prettyPhoto" title="<a href='http://upmyphoto.com'>http://upmyphoto.com</a>">
                 <img src="<?php echo base_url();?>images/portfolio/upmyphoto_th.png" alt="Up My Photo">
             </a>
         </p>
         <p>
            <span id="project_title">Project Title:</span> UpMyPhoto<br>
            <span id="project_completed">Completed:</span> 04/14/2010<br>
            <span id="project_url">URL:</span> <a href="http://upmyphoto.com/">http://upmyphoto.com/</a><br>
            <span id="project_description">Job description:</span> UpMyPhoto.com is a free photo hosting solution designed for you to share digital photos with friends.
            My work was related with integrating java image uploader, processing uploaded images (resizing to default resolution and converting images to jpeg), development user's interface to manage photos
         </p>
     </div> 
    <br><br>
     <div id="portfolio_list">
         <p id="portfolio_image">
             <a href="<?php echo base_url();?>images/portfolio/omegle.png" rel="prettyPhoto" title="<a href='http://omegle.com'>http://omegle.com</a>">
                 <img src="<?php echo base_url();?>images/portfolio/omegle_th.png" alt="Omegle Clone">
             </a>
         </p>
         <p>
            <span id="project_title">Project Title:</span> Omegle clone<br>
            <span id="project_completed">Completed:</span> 01/14/2010<br>
            <span id="project_url">URL:</span> <a href="http://omegle.com">http://upmyphoto.com/</a><br>
            <span id="project_description">Job description:</span> Free Online chat that could be used for online support.
         </p>
     </div> 
    <br>
     <div id="portfolio_list">
         <p id="portfolio_image">
             <a href="<?php echo base_url();?>images/portfolio/kanji.png" rel="prettyPhoto" title="Convert kanji dictionary to SQL">
                 <img src="<?php echo base_url();?>images/portfolio/kanji_th.png" alt="Kanji to SQL">
             </a>
         </p>
         <p>
            <span id="project_title">Project Title:</span> Export kanji XML dictionary into generated SQL dump<br>
            <span id="project_completed">Completed:</span> 03/15/2010<br>
            <span id="project_url">URL:</span> no url<br>
            <span id="project_description">Job description:</span> 
                    Kanji are the Chinese characters that are used in the modern Japanese writing system along with 
                    hiragana, katakana, Indo Arabic numerals, and the occasional use of the Latin alphabet. 
                    In that project I developed script that parse kanji XML dictionary into 16 structured  tables
         </p>
     </div> 
    <br>
     <div id="portfolio_list">
         <p id="portfolio_image">
             <a href="<?php echo base_url();?>images/portfolio/pdf_stats.png" rel="prettyPhoto" title="<a href='<?php echo base_url()."stuff/statistics.pdf";?>'>statistics.pdf</a>">
                 <img src="<?php echo base_url();?>images/portfolio/pdf_stats_th.png" alt="PDF statistics">
             </a>
         </p>
         <p>
            <span id="project_title">Project Title:</span> Generate PDF statistics<br>
            <span id="project_completed">Completed:</span> 12/22/2009<br>
            <span id="project_url">URL:</span> <a href='<?php echo base_url()."stuff/statistics.pdf";?>'>statistics.pdf</a><br>
            <span id="project_description">Job description:</span> 
                    Generation of PDF document with site statistics, creation of different analytics charts and inserting them into document.
                    I used fPDF library to generate pdf file, pChart lib to generate charts (I preffer using ChartDirector lib but it requires root server access for installation)
         </p>
     </div> 
    <br>
     <div id="portfolio_list">
         <p id="portfolio_image">
             <a href="<?php echo base_url();?>images/portfolio/iem.png" rel="prettyPhoto" title="">
                 <img src="<?php echo base_url();?>images/portfolio/iem_th.png" alt="Customize Internet Email Marketing by Interspire Software">
             </a>
         </p>
         <p>
            <span id="project_title">Project Title:</span> Customize Internet Email Marketing by Interspire Software<br>
            <span id="project_completed">Completed:</span> 12/11/2009<br>
            <span id="project_url">URL:</span> no url<br>
            <span id="project_description">Job description:</span> In that project I worked with IEM modification: 
            adding an ability to manage built-in templates (working with file structure, creating uploader to preview template image, adding html/text content) and making built-in templates from custom private user's templates
         </p>
     </div> 
    <br>
     <div id="portfolio_list">
         <p id="portfolio_image">
             <a href="<?php echo base_url();?>images/portfolio/str2image.png" rel="prettyPhoto" title="">
                 <img src="<?php echo base_url();?>images/portfolio/str2image_th.png" alt="Convert string to image">
             </a>
         </p>
         <p>
            <span id="project_title">Project Title:</span> Convert string to image<br>
            <span id="project_completed">Completed:</span> 10/09/2009<br>
            <span id="project_url">URL:</span> no url<br>
            <span id="project_description">Job description:</span> In that project I developed script that was to generate image with text based of 4 parameters:
            text, text chars size, text alignment, color. I used imagemagick lib to do it.
         </p>
     </div> 
    <br>
     <div id="portfolio_list">
         <p id="portfolio_image">
             <a href="<?php echo base_url();?>images/portfolio/megashot.png" rel="prettyPhoto" title='<a href="http://megashot.net">http://megashot.net</a>'>
                 <img src="<?php echo base_url();?>images/portfolio/megashot_th.png" alt="Megashot">
             </a>
         </p>
         <p>
            <span id="project_title">Project Title:</span> Megashot<br>
            <span id="project_completed">Completed:</span> 08/07/2009<br>
            <span id="project_url">URL:</span> <a href="http://megashot.net">http://megashot.net</a><br>
            <span id="project_description">Job description:</span> The project was social network for creative people.
I was responsible for ajax image handlers (using imageMagick library), MySQL data processing, 
MVC architecture for some project parts (as I started to work after some months from the beginning of the project),
back-end fixing and server configuration (install required packages, set up SVN, server maintaining)
         </p>
     </div> 
</div>
<?php $this->load->view("footer");?>
