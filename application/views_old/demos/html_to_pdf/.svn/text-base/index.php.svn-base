<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/init_wysiwyg.js"></script>


    

<?php if($pdf){ ?>
<p>
    You can download PDF file generated from that HTML text <br>
    <a href="<?php echo base_url().$pdf;?>"><img src="<?php echo base_url();?>stuff/pdf.jpeg"></a>
    <br>
    <a href="<?php echo base_url();?>demos/html_to_pdf">try again</a>
</p>
<?php }else{ ?>

<p>
    Please enter a piece of text into wysiwyg editor.<br>
    That text will be converted into PDF document.
</p>

<p style="float:left">
    <form action="<?php echo base_url();?>demos/html_to_pdf" method="POST">
        <input type="hidden" name="handler" value="create_pdf">
        <textarea id="html_edit" name="html_edit"><?php echo $this->load->view("demos/html_to_pdf/sample_html");?></textarea>
        <input type="submit" value="Create PDF">
    </form>
</p>
<?php } ?>
