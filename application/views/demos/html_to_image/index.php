
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init_wysiwyg.js"></script>

<?php if ($thumbnail) { ?>


    <div class="head-category">
        You can see image generated from that HTML text
    </div> 
    <div class="content-category">
        <img id="html2image_img" src="<?php echo base_url() . $thumbnail; ?>" style="border: 1px solid #316fa1; padding: 10px"/>
        <br><br>
        <a class="try-2" href="<?php echo base_url(); ?>demos/html_to_pdf"> </a>
    </div>
<?php } else { ?>
    <div class="head-category">
        Please enter a piece of text into wysiwyg editor.<br/>
        That text will be converted into image.
    </div>
    <div id="demo_div" class="content-category">
        <p style="float:left">
        <form action="<?php echo base_url(); ?>demos/html_to_image" method="POST">
            <input type="hidden" name="handler" value="create_html_image">
            <textarea id="html_edit" name="html_edit"><?php echo $this->load->view("demos/html_to_image/sample_html"); ?></textarea>
            <input class="create" type="submit" value=""/>
        </form>
    </p>
    </div>
<?php } ?>
   