
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/init_wysiwyg.js"></script>

            <?php if($thumbnail){ ?>
            <p>
                You can see image generated from that HTML text <br>
                <img id="html2image_img" src="<?php echo base_url().$thumbnail;?>" style="border: 1px solid black; padding: 10px">
                <br><br>
                <a href="<?php echo base_url();?>demos/html_to_image">try again</a>
            </p>
            <?php }else{ ?>

            <p>
                Please enter a piece of text into wysiwyg editor.<br>
                That text will be converted into image.
            </p>

            <p style="float:left">
                <form action="<?php echo base_url();?>demos/html_to_image" method="POST">
                    <input type="hidden" name="handler" value="create_html_image">
                    <textarea id="html_edit" name="html_edit"><?php echo $this->load->view("demos/html_to_image/sample_html");?></textarea>
                    <input type="submit" value="Create Image">
                </form>
            </p>
            <?php } ?>
   